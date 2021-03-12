<?php 
    include('../../utils/Loader.php');

    $footer= Loader::loadClassInstance('views/components','Footer');
    $header= Loader::loadClassInstance('views/components','Header');
    $menu = Loader::loadClassInstance('views/components','Menu');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php Loader::loadStyleSheets(''); ?>
    <title>Contacts</title>
</head>
<body>
    <?php $header->create();
        $menu->create(7);?>
    <div class="div-container">
        <p class="title">Contacts de l'ecole</p>
        <p class="important" >Notre Adresse:</p>
        <p class="text">Adress Alger, Rue didouch mourad N°2113 Ecole de formations.</p>
        <div style="max-width:100%;overflow:hidden;color:red;width:80%;height:400px;">
            <div id="canvasfor-googlemap" style="height:100%; width:100%;max-width:100%;">
                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=hassiba&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
            </div>
    <a class="googlemap-enabler" href="https://www.embed-map.com" id="grab-mapdata">https://www.embed-map.com</a>
    <style>#canvasfor-googlemap img{max-height:none;max-width:none!important;background:none!important;}</style></div>
        <p class="important">Numeros utils:</p>
        <div>
            <p class="text">Ecole Fax: +213487393333</p>
            <p class="text">Ecole telephone 1: +21300003939</p>
            <p class="text">Ecole telephone 2: +21300003939</p>
        </div>
    </div>
    <?php $footer->create() ?>
    <script src="../scripts/UtilScript.js"></script>
</body>
</html>