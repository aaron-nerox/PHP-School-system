<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $eleveControler = Loader::loadClassInstance('controllers', 'EleveController');
    $controller = Loader::loadClassInstance('controllers', 'EmploiController');
    $parentController = Loader::loadClassInstance('controllers', 'ParentController');

    $times = ['8:00','10:00','12:00','13:00'];
    $days = ['dimanch', 'lundi','mardi','mercredi','jeudi'];

    if(isset($_GET['student'])){
        $student = $eleveControler->getStudentById($_GET['student']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets('')?>
    <title>Les details d'enfant</title>
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
    </div>
    
    <center><p class="title">emploi du temps</p></center>
    <table>
            <thead>
                <th></th>
                <th>8:00 -> 10:00</th>
                <th>10:00 -> 12:00</th>
                <th>12:00 -> 13:00</th>
                <th>13:00 -> 15:00</th>
            </thead>
            <tbody>
                <?php for($x = 0; $x<5; $x++): ?>
                <tr>
                    <td><?php echo $days[$x]; ?></th>
                    <?php for($i=0; $i<4; $i++): ?>
                    <th><?php echo $controller->getClassFromEmploi('sec_1',$days[$x],$times[$i]);?></th>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>

    <center><p class="title">Les notes</p></center>
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
    <center><p class="title">Les activités extrascolaires</p></center>
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
    <center><p class="title">Les remarques de ses enseignants</p></center>
    <table>
        <thead>
            <th>Enseignant</th>
            <th>Leur remarque</th>
        </thead>
        <tbody>
            <?php $remarques = $parentController->getSonRemarques($student->id_eleve); 
                foreach($remarques as $remarque): ?>
                <tr>
                    <th><?php echo $parentController->getTeacherById($remarque->id_enseignant); ?></th>
                    <th><?php echo $remarque->remarque_detail; ?></th>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <?php $footer->create(); ?>
</body>
</html>