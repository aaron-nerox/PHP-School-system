<?php

class Article extends Loader{
    
    private $db_conn;

    /**
     * instanciate our database using the loader function
     */
    public function __construct()
    {
        $this->InstatiateDB('DbConnection');
        $this->db_conn = $this->DbConnection->db_connect('localhost','ecole_db','root','');
    }

    /**
     * Add an article
     */
    public function addArticle($titleArticle, $description, $imageLink, $scope){
        $sql = 'INSERT INTO 
        article(titre_article,lien_image_article,description_article,id_scope) 
        VALUES(:title,:ar_desc,:link,:scope)';
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['title'=>$titleArticle
            , 'ar_desc'=>$description,'link'=>$imageLink, 'scope'=>$scope]);
        
        return $result;
    }

    /**
     * get all articles from the database
     */
    public function getAllArticles(){
        $sql = "SELECT * FROM article";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute();

        return $statment->fetchAll();
    }

    /**
     * get an article by it's ID
     */
    public function getArticleById($id){
        $sql = "SELECT * FROM article WHERE id_article= :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$id]);

        return $statment->fetch();
    }

    /**
     * update an article providing the field to update,the id and the new update.
     */
    public function updateArticle($id,$field,$newUpdate){
        $sql = "UPDATE article SET $field = :newupdate WHERE id_article = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['newupdate'=>$newUpdate,'id'=>$id]);
        
        return $result;
    }

    /**
     * delete an article providing it's id
     */
    public function deleteArticle($id){
        $sql = "DELETE FROM article WHERE id_article = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['id'=>$id]);

        return $result;
    }
}
