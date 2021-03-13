<?php

class EmploiController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Emploi');
        $this->ModelArray['Emploi'] = $this->Emploi;
    }

    /**
     * a function that returns an emploi
     */
    public function getEmploiByTag($tag){
        return $this->ModelArray['Emploi']->getEmploiByTag($tag);
    }

    /**
     * gets the class name from the emploi
     */
    public function getClassFromEmploi($tag,$day,$hour){
        $result = $this->ModelArray['Emploi']->getClassByContraint($tag,$day,$hour);
        if($result ==! null){
            return $result->class_emploi;
        }else{
            return '--';
        }
    }

    /**
     * retuns if a value of the class is updated or not
     */
    public function setClassFromEmploi($tag,$day,$hour,$value){
        return $this->ModelArray['Emploi']->setClassByContraint($tag,$day,$hour,$value);
    }

    /**
     * returns if a value id added to the db or not
     */
    public function addClass($tag,$day,$beginhour,$endHour,$cycle,$value){
        return $this->ModelArray['Emploi']->addClass($tag,$day,$beginhour,$endHour,$cycle,$value);
    }

    /**
     * returns the list of tags for all plans
     */
    public function getTags(){
        return $this->ModelArray['Emploi']->getAllTags();
    }

    
}