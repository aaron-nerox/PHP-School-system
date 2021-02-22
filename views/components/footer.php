<?php

class Footer{

    /**
     * 
     */
    public function create(){
        echo '
            <div class="footer-container">
                <div class="inner-container">
                    <img src="../assets/icons/logo.png" class="footer-logo"/>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="./PresentationEcole.php">Presentation</a></li>
                            <li><a href="./EspaceEleveLogin.php">Espace d\'élèves</a></li>
                            <li><a href="./EspaceParentLogin.php">Espace des parents</a></li>
                            <li><a href="./CyclePrimaire.php">Cycle primaire</a></li>
                            <li><a href="./CycleMoyenne.php">Cycle moyenne</a></li>
                            <li><a href="./CycleSecondaire.php">Cycle secondaire</a></li>
                            <li><a href="./Contact.php">Contactez nous</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-social">
                        <a href="http://facebook.com" target="_blank">
                            <img src="../assets/icons/fb.png" class="social-icon"></a>
                        <a href="http://instagram.com" target="_blank">
                            <img src="../assets/icons/insta.png" class="social-icon"></a>
                        <a href="http://twitter.com" target="_blank">
                            <img src="../assets/icons/twitter.png" class="social-icon"></a>
                        <a href="http://youtube.com" target="_blank">
                            <img src="../assets/icons/yt.png" class="social-icon"></a>
                </div>
                <p class="important">&copy; 2020 ecole de formation.</p>
            </div>';
    }
}