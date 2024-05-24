<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <link href= "../css/style.css" rel="stylesheet">
</head>
<body>
<div class = "header">
    <img src='/ProjetADB/images/logo_snd.png' alt="logo" class="logo">
    <div class = "navbar">
        <?php if(isset($_SESSION['auth'])){?>
        <li class = "nav"><a href="accueil.php" class ="btnnav">Accueil</a></li>
        <li class = "nav"><a href="userquestion.php" class ="btnnav">Mes Questions</a></li>
        <li class = "nav"><a href="publishthread.php" class ="btnnav">Publier</a></li>
        <li class = "nav"><a href="logout.php" class ="btnnav">Déconnexion</a></li>
        <?php }?>
    </div>
</div>
