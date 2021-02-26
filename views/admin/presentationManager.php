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
    $presentationController =Loader::loadClassInstance('controllers', 'PresentationController');

    /**
     * add an article
     */
    if(isset($_POST['add-paragraph'])){
        $desc = htmlentities($_POST['paragraph']);

        $tmpPath = $_FILES["select-file"]["tmp_name"];
        $dstPath = 'C:/xampp/htdocs/Projettdw/storage/'.$_FILES["select-file"]["name"];
        if(move_uploaded_file($tmpPath, $dstPath)){
            if(!empty($desc)){
                $presentationController->addParagraph($desc, $_FILES["select-file"]["name"]);
            }
        }
    }

    /**
     * remove an article
     */
    if(isset($_GET['delPar'])){
        $id = htmlentities($_GET['delPar']);
        $presentationController->deleteParagraph($id);
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
        <label for="select-file" class="form-label">Selectionner l'image (optionelle)</label><br><br>
        <input type="file" name="select-file" id="select-file" class="custom-file-input"/><br><br>
        <label for="select-file" class="form-label">Ajouter votre paragraph</label><br>
        <textarea name="paragraph" id="paragraph" class="text-area" placeholder="ajouter votre paragraph ici"></textarea><br><br>
        <input type="submit" name="add-paragraph" id="submit" value="Ajouter le paragraphe">
    </form>

    <center><p class="title">Visualiser vos paragraphes</p></center>
    <table>
        <thead>
            <th>paragraph</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php $paragraphs = $presentationController->getAllParagraphs();
            foreach($paragraphs as $paragraph): ?>
                <tr>
                    <th class="important"><?php echo $paragraph->paragraphe_pres; ?></th>
                    <th>
                        <a href="./presentationManager.php?delPar=<?php echo $paragraph->id_paragraphe;?>">
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