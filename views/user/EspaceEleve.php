<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $eleveControler = Loader::loadClassInstance('controllers', 'EleveController');

    session_start();
    if(!isset($_SESSION['student_mail'])){
        header('Location: ./EspaceEleveLogin.php');
    }
    $student = $eleveControler->getStudent($_SESSION['student_mail'], $_SESSION['student_pass']);

    if(isset($_POST['logout'])){
        $status = $eleveControler->logout();
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
    <title>Espace des élèves</title>
</head>
<body>
    <?php $header->create(); ?>
    <div class="profile-container">
        <div class="inner-container">
            <img src="../assets/icons/acc.png" class="profile-image"/>
            <div class="profile-description">
                <ul>
                    <li class="important">Nom complet: <?php echo $student->nom_eleve.' '.$student->prenom_eleve; ?></li>
                    <li class="text">Date de naissance: <?php echo $student->date_naissance_eleve; ?></li>
                    <li class="important">ID: <?php echo $student->id_eleve; ?></li>
                    <li class="text">Class/Année: <?php echo $student->class_eleve.'/'.$student->anne_etude; ?></li>
                </ul>
            </div>
        </div>
        <form method="post">
        <input type="submit" name="logout" id="logout" class="button-logout" value="Logout" />
        </form>
        <hr>
    </div>
    
    <center><p class="title">votre emploi du temps</p></center>
    <center><p class="title">vos notes</p></center>
    <table>
        <thead>
            <th>Class</th>
            <th>Note</th>
        </thead>
        <tbody>
            <?php $results = $eleveControler->getNotes($student->id_eleve);
            foreach($results as $result): ?>
                <tr>
                    <th class="text"><?php echo $result->class; ?></th>
                    <th class="important"><?php echo $result->note; ?>/20</th>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <center><p class="title">vos activités extrascolaires</p></center>
    <table>
        <thead>
            <th>Nom d'activité</th>
        </thead>
        <tbody>
            <?php $results = $eleveControler->getExtraActs($student->id_eleve);
            for($i =0; $i < count($results); $i++): ?>
                <tr>
                    <th class="important"><?php echo $results[$i]; ?></th>
                </tr>
            <?php endfor;?>
        </tbody>
    </table>
    <?php $footer->create(); ?>
</body>
</html>