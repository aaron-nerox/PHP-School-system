<?php

class Menu{

    public function create($Activelink){
        $arrayLink = ['href="./index.php"',
        'href="./PresentationEcole.php"',
        'href="./CyclePrimaire.php"',
        'href="./CycleMoyenne.php"',
        'href="./CycleSecondaire.php"',
        'href="./EspaceEleveLogin.php"',
        'href="./EspaceParentLogin.php"',
        'href="./Contact.php"'];

        $arrayLink[$Activelink] .= " class=\"active\"";
        echo '
        <div class="topnav" id="myTopnav">
            <a '.$arrayLink[0].'>Acceuil</a>
            <a '.$arrayLink[1].'>Presentation</a>
            <a '.$arrayLink[2].'>Primaire</a>
            <a '.$arrayLink[3].'>Moyen</a>
            <a '.$arrayLink[4].'>Secondaire</a>
            <a '.$arrayLink[5].'>Espace d\'élèves</a>
            <a '.$arrayLink[6].'>Espace des parents</a>
            <a '.$arrayLink[7].'>Contact</a>
            <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        ';

    }
}