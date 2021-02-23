<?php

class ArticleController extends Loader{

    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Article');
        $this->ModelArray['Article'] = $this->Article;
    }

    /**
     * returns all articles
     */
    public function getAllArticles(){
        return $this->ModelArray['Article']->getAllArticles();
    }

    /**
     * returns all the articles by thier scope
     */
    public function getArticlesByScope($idScope){
        return $this->ModelArray['Article']->getArticlesByScope($idScope);
    }

    /**
     * returns an article by it's ID
     */
    public function getArticle($id){
        return $this->ModelArray['Article']->getArticleById($id);
    }

    /**
     * returns an article by it's title
     */
    public function getArticleByName($name){
        return $this->ModelArray['Article']->getArticleByName($name);
    }

    /**
     * returns if the article was added or not
     */
    public function addArticle($titleArticle, $description, $imageLink, $scope){
        return $this->ModelArray['Article']->
            addArticle($titleArticle, $description, $imageLink, $scope);
    }

    /**
     * returns if the article was updated or not
     */
    public function updateArticle($id,$field,$newUpdate){
        return $this->ModelArray['Article']->updateArticle($id,$field,$newUpdate);
    }

    /**
     * returns if the article is deleted or not
     */
    public function deleteArticle($id){
        return $this->ModelArray['Article']->deleteArticle($id);
    }

}


