<?php session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Memento|Login</title>
</head>
<body>
<header>
    <h1>Memonto</h1>
    <nav>
        <ul>
            <li><a href="login.php">Se connecter</a></li>
            <li><a href="register.php">S'enregistrer</a></li>
            <li><a href="register.php">Nouveau Jeu</li>
            <li><a href="register.php"></a></li>
        </ul>
    </nav>
</header>

<?php
use Memento\Game;
use Memento\User;
use Memento\Card;

require_once ('../Models/User.php');
require_once ('../Models/Game.php');

echo '<h2> Bravo  ' . $_SESSION['firstname'] . '   ' . $_SESSION['lastname'] . ' , vous avez  fini le jeu de ' . $_SESSION['nbpaire']
. ' paires en ' . $_SESSION['tour'] . ' tours.</h2> <br/>' ;

echo '<strong>Classement</strong>' ;





?>
