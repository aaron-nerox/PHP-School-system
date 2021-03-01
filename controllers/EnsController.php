<?php

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
     * a function that returns a teacher based on id
     */
    public function getTeacherById($id){
        return $this->ModelArray['Ens']->getTeacherById($id);
    }

    /**
     * a function that returns if a teacher's info is uodated or not
     */
    public function updateTeacher($id,$field,$value){
        return $this->ModelArray['Ens']->updateEns($id,$field,$value);
    }

    /**
     * a function that returns the list of teachers by cycle
     */
    public function getTeachersByCycle($cycle){
        return $this->ModelArray['Ens']->getEnsByCycle($cycle);
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
    public function modifyEnsHours($class,$newClass,$newHour,$idEns){
        $result1 = $this->ModelArray['Ens']->modifyClass($class ,$newClass, $idEns);
        $result2 = $this->ModelArray['Ens']->modifyHourClassTeacher($class,$newHour,$idEns);

        return $result1 && $result2;
    }

    /**
     * return if the ens is deleted or not
     */
    public function deleteEns($idEns){
        return $this->ModelArray['Ens']->deleteEns($idEns);
    }
}