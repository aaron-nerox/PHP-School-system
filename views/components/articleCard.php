<?php

class ArticleCard{

    public function __construct()
    {
        
    }

    public function render($articles){
        echo '<div class="articles-container">';
            foreach($articles as $article){
                echo '<div class="article-card">';
                    echo '<p class="important article-title">'.$article->titre_article.'</p>';
                    echo '<img src="http://localhost/projettdw/storage/'.$article->lien_image_article.'" class="article-image">';
                    echo '<p class="text article-text">'.$article->description_article.'</p>';
                    echo '<a href="./articlePage.php?article='.$article->titre_article.'">';
                        echo '<button class="button-article" >Afficher plus</button>';
                    echo '</a>';
                echo '</div>';
            }
        echo '</div>';
    }
}