<?php

class Slider{

    private $diapo;

    public function __construct(){
        $this->diapo = Loader::loadClassInstance('controllers','DiapoController');
        ob_start();
    }

    public function create(){
        $images = $this->diapo->getAllImages();
            echo '<div class="diaporama-container">';
            foreach($images as $image){
                echo "<img src=\"$image->lien_img_diaporama\" class=\"diapo\">";
            }
            echo '</div>';
    }

    public function destroy()
    {
        ob_end_clean();
    }
}
