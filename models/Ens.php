<?php

class Ens extends Loader{
    private $db_conn;

    /**
     * instanciate our database using the loader function
     */
    public function __construct()
    {
        $this->InstatiateDB('DbConnection');
        $this->db_conn = $this->DbConnection->db_connect('localhost','ecole_db','root','');
    }

    //TODO: add the remarque to students

    /**
     * a function that modifies the class that a teacher is ocupying
     */
    public function modifyClass($oldClass ,$newClass, $idEns){
        $sql = "UPDATE horair_travail_ens SET class_ens = :updt 
                    WHERE id_enseignant = :id AND class_ens = :class";

        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$newClass,'id'=>$idEns,'class'=>$oldClass]);
        
        return $result;
    }

    /**
     * a function that modifies a teacher's reception time
     */
    public function modifyEnsHour($idEns,$newHour){
        $sql = "UPDATE enseignant SET heur_reception_ens = :updt WHERE id_enseignant = :id";

        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$newHour,'id'=>$idEns]);
        
        return $result;
    }

    /**
     * a function that modifies the hour of a teacher's class
     */
    public function modifyHourClassTeacher($class,$newHour,$idEns){
        $sql = "UPDATE horair_travail_ens SET heur_class_ens = :updt 
                    WHERE id_enseignant = :id AND class_ens = :class";

        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$newHour,'id'=>$idEns,'class'=>$class]);
        
        return $result;
    }

    /**
     * a function that modifies the teacher's info
     */
    public function updateEns($idEns,$field,$value){
        $sql = "UPDATE enseignant SET $field = :updt WHERE id_enseignant = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$value,'id'=>$idEns]);
        
        return $result;
    }

    /**
     * a function that gets all the teachers
     */
    public function getEns(){
        $sql = "SELECT * FROM enseignant";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute();

        return $statment->fetchAll();
    }

    /**
     * get teacher by it's id
     */
    public function getTeacherById($id){
        $sql = "SELECT * FROM enseignant WHERE id_enseignant = :id";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        $result = $statement->fetch();

        return $result;
    }

    /**
     * a function that returns the teachers by the cycle
     */
    public function getEnsByCycle($cycle){
        $sql = "SELECT * FROM enseignant WHERE cycle_ens = :cycle";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['cycle'=>$cycle]);

        return $statment->fetchAll();
    }

    /**
     * a function that gets all the classes held by a specified teacher
     */
    public function getEnsClasses($idEns){
        $sql = "SELECT * FROM horair_travail_ens WHERE id_enseignant = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idEns]);

        return $statment->fetchAll();
    }

    /**
     * get all students
     */
    public function getStudents(){
        $sql = "SELECT * FROM eleve";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute();

        return $statment->fetchAll();
    }

    /**
     * get a student's emploi by it's id
     */
    public function getEmploi($idEmploi){
        $sql = "SELECT * FROM emplois_temps WHERE id_emploi = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idEmploi]);

        return $statment->fetch();
    }

    /**
     * a function that deletes a teacher
     */
    public function deleteEns($idEns){
        $sql = "DELETE FROM enseignant WHERE id_enseignant = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['id'=>$idEns]);

        return $result;
    }

}