<?php
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');
    $diaporama = Loader::loadClassInstance('views/components','Slider');
    $menu = Loader::loadClassInstance('views/components','Menu');
    $articlecard = Loader::loadClassInstance('views/components','ArticleCard');

    $articleController = Loader::loadClassInstance('controllers','ArticleController');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets(''); ?>
    <title>Cycle Secondaire</title>
</head>
<body>
    <?php $header->create();
        $diaporama->create();
        $menu->create(4);
    ?>
    <center><p class="title">Découvrir le cycle secondaire :</p></center>
    <div class="articles-container">
        <div class="info-card">
            <p class="important info-title">les emplois du temps global du cycle</p>
            <img src="../assets/icons/time.png" alt="time-icon" class="article-image" />
            <p class="text info-text">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
            </p>
            <a href="./Details.php?info_mode=emploi&cycle=sec">
                <button class="button-article">Afficher plus</button>
            </a>
        </div>
        <div class="info-card">
            <p class="important info-title">la list des ensiegnants du cycle</p>
            <img src="../assets/icons/teachers.png" alt="time-icon" class="article-image" />
            <p class="text info-text">
                découvrire notre list d'enseignants et leur heur exact de reception, random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
            </p>
            <a href="./Details.php?info_mode=ens&cycle=secondaire">
                <button class="button-article">Afficher plus</button>
            </a>
        </div>
        <div class="info-card">
            <p class="important info-title">Des informations pratiques sur le cycle</p>
            <img src="../assets/icons/info.png" alt="time-icon" class="article-image" />
            <p class="text info-text">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
            </p>
            <a href="./articlePage.php?article=les bonnes pratiques">
                <button class="button-article">Afficher plus</button>
            </a>
        </div>
        <div class="info-card">
            <p class="important info-title">des informations sur la restauration</p>
            <img src="../assets/icons/restau.png" alt="time-icon" class="article-image" />
            <p class="text info-text">
                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
            </p>
            <a href="./Details.php?info_mode=restau&cycle=secondaire">
                <button class="button-article">Afficher plus</button>
            </a>
        </div>
    </div>
    <center><p class="title">Nos articles concernant le cycle secondaire:</p></center>
    <?php
        $articles = $articleController->getArticlesByScope(5);
        $articlecard->render($articles);
    ?>
    <?php  $footer->create(); ?>
    <script src="./scripts/UtilScript.js"></script>
</body>
</html>