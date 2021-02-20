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
        
    }

}