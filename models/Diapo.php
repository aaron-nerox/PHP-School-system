<?php

class Diapo extends Loader{

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
     * function that gets all the image links for diaporama
     */
    public function getAllDiapo(){
        $sql = "SELECT * FROM diaporama";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute();

        return $statment->fetchAll();
    }

    /**
     * a function that deletes an image from the diaporama providing it's id
     */
    public function deleteDiapo($id){
        $sql = "DELETE FROM diaporama WHERE id_diaporama = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['id'=>$id]);

        return $result;
    }

    /**
     * a function that adds an image to the diaporama
     */
    public function addDiapo($link){
        $sql = 'INSERT INTO diaporama(lien_img_diaporama) VALUES(:link)';
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['link'=>$link]);
        
        return $result;
    }
}