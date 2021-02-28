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
    $ensController =Loader::loadClassInstance('controllers', 'EnsController');
    $parentController =Loader::loadClassInstance('controllers', 'ParentController');
    $eleveController =Loader::loadClassInstance('controllers', 'EleveController');

    $ensList = $ensController->getTeachers();
    $parentList = $parentController->getParents();
    $students = $eleveController->getAllStudents();

    /**
     * remove a teacher
     */
    if(isset($_GET['delens'])){
        if($ensController->deleteEns($_GET['delens'])){
            header('Location: ./userManager.php');
        }
    }

    /**
     * remove a parent
     */
    if(isset($_GET['delparent'])){
        if($parentController->deleteParent($_GET['delparent'])){
            header('Location: ./userManager.php');
        }
    }

    /**
     * remove a student
     */
    if(isset($_GET['delstudent'])){
        if($eleveController->deleteStudent($_GET['delstudent'])){
            header('Location: ./userManager.php');
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
    <title>Gestinaire des utilisateurs</title>
</head>
<body>
    <?php $header->create(); ?>

    <center><p class="title">List des ensiegnants</p></center>
    <table>
        <thead>
            <th>Enseignant</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <?php
                foreach($ensList as $ens): ?>
                <tr>
                    <th class="important"><?php echo $ens->nom_ens.' '.$ens->prenom_ens; ?></th>
                    <th>
                    <a href="./userPage.php?ens=<?php echo $ens->id_enseignant; ?>"><button class="mn-button">Modifier utilisateur</button></a>
                    </th>
                    <th>
                        <a href="./userManager.php?delens=<?php echo $ens->id_enseignant;?>" >
                            <button class="mn-button">Suprimer</button>
                        </a>
                    </th>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <center><p class="title">List des parents</p></center>
    <table>
        <thead>
            <th>Parent</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <?php
                foreach($parentList as $parent): ?>
                <tr>
                    <th class="important"><?php echo $parent->nom_parent.' '.$parent->prenom_parent; ?></th>
                    <th>
                    <a href="./userPage.php?parent=<?php echo $parent->id_parent; ?>"><button class="mn-button">Modifier utilisateur</button></a>
                    </th>
                    <th>
                        <a href="./userManager.php?delparent=<?php echo $parent->id_parent;?>" >
                            <button class="mn-button">Suprimer</button>
                        </a>
                    </th>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <center><p class="title">List des eleves</p></center>
    <table>
        <thead>
            <th>Eleve</th>
            <th>Anné d'étude</th>
            <th>Cycle</th>
            <th colspan="2">Actions</th>
        </thead>
        <tbody>
            <?php
                foreach($students as $student): ?>
                <tr>
                    <th class="important"><?php echo $student->nom_eleve.' '.$student->prenom_eleve; ?></th>
                    <th class="important"><?php echo $student->anne_etude; ?></th>
                    <th class="important"><?php echo $student->class_eleve; ?></th>
                    <th>
                    <a href="./userPage.php?student=<?php echo $student->id_eleve; ?>"><button class="mn-button">Modifier utilisateur</button></a>
                    </th>
                    <th>
                        <a href="./userManager.php?delstudent=<?php echo $student->id_eleve;?>" >
                            <button class="mn-button">Suprimer</button>
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