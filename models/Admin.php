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
        $sMail = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!empty($sMail)&&!empty($password)){
            $sql = "SELECT * FROM 'admin' WHERE admin_email = :mail AND admin_password = :pass";
            $statement = $this->db_conn->prepare($sql);
            $statement->execute(['mail'=>$sMail,'pass'=>$password]);
            $results = $statement->fetch();
            
            if($results != null){
                foreach($results as $result){
                    if($sMail===$result->email_eleve && $password===$result->password_eleve)
                    {
                        $this->startSession();
                        return $result;
                    }else{
                        //error while trying to connect
                        return null;
                    }
                }
            }else{
                //error of login password or email incorrect
                return null;
            }

        }
    }

    /**
     * log out
     */
    public function logOut(){
        $this->endSession();
    }

    /**
     * start the session
     */
    private function startSession(){
        session_start();
        $_SESSION['us'] = '1';
    }

    /**
     * end the session
     */
    private function endSession(){
        session_destroy();
    }

}