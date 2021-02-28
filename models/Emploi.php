<?php 

class Emploi extends Loader{

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
     * a function that gets a planing by it's tag
     */
    public function getEmploiByTag($tag){
        $sql = "SELECT * FROM emplois_temps WHERE tag_emploi = :tag";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['tag'=>$tag]);

        return $statment->fetchAll();
    }

    /**
     * a function that gets the class name witout a contraint
     */
    public function getClassByContraint($tag,$day,$hour){
        $sql = "SELECT * FROM emplois_temps WHERE tag_emploi = :tag AND day_emploi = :dt AND heur_debut = :hr";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['tag'=>$tag,'dt'=> $day, 'hr'=>$hour]);

        return $statment->fetch();
    }

    /**
     * a function that modifies the name of the class or adds it
     */
    public function setClassByContraint($tag,$day,$hour,$value){
        $sql = "UPDATE emplois_temps SET class_emploi = :val WHERE tag_emploi = :tag AND day_emploi = :dt AND heur_debut = :hr";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['val'=>$value,'tag'=>$tag,'dt'=> $day, 'hr'=>$hour]);

        return $result;
    }

    public function addClass($tag,$day,$beginhour,$endHour,$cycle,$value){
        $sql = "INSERT INTO emplois_temps(tag_emploi,
            day_emploi,cycle_emploi,class_emploi,heur_debut,heur_fin)
            VALUES (:tag,:dy,:cycle,:class,:hrd,:hrf)";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['tag'=>$tag,'dy'=>$day
        ,'cycle'=>$cycle,'class'=>$value,'hrd'=>$beginhour,'hrf'=>$endHour]);

        return $result;
    }


}