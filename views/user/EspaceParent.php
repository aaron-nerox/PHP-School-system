<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $parentController = Loader::loadClassInstance('controllers', 'ParentController');

    session_start();
    if(!isset($_SESSION['parent_mail'])){
        header('Location: ./EspaceParentLogin.php');
    }

    $parent = $parentController->getParent($_SESSION['parent_mail'], $_SESSION['parent_pass']);
    $sons = $parentController->getSonsList($parent->id_parent);
    if(isset($_POST['logout'])){
        $status = $parentController->logout();
        if($status){
            header('Location: ./EspaceParentLogin.php');
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
    <center><p class="title">vos enfants</p></center>
    <table>
        <thead>
            <th>Enfant</th>
            <th>Anné d'étude</th>
            <th>Cycle</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                foreach($sons as $student): ?>
                <tr>
                    <th class="important"><?php echo $student->nom_eleve.' '.$student->prenom_eleve; ?></th>
                    <th class="important"><?php echo $student->anne_etude; ?></th>
                    <th class="important"><?php echo $student->class_eleve; ?></th>
                    <th>
                    <a href="./studentDetails.php?student=<?php echo $student->id_eleve; ?>"><button class="mn-button">Voir le profile</button></a>
                    </th>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php $footer->create(); ?>
</body>
</html>