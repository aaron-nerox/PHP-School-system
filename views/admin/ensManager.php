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

    $ensList = $ensController->getTeachers();
    /**
     * update the restaurant
     */
    if(isset($_POST['update-teacher'])){
        $i = 0;
        foreach($ensList as $ens){
            $classes = $ensController->getClassesByEns($ens->id_enseignant);
            foreach($classes as $class){
                $inputClass = htmlentities($_POST[$i.'_'.$class->class_ens]);
                $inputHTrav = htmlentities($_POST[$i.'_'.$class->heur_class_ens]);
                $inputHRec = htmlentities($_POST[$i.'_'.$ens->id_enseignant]);

                if($inputClass !== $class->class_ens || $inputHTrav !== $class->heur_class_ens){
                    $ensController->modifyEnsHours($class->class_ens,
                                        $inputClass,$inputHTrav,$ens->id_enseignant);
                }elseif($inputHRec !== $ens->heur_reception_ens){
                    echo $ensController->modifyReceptionHour($ens->id_enseignant,$inputHRec);
                }
                $i++;
            }
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
    <title>Gestinaire des horairs Ens</title>
</head>
<body>
    <?php $header->create(); ?>

    <center><p class="title">List des ensiegnants</p></center>
    <form method="post" align="center" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table>
            <thead>
                <th>Enseignant</th>
                <th>Class</th>
                <th>Heur de travail</th>
                <th>heur de reception</th>
            </thead>
            <tbody>
                <?php 
                    $i = 0;
                    foreach($ensList as $ens): 
                    $classes = $ensController->getClassesByEns($ens->id_enseignant);
                    foreach($classes as $class):?>
                    <tr>
                        <th class="important"><?php echo $ens->nom_ens.' '.$ens->prenom_ens; ?></th>
                        <th class="text">
                            <input type="text" id="<?php echo $i.'_'.$class->class_ens; ?>" 
                            name="<?php echo $i.'_'.$class->class_ens; ?>" 
                            value="<?php echo $class->class_ens; ?>">
                        </th>
                        <th class="text">
                            <input type="text" id="<?php echo $i.'_'.$class->heur_class_ens; ?>" 
                            name="<?php echo $i.'_'.$class->heur_class_ens; ?>" 
                            value="<?php echo $class->heur_class_ens; ?>">
                        </th>
                        <th class="text">
                            <input type="text" id="<?php echo $i.'_'.$ens->id_enseignant; ?>" 
                            name="<?php echo $i.'_'.$ens->id_enseignant; ?>" 
                            value="<?php echo $ens->heur_reception_ens; ?>">
                        </th>
                    </tr>
                    <?php $i++;?>
                    <?php endforeach; ?>
                <?php endforeach;?>
            </tbody>
        </table>
        <input type="submit" name="update-teacher" value="Sauvegarder" id="submit"/>
    </form>
    <?php $footer->createMinified(); ?>
    <script src="../user/scripts/UtilScript.js"></script>
</body>
</html>