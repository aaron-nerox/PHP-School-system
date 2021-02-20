<?php
include('../utils/Loader.php');


class DiapoController extends Loader{

    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Diapo');
        $this->ModelArray['Diapo'] = $this->Diapo;
    }

    /**
     * a function that returns all the diaporama images
     */
    public function getAllImages(){
        return $this->ModelArray['Diapo']->getAllDiapo();
    }

    /**
     * a function that returns if the image is inserted or not
     */
    public function addImage($link){
        return $this->ModelArray['Diapo']->addDiapo($link);
    }

    /**
     * a function that returns if the image is deleted or not
     */
    public function deleteImage($id){
        return $this->ModelArray['Diapo']->deleteDiapo($id);
    }

}
