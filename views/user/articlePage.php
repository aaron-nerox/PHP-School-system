<?php
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $articleController = Loader::loadClassInstance('controllers','ArticleController');


    if(isset($_GET['article'])){
        $articleTitle = htmlentities($_GET['article']);
        $article = $articleController->getArticleByName($articleTitle);
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets(''); ?>
    <title><?php $article->titre_article; ?></title>
</head>
<body>
    <?php $header->create();?>
    <div class="main-article-container">
        <p class="title"><?php echo $article->titre_article; ?></p>
        <img class="main-article-image" src="http://localhost/projettdw/storage/<?php echo $article->lien_image_article; ?>" alt="image" />
        <p class="text main-article-text"><?php echo $article->description_article; ?></p>
    </div>
    <?php $footer->create(); ?>
</body>
</html>