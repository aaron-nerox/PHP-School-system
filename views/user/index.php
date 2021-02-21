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
    <title>Ecole de formations</title>
</head>
<body>
    <?php $header->create() ?>
    <?php  $footer->create() ?>
</body>
</html>