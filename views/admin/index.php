<?php
    include('../../utils/Loader.php');

    //loading the components
    $header= Loader::loadClassInstance('views/components','Header');
    $footer= Loader::loadClassInstance('views/components','Footer');
    $loginForm = Loader::loadClassInstance('views/components', 'LoginForm');

    $adminController = Loader::loadClassInstance('controllers', 'AdminController');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets('../user/')?>
    <title>Espace d'admin: Login</title>
</head>
<body>
    <?php $header->create();
        $loginForm->create();
        session_start();
        if(!isset($_SESSION['admin_mail'])){
            if(isset($_POST['submit'])){
                $admin = $adminController->logIn($_POST['email'],$_POST['password']);
                if($admin != null){
                    //login succeeded load the page
                     header('Location: ./EspaceAdmin.php');
                }else{
                    // login failed display a message error
                    echo 'incorrect password';
                }
            }
        }else{
            header('Location: ./EspaceAdmin.php');
        }
        $footer->createMinified(); 
    ?>
    <script src="./scripts/UtilScript.js"></script>
</body>
</html>