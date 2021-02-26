<?php

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
    public function updateMeal($newMeal,$newDessert, $day){
        $result1 = $this->ModelArray['Restauration']->updateMeal($newMeal, $day);
        $result2 =  $this->ModelArray['Restauration']->updateDessert($newDessert, $day);
        return $result1 && $result2 ;
    }

    /**
     * a function that returns if a dessert only is updated
     */
    public function modifyDessert($newDessert, $day){
        return $this->ModelArray['Restauration']->updateDessert($newDessert, $day);
    }

    /**
     * a function that returns if a meal only is updated
     */
    public function modifyMeal($newMeal, $day){
        return $this->ModelArray['Restauration']->updateMeal($newMeal, $day);
    }

    /**
     * a function that returns all the meals of the week
     */
    public function getMeals(){
        return $this->ModelArray['Restauration']->getAllMeals();
    }
}