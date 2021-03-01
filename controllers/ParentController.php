<?php

class ParentController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','SParent');
        $this->ModelArray['SParent'] = $this->SParent;
    }

    /**
     * login for the student and get his main profile
     */
    public function logIn($email,$password){
        return $this->ModelArray['SParent']->logIn($email,$password);
    }

    /**
     * a function that returns all parents
     */
    public function getParents(){
        return  $this->ModelArray['SParent']->getParents();
    }

    /**
     * a function that returns the profile of the parent
     */
    public function getParent($email,$password){
        return $this->ModelArray['SParent']->getParent($email,$password);
    }

    /**
     * returns the parent based on id
     */
    public function getParentById($id){
        return $this->ModelArray['SParent']->getParentById($id);
    }

    /**
     * returns if a parent's pfoile is updated or not
     */
    public function updateParent($id,$field,$value){
        return $this->ModelArray['SParent']->updateParent($id,$field,$value);
    }

    /**
     * a function that returns if you logged out or not
     */
    public function logout(){
        return $this->ModelArray['SParent']->logOut();
    }

    /**
     * returns a list of the sons profiles
     */
    public function getSonsList($idParent){
        return $this->ModelArray['SParent']->getSonsProfiles($idParent);
    }

    /**
     * gets the emploi of the student
     */
    public function getEmploi($idEmploi){
        return $this->ModelArray['SParent']->getEmploi($idEmploi);
    }

    /**
     * get the list of the student's notes
     */
    public function getNotes($id){
        return $this->ModelArray['SParent']->getNotes($id);
    }

    /**
     * get the list of remarques per son
     */
    public function getSonRemarques($idStudent){
        return $this->ModelArray['SParent']->getStudentRemarques($idStudent);
    }

    /**
     * a function that returns the teacher by it's id
     */
    public function getTeacherById($id){
        $result = $this->ModelArray['SParent']->getTeacherById($id);

        return $result->nom_ens.' '.$result->prenom_ens;
    }

    /**
     * get the list of extra activities
     */
    public function getExtraActs($id){
        return $this->ModelArray['SParent']->getExtraActByStudent($id);
    }

    /**
     * a function that returns if a parent is deleted or not
     */
    public function deleteParent($id){
        return $this->ModelArray['SParent']->deleteParent($id);
    }
}