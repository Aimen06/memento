<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Memento|Register</title>
</head>
<body>
<header>
    <h1>Memonto</h1>
    <nav>
        <ul>
            <li><a href="login.php">Se connecter</a></li>
            <li><a href="register.php">S'enregistrer</a></li>
            <li><a href="register.php">Nouveau Jeu</li>
            <li><a href="topscore.php"></a>Classement</li>
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



