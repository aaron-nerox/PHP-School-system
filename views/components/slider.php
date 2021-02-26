<?php

class Slider{

    private $diapo;

    public function __construct(){
        $this->diapo = Loader::loadClassInstance('controllers','DiapoController');
    }

    public function create(){
        $images = $this->diapo->getAllImages();
            echo '<div class="diaporama-container">';
            foreach($images as $image){
                echo "<img src=\"http://localhost/projettdw/storage/$image->lien_img_diaporama\" class=\"diapo w3-animate-top\">";
            }
            echo '</div>';
    }
}
