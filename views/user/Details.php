<?php
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $infoMode;
    $cycle;
    $pageTitle;
    $controller;
    $tagPreset;
    $times = ['8:00','10:00','12:00','13:00'];
    $days = ['dimanch', 'lundi','mardi','mercredi','jeudi'];
    $tags;

    if(isset($_GET['info_mode']) && isset($_GET['cycle'])){
        $infoMode = htmlentities($_GET['info_mode']);
        $cycle = htmlentities($_GET['cycle']);
        if($cycle === 'primaire'){
            $tagPreset = 'pre';
        }elseif($cycle === 'moyen'){
            $tagPreset = 'moy';
        }else{
            $tagPreset = 'sec';
        }
        switch($infoMode){
            case 'emploi':
                $pageTitle = 'La list des emplois de temps';
                $controller = Loader::loadClassInstance('controllers', 'EmploiController');
                $tags = $controller->getTags();
                break;
            case 'ens':
                $pageTitle = 'La list des enseignants';
                $controller = Loader::loadClassInstance('controllers', 'EnsController');
                break;
            case 'restau':
                $pageTitle = 'Des info sur la restauration';
                $controller = Loader::loadClassInstance('controllers','RestauController');
                break;
        }
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets(''); ?>
    <title><?php echo $pageTitle ?></title>
</head>
<body>
    <?php $header->create();
     if($infoMode === 'emploi'): ?>
        <center><p class="title">Les emplois de temps de cycle <?php echo $cycle; ?>:</p></center>
        <?php foreach($tags as $tag): 
            if(substr($tag->tag_emploi,0,3)===$tagPreset):?>
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
                    <th><?php echo $controller->getClassFromEmploi($tag->tag_emploi,$days[$x],$times[$i]);?></th>
                    <?php endfor; ?>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <?php endif; endforeach; ?>
    <?php elseif($infoMode === 'ens'): ?>
        <center><p class="title">La list de notre ensiegnants:</p></center>
        <table>
            <thead>
                <th>Nome de l'enseignant</th>
                <th>Prenom de l'enseignant</th>
                <th>Heur de reception</th>
            </thead>
            <tbody>
                <?php $results = $controller->getTeachersByCycle($cycle);
                foreach($results as $result): ?>
                    <tr>
                        <th class="text"><?php echo $result->nom_ens; ?></th>
                        <th class="text"> <?php echo $result->prenom_ens; ?></th>
                        <th class="important"><?php echo $result->heur_reception_ens; ?></th>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php elseif($infoMode === 'restau'): ?>
        <center><p class="title">Le plan de notre restauration:</p></center>
        <table>
            <thead>
                <th>Jour</th>
                <th>Nom de repas</th>
                <th>Nom de déssert</th>
            </thead>
            <tbody>
                <?php $results = $controller->getMeals();
                foreach($results as $result): ?>
                    <tr>
                        <th class="important"><?php echo $result->jour_repas; ?> :</th>
                        <th class="text"> <?php echo $result->nom_repas; ?></th>
                        <th class="text"><?php echo $result->nom_dessert; ?></th>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;
    $footer->create(); ?>
</body>
</html>