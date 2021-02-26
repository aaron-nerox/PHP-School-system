<?php

class Presentation extends Loader{
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
     * a function to get all presentation paragraphs with images
     */
    public function getAllParagraphs(){
        $sql = "SELECT * FROM presentation";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute();

        return $statment->fetchAll();
    }

    /**
     * a function to add an image to a paragraph
     */
    public function addParagraphImage($link,$id){
        $sql = "UPDATE presentation SET lien_image_pres = :link WHERE id_paragraphe = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['link'=>$link,'id'=>$id]);
        
        return $result;
    }

    /**
     * a function to remove the paragraph providing it's Id
     */
    public function removeParagraph($id){
        $sql = "DELETE FROM presentation WHERE id_paragraphe = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['id'=>$id]);

        return $result;
    }

    /**
     * a function that adds the paragraph to the database
     */
    public function addParagraph($text,$link){
        $sql = 'INSERT INTO 
        presentation(paragraphe_pres,lien_image_pres) 
        VALUES(:paragraph,:link)';
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['paragraph'=>$text,'link'=>$link]);
        
        return $result;
    }

    /**
     * a function to modify a paragraph
     */
    public function updateParagraph($newText,$id){
        $sql = "UPDATE presentation SET paragraphe_pres = :updt WHERE id_paragraphe = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$newText,'id'=>$id]);
        
        return $result;
    }

}