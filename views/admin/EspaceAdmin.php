<?php
    include('../../utils/Loader.php');

    //loading the components
    $header= Loader::loadClassInstance('views/components','Header');
    $footer= Loader::loadClassInstance('views/components','Footer');
    $miniCard= Loader::loadClassInstance('views/components','MiniCard');

    $adminController = Loader::loadClassInstance('controllers', 'AdminController');

    session_start();
    if(!isset($_SESSION['admin_mail'])){
        header('Location: ./index.php');
    }
    $admin = $adminController->getAdmin($_SESSION['admin_mail'], $_SESSION['admin_pass']);

    if(isset($_POST['logout'])){
        $status =  $adminController->logout();
        if($status){
            header('Location: ./index.php');
        }else{
            echo 'error';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets('../user/')?>
    <title>Espace d'admin</title>
</head>
<body>
    <?php $header->create(); ?>
    <div class="profile-container">
        <div class="inner-container">
            <img src="../assets/icons/acc.png" class="minified-profile-image"/>
            <div class="profile-description">   
                <ul>
                    <li class="important">Nom complet: <?php echo $admin->nom_admin.' '.$admin->prenom_admin; ?></li>
                    <li class="text">Date de naissance: <?php echo $admin->date_naissance_admin; ?></li>
                </ul>
            </div>
        </div>
        <form method="post">
        <input type="submit" name="logout" id="logout" class="button-logout" value="Logout" />
        </form>
        <hr>
    </div>
    <div class="settings-container">
    <?php 
        $miniCard->create('Gestion des articles','article','Ajouter ou surprimer un article','./articleManager.php');
        $miniCard->create('Gestion de presentation','presentation','Modifier en ajoutant ou surprimant des paragraphs','./presentationManager.php');
        $miniCard->create('Gestion d\'emplois','time','Ajouter, Modifier ou suprimer les emplois','./emploiManager.php');
        $miniCard->create('Gestion des enseignants','teachers','Modifier leur classes et heurs de reception','./ensManager.php');
        $miniCard->create('Gestion des utilisateurs','users','Modifier les info des utilisateurs','./userManager.php');
        $miniCard->create('Gestion de restauration','restau','Modifier les informations sur la restauration','./restauManager.php');
        $miniCard->create('Gestion de diaporama','presentation','Ajouter ou surprimer des images','./diapoManager.php');
    ?>
    </div>
    <?php $footer->createMinified(); ?>
</body>
</html>