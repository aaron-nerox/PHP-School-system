<?php

class Admin extends Loader{
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
     * a function that logs in and returns the profile of an admin and starts a session
     */
    public function logIn($email,$password){
        if(!empty($email)&&!empty($password)){
            $result = $this->getAdmin($email,$password);
            
            if($result != null){
                if($email===$result->admin_email && $password===$result->admin_password)
                {
                    $this->startSession($result->admin_email,$result->admin_password);
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
     * a function that gets the profile of the admin by it's email
     */
    public function getAdmin($email,$password){
        $sql = "SELECT * FROM admin WHERE admin_email = :mail AND admin_password = :pass";
            $statement = $this->db_conn->prepare($sql);
            $statement->execute(['mail'=>$email,'pass'=>$password]);
            $result = $statement->fetch();

            return $result;
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
    private function startSession($username,$password){
        session_start();
        $_SESSION['us'] = '1';
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['admin_mail'] = $username;
        $_SESSION['admin_pass'] = $password;
    }

    /**
     * end the session
     */
    private function endSession(){
        unset($_SESSION['admin_mail']);
        unset($_SESSION['admin_pass']);
        return session_destroy();
    }

}