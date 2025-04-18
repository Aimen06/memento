<?php session_start();
$_SESSION['tour'] = 0;
$_SESSION['pairFind']  = 0;
$_SESSION['cardSelected'] = null;
$_SESSION['cardsFound'] = [];
$_SESSION['cardPlayed'] = [];

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Memento|Login</title>
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

if (isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["nbpaire"])) {
    $gamer = new User();
    $gamer->connect($_POST["login"],$_POST["mdp"]);
    if ($gamer->getConnected()) {
        $_SESSION['gamer_id'] = $gamer->getId();
        $_SESSION['nbpaire'] = $_POST["nbpaire"];
        header("Location: game.php");
    } else {
        header("Location: register.php") ;
    }
} else {
    
    echo '<h2>Connexion</h2>';
    echo '   <form action="login.php" method="post">';
    echo '  <label for="login">Entrez votre login:</label><br/>';
    echo '  <input type="text" id="firstname" name="login" value="" required> <br/><br/>';
    echo ' <label for="mdp">Entrez votre  mot de passe:</label><br/>';
    echo ' <input type="text" id="mdp" name="mdp" value="" required><br><br/>';
    echo ' <label for="nbpaire">Choisir un nombre de paire:</label><br>';
    echo ' <input type="number" id="nbpaire" name="nbpaire" value="3" min="3" max="12"required><br/><br/>';
    echo ' <input type="submit" value="Jouer">';
    echo '</form>';
    echo '</body>';
    echo '</html>';
}



?>

