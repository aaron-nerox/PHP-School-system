<?php

class SParent extends Loader{
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
     * a function that logs in and returns the profile of a parent and starts a session
     */
    public function logIn($email,$password){
        if(!empty($email)&&!empty($password)){
            $result = $this->getParent($email,$password);
            
            if($result != null){
                if($email===$result->parent_email && $password===$result->parent_password)
                {
                    $this->startSession($result->parent_email,$result->parent_password);
                    return $result;
                }else{
                    //error while trying to connect
                    return null;
                }
            }else{
                //error of login password or email incorrect
                return null;
            }

        }
    }

    /**
     * a function that gets all the parents
     */
    public function getParents(){
        $sql = "SELECT * FROM parent";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;
    }

    /**
     * a function that gets the profile of the parent by it's email
     */
    public function getParent($email,$password){
        $sql = "SELECT * FROM parent WHERE parent_email = :mail AND parent_password = :pass";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute(['mail'=>$email,'pass'=>$password]);
        $result = $statement->fetch();

        return $result;
    }


    /**
     * a function that gets the sons profiles
     */
    public function getSonsProfiles($idParent){
        $sql = "SELECT * FROM eleve WHERE id_parent = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idParent]);

        return $statment->fetchAll();
    }

    /**
     * a function to get a specifique emploi
     */
    public function getEmploi($idEmploi){
        $sql = "SELECT * FROM emplois_temps WHERE id_emploi = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idEmploi]);

        return $statment->fetch();
    }

    /**
     * a function that gets all the notes of the student
     */
    public function getNotes($idStudent){
        $sql = "SELECT * FROM note_eleve WHERE id_eleve = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idStudent]);

        return $statment->fetchAll();
    }

    /**
     * a function to get the teacher's remarks for a student
     */
    public function getStudentRemarques($idStudent){
        $sql = "SELECT * FROM remarques WHERE id_eleve = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idStudent]);

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
     * get parent by it's id
     */
    public function getParentById($id){
        $sql = "SELECT * FROM parent WHERE id_parent = :id";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        $result = $statement->fetch();

        return $result;
    }

    /**
     * a function that modifies the parent's info
     */
    public function updateParent($id,$field,$value){
        $sql = "UPDATE parent SET $field = :updt WHERE id_parent = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$value,'id'=>$id]);
        
        return $result;
    }

    /**
     * a function that gets all the extraScolar activities for a student
     */
    public function getExtraActByStudent($idStudent){
        $finalResult = null;

        $sql = "SELECT * FROM association_eleve_act WHERE id_eleve = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idStudent]);
        $results = $statment->fetchAll();

        if($results != null){
            foreach($results as $result){
                //get the extra activity
                $extraAct = $this->getExtraAct($result->id_activite);
                $finalResult["$extraAct->id_activite"] = $extraAct->nom_activite;
            }
        }

        return $finalResult;
    }

    /**
     * get an extra activity by it's id
     */
    public function getExtraAct($idAct){
        $sql = "SELECT * FROM activite_extrascolaire WHERE id_activite = :id";
        $statment = $this->db_conn->prepare($sql);
        $statment->execute(['id'=>$idAct]);

        return $statment->fetch();
    }

    /**
     * start the session
     */
    private function startSession($username, $password){
        session_start();
        $_SESSION['us'] = '1';
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['parent_mail'] = $username;
        $_SESSION['parent_pass'] = $password;
    }

    /**
     * log out
     */
    public function logOut(){
        unset($_SESSION['parent_mail']);
        unset($_SESSION['parent_pass']);
        return session_destroy();
    }

    /**
     * a function that deletes a parent
     */
    public function deleteParent($id){
        $sql = "DELETE FROM parent WHERE id_parent = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['id'=>$id]);

        return $result;
    }
}