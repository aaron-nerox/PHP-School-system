<?php

include('../../utils/Loader.php');

if(isset($_GET['article'])){
    $articleTitle = htmlentities($_GET['article']);
    $articleController = Loader::loadClassInstance('controllers','ArticleController');

    $article = $articleController->getArticleByName($articleTitle);
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
    echo $article->description_article;
        
    ?>
</body>
</html>