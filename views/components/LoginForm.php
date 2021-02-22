<?php 

class LoginForm{

    public $eleveControler;

    public function __construct()
    {
        
    }


    public function create(){
            echo '<form method="POST" enctype="multipart/form-data" id="login-form" align="center">
        <p class="form-label">Votre Email</p>
        <input id="email" type="text" name="email" placeholder="Email" 
        required="" class="input">
        <p class="form-label">Mot de passe</p>
        <input id="password" type="password" name="password" placeholder="Mot de passe" required="" class="input">
        <br><br>
        <button type="submit" name="submit" id="submit">Se connecter</button>
        </form>'; 
    }
}

?>

<?php
