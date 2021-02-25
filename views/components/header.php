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
                <div class="header-s">
                    <a href="http://facebook.com" target="_blank">
                        <img src="../assets/icons/fb.png" class="s-icon"></a>
                    <a href="http://instagram.com" target="_blank">
                        <img src="../assets/icons/insta.png" class="s-icon"></a>
                    <a href="http://twitter.com" target="_blank">
                        <img src="../assets/icons/twitter.png" class="s-icon"></a>
                    <a href="http://youtube.com" target="_blank">
                        <img src="../assets/icons/yt.png" class="s-icon"></a>
                </div>
            </header>';
    }
}