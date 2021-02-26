<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $parentControler = Loader::loadClassInstance('controllers', 'ParentController');

    session_start();
    if(!isset($_SESSION['parent_mail'])){
        header('Location: ./EspaceEleveLogin.php');
    }
    $parent = $parentControler->getParent($_SESSION['parent_mail'], $_SESSION['parent_pass']);

    if(isset($_POST['logout'])){
        $status = $parentControler->logout();
        if($status){
            header('Location: ./EspaceEleveLogin.php');
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
    <?php Loader::loadStyleSheets('')?>
    <title>Espace des Parents</title>
</head>
<body>
    <?php $header->create();?>
    <div class="profile-container">
        <div class="inner-container">
            <img src="../assets/icons/acc.png" class="profile-image-parent"/>
            <div class="profile-description">
                <ul>
                    <li class="important">Nom complet: <?php echo $parent->nom_parent.' '.$parent->prenom_parent; ?></li>
                    <li class="text">Date de naissance: <?php echo $parent->date_naissance_parent; ?></li>
                    <li class="important">ID: <?php echo $parent->id_parent; ?></li>
                </ul>
            </div>
        </div>
        <form method="post">
        <input type="submit" name="logout" id="logout" class="button-logout" value="Logout" />
        </form>
        <hr>
    </div>
    <?php $footer->create(); ?>
</body>
</html>