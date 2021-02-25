<?php
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');
    $diaporama = Loader::loadClassInstance('views/components','Slider');
    $menu = Loader::loadClassInstance('views/components','Menu');

    $presController = Loader::loadClassInstance('controllers', 'PresentationController');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets(''); ?>
    <title>Presentation de l'ecole</title>
</head>
<body>
    <?php $header->create();
        $diaporama->create();
        $menu->create(1);
        $paragraphs = $presController->getAllParagraphs();
        ?>
    <center><p class="title">La presentation de notre ecole:</p></center>
    <div class="main-presentation-container" >
        <?php foreach($paragraphs as $paragraph): ?>
            <div>
                <img class="main-presentation-image" src="<?php echo $paragraph->lien_image_pres; ?>" alt="image">
                <p class="text main-presentation-text"><?php echo $paragraph->paragraphe_pres; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <?php  $footer->create(); ?>
    <script src="./scripts/UtilScript.js"></script>
</body>
</html>