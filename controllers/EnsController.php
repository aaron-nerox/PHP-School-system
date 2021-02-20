<?php
include('../utils/Loader.php');

class EnsController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Ens');
        $this->ModelArray['Ens'] = $this->Ens;
    }

    /**
     * a function that returns the list of all teachers
     */
    public function getTeachers(){
        return $this->ModelArray['Ens']->getEns();
    }

    /**
     * a function that returns the classes and thier hours according to the teacher
     */
    public function getClassesByEns($idEns){
        return $this->ModelArray['Ens']->getEnsClasses($idEns);
    }

    /**
     * a function that returns if a reception hour is modified or no
     */
    public function modifyReceptionHour($idEns,$newHour){
        return $this->ModelArray['Ens']->modifyEnsHour($idEns,$newHour);
    }

    /**
     * a function that returns if a teacher's class is modified
     */
    public function modifyEnsClass($oldClass ,$newClass, $idEns){
        return $this->ModelArray['Ens']->modifyClass($oldClass ,$newClass, $idEns);
    }

    /**
     * a function that returns if a teachers class hour is changed or not
     */
    public function modifyEnsClassHour($class,$newHour,$idEns){
        return $this->ModelArray['Ens']->modifyHourClassTeacher($class,$newHour,$idEns);
    }
}