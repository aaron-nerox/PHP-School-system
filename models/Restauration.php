<?php

class Restauration extends Loader{
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
     * a function to modify a meal in a specifique day
     */
    public function updateMeal($newMeal, $day){
        $sql = "UPDATE restaurant SET nom_repas = :updt WHERE jour_repas = :dayWeek";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$newMeal,'dayWeek'=>$day]);
        
        return $result;
    }

    /**
     * a function that gets all the meals
     */
    public function getAllMeals(){
        $sql = "SELECT * FROM restaurant";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute();
        
        return $statment->fetchAll();
    }
}