<?php

class AdminController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Admin');
        $this->ModelArray['Admin'] = $this->Admin;
    }

    /**
     * a function that returns if you are logged in or not
     */
    public function login($email,$password){
        return $this->ModelArray['Admin']->logIn($email,$password);
    }

    /**
     * a function that returns the admin profile
     */
    public function getAdmin($email, $password){
        return $this->ModelArray['Admin']->getAdmin($email,$password);
    }

    /**
     * a function that returns if the admin is logged out or not
     */
    public function logout(){
        return $this->ModelArray['Admin']->logOut();
    }

}