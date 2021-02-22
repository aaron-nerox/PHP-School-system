<?php

class Header{

    public function __construct(){
        ob_start();
    }

    public function create(){
        echo '<header>
                <a href="./index.php">
                    <img src="../assets/icons/logo.png" alt="logo" class="header-logo" />
                </a>
                <div class="header-social">
                    <a href="http://facebook.com" target="_blank">
                        <img src="../assets/icons/fb.png" class="social-icon"></a>
                    <a href="http://instagram.com" target="_blank">
                        <img src="../assets/icons/insta.png" class="social-icon"></a>
                    <a href="http://twitter.com" target="_blank">
                        <img src="../assets/icons/twitter.png" class="social-icon"></a>
                    <a href="http://youtube.com" target="_blank">
                        <img src="../assets/icons/yt.png" class="social-icon"></a>
                </div>
            </header>';
    }
}