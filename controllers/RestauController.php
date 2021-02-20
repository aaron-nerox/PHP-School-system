<?php
include('../utils/Loader.php');

class RestauController extends Loader{
    private $ModelArray;

    public function __construct()
    {
        $this->getInstance('models','Restauration');
        $this->ModelArray['Restauration'] = $this->Restauration;
    }

    /**
     * A function that returns if a meal in a specifique day is modified or not
     */
    public function modifyMeal($newMeal, $day){
        return $this->ModelArray['Restauration']->updateMeal($newMeal, $day);
    }
}