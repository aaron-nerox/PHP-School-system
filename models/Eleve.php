<?php

class Eleve extends Loader{
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
     * a function that logs in and returns the profile of a student and starts a session
     */
    public function logIn($email,$password){
        if(!empty($email)&&!empty($password)){
            $result = $this->getStudent($email,$password);
            if($result != null){
                if($email===$result->email_eleve && $password===$result->password_eleve)
                {
                    $this->startSession($result->email_eleve,$result->password_eleve);
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
     * a function to get all the students
     */
    public function getStudents(){
        $sql = "SELECT * FROM eleve";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;
    }

    /**
     * a function to get a student based on the email and password
     */
    public function getStudent($email,$password){
        $sql = "SELECT * FROM eleve WHERE email_eleve = :mail AND password_eleve = :pass";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute(['mail'=>$email,'pass'=>$password]);
        $result = $statement->fetch();

        return $result;
    }

    /**
     * get a student by it's id
     */
    public function getStudentById($id){
        $sql = "SELECT * FROM eleve WHERE id_eleve = :id";
        $statement = $this->db_conn->prepare($sql);
        $statement->execute(['id'=>$id]);
        $result = $statement->fetch();

        return $result;
    }

    /**
     * a function that modifies a student's profile
     */
    public function updateStudent($id,$field,$value){
        $sql = "UPDATE eleve SET $field = :updt WHERE id_eleve = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['updt'=>$value,'id'=>$id]);
        
        return $result;
    }

    /**
     * a function to get the emploi
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
                $finalResult[] = $extraAct->nom_activite;
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
    private function startSession($username,$password){
        session_start();
        $_SESSION['us'] = '1';
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['student_mail'] = $username;
        $_SESSION['student_pass'] = $password;
    }

    /**
     * log out
     */
    public function logOut(){
        unset($_SESSION['student_mail']);
        unset($_SESSION['student_pass']);
        return session_destroy();
    }

     /**
     * a function that deletes a student
     */
    public function deleteStudent($id){
        $sql = "DELETE FROM eleve WHERE id_eleve = :id";
        $statment = $this->db_conn->prepare($sql);
        $result = $statment->execute(['id'=>$id]);

        return $result;
    }
}