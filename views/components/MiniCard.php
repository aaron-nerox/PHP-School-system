<?php

class MiniCard{

    public function __construct()
    {
        
    }

    public function create($title,$icon,$text,$link){
        echo 
        '<div class="setting-card">
            <p class="important">'.$title.'</p>
            <img src="../assets/icons/'.$icon.'.png" alt="setting icon" class="setting-image">
            <p class="text">'.$text.'</p>
            <a href="'.$link.'">
                <button class="button-article">Aller vers le gestionaire</button>
            </a>
        </div>';
}
}