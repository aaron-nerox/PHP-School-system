<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $eleveControler = Loader::loadClassInstance('controllers', 'EleveController');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets()?>
    <title>Espace des élèves</title>
</head>
<body>
    <?php $header->create(); 

        $footer->create(); ?>
</body>
</html>