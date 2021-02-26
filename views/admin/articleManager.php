<?php
    include('../../utils/Loader.php');

    //loading the components
    $header= Loader::loadClassInstance('views/components','Header');
    $footer= Loader::loadClassInstance('views/components','Footer');

    $adminController = Loader::loadClassInstance('controllers', 'AdminController');

    session_start();
    if(!isset($_SESSION['admin_mail'])){
        header('Location: ./index.php');
    }
    $articleController =Loader::loadClassInstance('controllers', 'ArticleController');

    /**
     * add an article
     */
    if(isset($_POST['add-article'])){
        $title = htmlentities($_POST['article-title']);
        $scope = htmlentities($_POST['scope']);
        $desc = htmlentities($_POST['article-body']);

        $tmpPath = $_FILES["select-file"]["tmp_name"];
        $dstPath = 'C:/xampp/htdocs/Projettdw/storage/'.$_FILES["select-file"]["name"];
        if(move_uploaded_file($tmpPath, $dstPath)){
            if(!empty($title) && !empty($desc)){
                $articleController->addArticle($title, $desc, $_FILES["select-file"]["name"], $scope);
            }
        }
    }

    /**
     * remove an article
     */
    if(isset($_GET['delArticle'])){
        $id = htmlentities($_GET['delArticle']);
        $articleController->deleteArticle($id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets('../user/')?>
    <title>Gestinaire des articles</title>
</head>
<body>
    <?php $header->create(); ?>
    
    <center><p class="title">Ajouter un article</p></center>
    <form method="POST" enctype="multipart/form-data" align="center">
        <label for="scope" class="form-label">Selectionner la visibilité</label><br>
        <select id="scope" name="scope" size="1" class="input">
            <option value="1">Tous</option>
            <option value="2">Ensignants</option>
            <option value="3">Primaire</option>
            <option value="4">Moyen</option>
            <option value="5">Secondaire</option>
            <option value="5">Parents</option>
        </select><br><br>
        <label for="article-title" class="form-label">Ajouter un titre pour l'article</label><br>
        <input type="text" name="article-title" id="article-title" class="input" placeholder="Titre d'article"/><br><br>
        <label for="select-file" class="form-label">Selectionner l'image</label><br><br>
        <input type="file" name="select-file" id="select-file" class="custom-file-input"/><br><br>
        <label for="select-file" class="form-label">Ajouter votre text</label><br>
        <textarea name="article-body" id="article-body" class="text-area" placeholder="ajouter votre article ici"></textarea><br><br>
        <input type="submit" name="add-article" id="submit" value="Ajouter l'article">
    </form>

    <center><p class="title">Visualiser vos articles</p></center>
    <table>
        <thead>
            <th>Article</th>
            <th>date de post</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php $articles = $articleController->getAllArticles();
            foreach($articles as $article): ?>
                <tr>
                    <th class="important"><?php echo $article->titre_article; ?></th>
                    <th class="text"><?php echo $article->date_article; ?></th>
                    <th>
                        <a href="./articleManager.php?delArticle=<?php echo $article->id_article;?>">
                            <button class="del-button" >Suprimmer</button>
                        </a>
                    </th>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <?php $footer->createMinified(); ?>
    <script src="../user/scripts/UtilScript.js"></script>
</body>
</html>