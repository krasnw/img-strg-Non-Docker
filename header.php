<?php
include_once 'includes/config_session.inc.php';
//<img src="img/Pahonia.svg" alt="logo" class="logo">
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>NFT Gallery</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    <div class="wrapper">
        <a href="index.php"><p class="logo">ImgStrg</p></a>
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="discover.php">O nas</a></li>
            <?php
            if (isset($_SESSION["user_id"])) {
                echo "<li><a href='profile.php'>Profil</a></li>";
                echo "<li><a href='profilesettings.php'>Ustawienia</a></li>";
                echo "<li><a href='includes/logout.inc.php'>Wyloguj się</a></li>";
            } else {
                echo "<li><a href='signup.php'>Rejstracja</a></li>";
                echo "<li><a href='login.php'>Strona logowania</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>

<div class="wrapper">
