<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Memento|Register</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <ul>

            <li><a href="disconnect.php">Se déconnecter</a></li>
            <li><a href="topscore.php">Classement</a></li>
            <?php
            if (!empty($_SESSION['gamer_id'])) {
                echo     '<li><a href="login.php">Se connecter</a></li>';
                echo  "<li><a href='register.php'>S'enregistrer</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>

<?php

use Memento\User;

require_once ('../Models/User.php');
 if (isset($_POST["firstname"]) && isset($_POST["lastname"])  &&
      isset($_POST["login"]) && isset($_POST["login"]) && isset($_POST["mdp"])) {
     $newUser = new User();
     $newUser->register($_POST["firstname"], $_POST["lastname"], $_POST["login"], $_POST["mdp"]);
     header("Location: login.php");

 } else {
    echo '<h2>Inscription</h2>';
   echo '   <form action="register.php" method="post">';
   echo '  <label for="firstname">Entrez un nom:</label><br>';
   echo '  <input type="text" id="firstname" name="firstname" value="" required> <br>';
    echo ' <label for="lastname">Entrez un prénom:</label><br>';
    echo ' <input type="text" id="lastname" name="lastname" value="" required><br><br>';
    echo ' <label for="login">Entrez un login:</label><br>';
    echo ' <input type="text" id="login" name="login" value="" required><br><br>';
    echo ' <label for="mdp">Entrez un mdp:</label><br>';
    echo ' <input type="password" id="mdp" name="mdp" value="" required><br><br>';
    echo ' <input type="submit" value="Créer">';
    echo '</form>';
    echo '</body>';
    echo '</html>';
 }

?>



