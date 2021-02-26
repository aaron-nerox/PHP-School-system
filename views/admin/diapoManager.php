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
    $diapoController =Loader::loadClassInstance('controllers', 'DiapoController');

    /**
     * add an image
     */
    if(isset($_POST['add-image'])){

        $tmpPath = $_FILES["select-file"]["tmp_name"];
        $dstPath = 'C:/xampp/htdocs/Projettdw/storage/'.$_FILES["select-file"]["name"];
        if(move_uploaded_file($tmpPath, $dstPath)){
            $diapoController->addImage($_FILES["select-file"]["name"]);
        }
    }

    /**
     * remove an image
     */
    if(isset($_GET['delimg'])){
        $id = htmlentities($_GET['delimg']);
        $diapoController->deleteImage($id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets('../user/')?>
    <title>Gestinaire de diaporama</title>
</head>
<body>
    <?php $header->create(); ?>
    
    <center><p class="title">Ajouter une image</p></center>
    <form method="POST" enctype="multipart/form-data" align="center">
        <label for="select-file" class="form-label">Selectionner l'image</label><br><br>
        <input type="file" name="select-file" id="select-file" class="custom-file-input"/><br><br>
        <input type="submit" name="add-image" id="submit" value="Confirmer">
    </form>

    <center><p class="title">votre list d'images</p></center>
    <table>
        <thead>
            <th>Image</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php $images = $diapoController->getAllImages();
            foreach($images as $image): ?>
                <tr>
                    <th><img src="http://localhost/projettdw/storage/<?php echo $image->lien_img_diaporama; ?>" alt="image" class="table-img"></th>
                    <th>
                        <a href="./diapoManager.php?delimg=<?php echo $image->id_diaporama;?>">
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