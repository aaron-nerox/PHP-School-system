<?php
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');
    $menu = Loader::loadClassInstance('views/components','Menu');
    $diaporama = Loader::loadClassInstance('views/components','Slider');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets(); ?>
    <title>Ecole de formations</title>
</head>
<body>
    <?php $header->create();
        $diaporama->create();
        $menu->create(6);?>
    <?php  $footer->create(); ?>
    <script src="./scripts/UtilScript.js"></script>
</body>
</html>