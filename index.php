<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php

    $db = require('db.php');
    $connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);
    if (mysqli_connect_errno()) print_r(mysqli_connect_error());

?>

<body>
    <header>
        <?php 
        require ('header.php');
        ?>
    </header>    
    <main>
        <?php
            if (isset($_GET['p']) && ($_GET['p']=='home' || $_GET['p']=='form')) include(''.$_GET['p'].'.php');
        ?>
    </main>
</body>
</html>
    

