<?php

class EleveController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Eleve');
        $this->ModelArray['Eleve'] = $this->Eleve;
    }

    /**
     * login for the student and get his main profile
     */
    public function logIn($email,$password){
        return $this->ModelArray['Eleve']->logIn($email,$password);
    }

    /**
     * a function that returns if the user logged out or not
     */
    public function logout(){
        return $this->ModelArray['Eleve']->logOut();
    }

    /**
     * a function that returns all the students
     */
    public function getAllStudents(){
        return $this->ModelArray['Eleve']->getStudents();
    }

    /**
     * a function that returns the student info
     */
    public function getStudent($email,$password){
        return $this->ModelArray['Eleve']->getStudent($email,$password);
    }

    /**
     * a function that returns the student based on id
     */
    public function getStudentById($id){
        return $this->ModelArray['Eleve']->getStudentById($id);
    }

    /**
     * gets the emploi of the student
     */
    public function getEmploi($idEmploi){
        return $this->ModelArray['Eleve']->getEmploi($idEmploi);
    }

    /**
     * get the list of the student's notes
     */
    public function getNotes($id){
        return $this->ModelArray['Eleve']->getNotes($id);
    }

    /**
     * get the list of extra activities
     */
    public function getExtraActs($id){
        return $this->ModelArray['Eleve']->getExtraActByStudent($id);
    }

   /**
    * a function that returns if a student is deleted or not
    */
    public function deleteStudent($id){
        return $this->ModelArray['Eleve']->deleteStudent($id);
    }
}