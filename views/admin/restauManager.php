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
    $restauController =Loader::loadClassInstance('controllers', 'RestauController');

    $meals = $restauController->getMeals();
    /**
     * update the restaurant
     */
    if(isset($_POST['update-restau'])){
        foreach($meals as $meal){
            $inputMeal = htmlentities($_POST['meal-'.$meal->jour_repas]);
            $inputDessert = htmlentities($_POST['dessert-'.$meal->jour_repas]);

            $currentMeal = $meal->nom_repas;
            $currentDessert = $meal->nom_dessert;

            if($inputMeal !== $currentMeal && $inputDessert !== $currentDessert){
                echo $restauController->updateMeal($inputMeal,$inputDessert, $meal->jour_repas);
            }elseif($inputMeal !== $currentMeal){
                $restauController->modifyMeal($inputMeal, $meal->jour_repas);
            }elseif($inputDessert !== $currentDessert){
                $restauController->modifyDessert($inputDessert, $meal->jour_repas);
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
    <title>Gestinaire de restauration</title>
</head>
<body>
    <?php $header->create(); ?>

    <center><p class="title">Programme de restauration</p></center>
    <form method="post" align="center" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table>
            <thead>
                <th>Jour</th>
                <th>Repas principale</th>
                <th>Dessert</th>
            </thead>
            <tbody>
                <?php foreach($meals as $meal): ?>
                    <tr>
                        <th class="important"><?php echo $meal->jour_repas; ?></th>
                        <th class="text">
                            <input type="text" name="meal-<?php echo $meal->jour_repas; ?>" value="<?php echo $meal->nom_repas; ?>">
                        </th>
                        <th class="text">
                        <input type="text" name="dessert-<?php echo $meal->jour_repas; ?>" value="<?php echo $meal->nom_dessert; ?>">
                        </th>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <input type="submit" name="update-restau" value="Sauvegarder" id="submit"/>
    </form>
    <?php $footer->createMinified(); ?>
    <script src="../user/scripts/UtilScript.js"></script>
</body>
</html>