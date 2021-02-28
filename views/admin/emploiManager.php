<?php
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $controller = Loader::loadClassInstance('controllers', 'EmploiController');

    $times = ['8:00','10:00','12:00','13:00','15:00'];
    $days = ['dimanch', 'lundi','mardi','mercredi','jeudi'];
    
    for($x =0;$x<5;$x++){
        if(isset($_POST['submit'.$days[$x]])){
            for($i=0;$i<4;$i++){
                $currentValue = $controller->getClassFromEmploi('sec_1',$days[$x],$times[$i]);
                $inputValue = htmlentities($_POST['class'.$days[$x].$times[$i].'sec_1']);
                if($currentValue !== $inputValue){
                    $controller->setClassFromEmploi('sec_1',$days[$x],$times[$i],$inputValue);
                }
            }
        }
    }

    if(isset($_POST['add-emploi'])){
        for($x=0;$x<5;$x++){
            for($i=0;$i<4;$i++){
                $tag = htmlentities($_POST['tagname']);
                $className = htmlentities($_POST['class'.$days[$x].$times[$i]]);
                $cycleName = $_POST['cyclename'];
                echo $controller-> addClass($tag,$days[$x],$times[$i],$times[$i+1],$cycleName,$className);
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
    <?php Loader::loadStyleSheets('../user/'); ?>
    <title>Gestion des emplois</title>
</head>
<body>
    <?php $header->create(); ?>
        <center><p class="title">Ajouter un emploi de temps :</p></center>
        <form method="post" align="center">
            <input type="text" name="tagname" placeholder="tag de tableau(cycle+année)" class="input">
            <select name="cyclename" size="1" class="input">
                <option value="primaire">Primaire</option>
                <option value="moyen">Moyen</option>
                <option value="secondaire">Secondaire</option>
            </select>
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
                        <th><?php echo $days[$x]; ?></th>
                        <?php for($i=0; $i<4; $i++): ?>
                        <th><input type="text" name="<?php echo "class$days[$x]$times[$i]"; ?>" value="--"></th>
                        <?php endfor; ?>
                    </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
            <input type="submit" name="add-emploi" id="submit" value="Ajouter le tableau"/>
        </form>
        <center><p class="title">Les emplois de temps :</p></center>
        <center><p class="important">Primaire</p></center>
        <table>
            <thead>
                <th></th>
                <th>8:00 -> 10:00</th>
                <th>10:00 -> 12:00</th>
                <th>12:00 -> 13:00</th>
                <th>13:00 -> 15:00</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php for($x = 0; $x<5; $x++): ?>
                <tr>
                    <th><?php echo $days[$x]; ?></th>
                    <form method="post">
                    <?php for($i=0; $i<4; $i++): ?>
                    <th><input type="text" name="<?php echo "class$days[$x]$times[$i]pre_1"; ?>" value="<?php echo $controller->getClassFromEmploi('pre_1',$days[$x],$times[$i]);?>"></th>
                    <?php endfor; ?>
                    <th><input name="submit<?php echo $days[$x]; ?>" class="mn-button" type="submit" value="confirmer"></th>
                    </form>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <center><p class="important">Moyenne</p></center>
        <table>
            <thead>
                <th></th>
                <th>8:00 -> 10:00</th>
                <th>10:00 -> 12:00</th>
                <th>12:00 -> 13:00</th>
                <th>13:00 -> 15:00</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php for($x = 0; $x<5; $x++): ?>
                <tr>
                    <th><?php echo $days[$x]; ?></th>
                    <form method="post">
                    <?php for($i=0; $i<4; $i++): ?>
                    <th><input type="text" name="<?php echo "class$days[$x]$times[$i]sec_1"; ?>" value="<?php echo $controller->getClassFromEmploi('sec_1',$days[$x],$times[$i]);?>"></th>
                    <?php endfor; ?>
                    <th><input name="submit<?php echo $days[$x]; ?>" type="submit" value="confirmer" class="mn-button"></th>
                    </form>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <center><p class="important">Secondaire</p></center>
        <table>
            <thead>
                <th></th>
                <th>8:00 -> 10:00</th>
                <th>10:00 -> 12:00</th>
                <th>12:00 -> 13:00</th>
                <th>13:00 -> 15:00</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php for($x = 0; $x<5; $x++): ?>
                <tr>
                    <th><?php echo $days[$x]; ?></th>
                    <form method="post">
                    <?php for($i=0; $i<4; $i++): ?>
                    <th><input type="text" name="<?php echo "class$days[$x]$times[$i]sec_1"; ?>" value="<?php echo $controller->getClassFromEmploi('sec_1',$days[$x],$times[$i]);?>"></th>
                    <?php endfor; ?>
                    <th><input name="submit<?php echo $days[$x]; ?>" class="mn-button" type="submit" value="confirmer"></th>
                    </form>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    <?php $footer->createMinified(); ?>
</body>
</html>