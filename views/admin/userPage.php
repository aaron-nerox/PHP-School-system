<?php
    include('../../utils/Loader.php');

    //loading the components
    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');

    $controller;
    $profile;
    $tag;
    
    if(isset($_GET['ens'])){
        $tag = 'ens';
        $controller = Loader::loadClassInstance('controllers', 'EnsController');
        $profile = $controller->getTeacherById($_GET['ens']);
    }elseif(isset($_GET['parent'])){
        $tag = 'parent';
        $controller = Loader::loadClassInstance('controllers', 'ParentController');
        $profile = $controller->getParentById($_GET['parent']);
    }elseif(isset($_GET['student'])){
        $tag= 'student';
        $controller = Loader::loadClassInstance('controllers', 'EleveController');
        $profile = $controller->getStudentById($_GET['student']);
    }

    if(isset($_POST['save'])){
        $tel1;$tel2;$tel3;$class;
        $nom = htmlentities($_POST['modify-name']);
        $prenom = htmlentities($_POST['modify-surname']);
        $adress = htmlentities($_POST['adress']);
        $dateNaissance =htmlentities($_POST['date']);
        $email = htmlentities($_POST['mail']);
        if($tag === 'parent' || $tag === 'ens'){
            $tel1 = htmlentities($_POST['tel1']);
            $tel2 = htmlentities($_POST['tel2']);
            $tel3 = htmlentities($_POST['tel3']);
            if($tag === 'parent'){
                $id = $profile->id_parent;
                $controller->updateParent($id,'nom_parent',$nom);
                $controller->updateParent($id,'prenom_parent',$prenom);
                $controller->updateParent($id,'date_naissance_parent',$dateNaissance);
                $controller->updateParent($id,'adress_parent',$adress);
                $controller->updateParent($id,'parent_tel1',$tel1);
                $controller->updateParent($id,'parent_tel2',$tel2);
                $controller->updateParent($id,'parent_tel3',$tel3);
                $controller->updateParent($id,'parent_email',$email);
            }else{
                $id = $profile->id_enseignant;
                $controller->updateTeacher($id,'nom_ens',$nom);
                $controller->updateTeacher($id,'prenom_ens',$prenom);
                $controller->updateTeacher($id,'date_naissance_ens',$dateNaissance);
                $controller->updateTeacher($id,'adress_ens',$adress);
                $controller->updateTeacher($id,'ens_tel1',$tel1);
                $controller->updateTeacher($id,'ens_tel2',$tel2);
                $controller->updateTeacher($id,'ens_tel3',$tel3);
                $controller->updateTeacher($id,'ens_email',$email);
            }
        }else{
            $class = htmlentities($_POST['class']);
            $id = $profile->id_eleve;
            $controller->updateStudent($id,'nom_ens',$nom);
            $controller->updateStudent($id,'prenom_ens',$prenom);
            $controller->updateStudent($id,'date_naissance_ens',$dateNaissance);
            $controller->updateStudent($id,'adress_ens',$adress);
            $controller->updateStudent($id,'class_eleve',$class);
            $controller->updateStudent($id,'ens_email',$email);
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets('../user/')?>
    <title>Modifier les informations d'utilisateur</title>
</head>
<body>
    <?php $header->create();?>
    <center><p class="title">Modifier le profile</p></center>
    <?php if($tag === 'ens'): ?>
    <form method="post" align="center" id="login-form">
        <p class="form-label">Nom</p>
        <input class="input" type="text" name="modify-name" value="<?php echo $profile->nom_ens ?>" />
        <p class="form-label">Prenom</p>
        <input class="input" type="text" name="modify-surname" value="<?php echo $profile->prenom_ens; ?>" />
        <p class="form-label">Date de naissance</p>
        <input class="input" type="date" name="date" value="<?php echo $profile->date_naissance_ens; ?>" />
        <p class="form-label">adresse</p>
        <input class="input" type="text" name="adress" value="<?php echo $profile->adress_ens ?>"/>
        <p class="form-label">Num de telephone 1</p>
        <input class="input" type="text" name="tel1" value="<?php echo $profile->ens_tel1 ?>"/>
        <p class="form-label">Num de telephone 2</p>
        <input class="input" type="text" name="tel2" value="<?php echo $profile->ens_tel2 ?>"/>
        <p class="form-label">Num de telephone 3</p>
        <input class="input" type="text" name="tel3" value="<?php echo $profile->ens_tel3 ?>"/>
        <p class="form-label">Email</p>
        <input class="input" type="email" name="mail" value="<?php echo $profile->ens_email?>" />
        <br><br>
        <input id="submit" type="submit" name="save" value="Suavegarder" />
    </form>
    <?php elseif($tag === 'parent'): ?>
    <form method="post" align="center" id="login-form">
        <p class="form-label">Nom</p>
        <input class="input" type="text" name="modify-name" value="<?php echo $profile->nom_parent ?>" />
        <p class="form-label">Prenom</p>
        <input class="input" type="text" name="modify-surname" value="<?php echo $profile->prenom_parent; ?>" />
        <p class="form-label">Date de naissance</p>
        <input class="input" type="date" name="date" value="<?php echo $profile->date_naissance_parent; ?>" />
        <p class="form-label">adresse</p>
        <input class="input" type="text" name="adress" value="<?php echo $profile->adress_parent ?>"/>
        <p class="form-label">Num de telephone 1</p>
        <input class="input" type="text" name="tel1" value="<?php echo $profile->parent_tel1 ?>"/>
        <p class="form-label">Num de telephone 2</p>
        <input class="input" type="text" name="tel2" value="<?php echo $profile->parent_tel2 ?>"/>
        <p class="form-label">Num de telephone 3</p>
        <input class="input" type="text" name="tel3" value="<?php echo $profile->parent_tel3 ?>"/>
        <p class="form-label">Email</p>
        <input class="input" type="email" name="mail" value="<?php echo $profile->parent_email?>" />
        <br><br>
        <input id="submit" type="submit" name="save" value="Suavegarder" />
    </form>
    <?php elseif($tag === 'student'): ?>
    <form method="post" align="center" id="login-form">
        <p class="form-label">Nom</p>
        <input class="input" type="text" name="modify-name" value="<?php echo $profile->nom_eleve ?>" />
        <p class="form-label">Prenom</p>
        <input class="input" type="text" name="modify-surname" value="<?php echo $profile->prenom_eleve; ?>" />
        <p class="form-label">Date de naissance</p>
        <input class="input" type="date" name="date" value="<?php echo $profile->date_naissance_eleve; ?>" />
        <p class="form-label">adresse</p>
        <input class="input" type="text" name="adress" value="<?php echo $profile->adress_eleve ?>"/>
        <p class="form-label">Class</p>
        <input class="input" type="text" name="class" value="<?php echo $profile->class_eleve ?>"/>
        <p class="form-label">Email</p>
        <input class="input" type="email" name="mail" value="<?php echo $profile->email_eleve?>" />
        <br><br>
        <input id="submit" type="submit" name="save" value="Suavegarder" />
    </form>
    <?php  endif;?>
    <?php $footer->create(); ?>
</body>
</html>