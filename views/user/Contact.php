<?php 
    include('../components/footer.php');
    include('../components/header.php');

    $footer= new Footer();
    $header= new Header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/mainStyle.css">
    <link rel="stylesheet" href="style/footerStyle.css">
    <link rel="stylesheet" href="style/headerStyle.css">
    <title>Ecole de formations: contact</title>
</head>
<body>
    <?php $header->create() ?>
    <div class="div-container">
        <p class="title">Contacts de l'ecole</p>
        <p class="important" >Notre Adresse:</p>
        <p class="text">Adress Alger, Rue didouch mourad N°2113 Ecole de formations.</p>
        <p class="important">Numeros utils:</p>
        <div>
            <p class="text">Ecole Fax: +213487393333</p>
            <p class="text">Ecole telephone 1: +21300003939</p>
            <p class="text">Ecole telephone 2: +21300003939</p>
        </div>
    </div>
    <?php  $footer->create() ?>
</body>
</html>