<?php session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Memento|Playing</title>
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
            if (!isset($_SESSION['gamer_id'])) {
            echo     '<li><a href="login.php">Se connecter</a></li>';
           echo  "<li><a href='register.php'>S'enregistrer</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>

<?php

use Memento\Game;
use Memento\User;
use Memento\Card;

require_once ('../Models/User.php');
require_once ('../Models/Game.php');
require_once ('../Models/Card.php');

if (isset($_SESSION['gamer_id']) && $_SESSION['nbpaire']) {
    if ($_SESSION['pairFind'] ==  $_SESSION['nbpaire']) {
        $gameFinished = new Game();
        $gameFinished->getGamefromId($_SESSION['gameId']);
        $gameFinished->setNbTour($_SESSION['tour']);
        $gameFinished->setIsFinished(1);
        $gameFinished->setUserId($_SESSION['gamer_id']);
        $gameFinished->setNbPaire($_SESSION['nbpaire']);
        $gameFinished->save();
        $_SESSION['isFinish'] = $gameFinished->getIsFinished();
        header('Location: topscore.php');
    }
    $gamer = new User();
    $gamer->getUserfromId($_SESSION['gamer_id']);
    $_SESSION['firstname'] =  $gamer->getFirstname();
    $_SESSION['lastname'] = $gamer->getLastname();
    echo '<h2>Partie de '. $gamer->getFirstname() . '  ' .$gamer->getLastname() . ' avec ' . $_SESSION['nbpaire'] . 'paires </h2><br/><br/>';
    echo 'Nombre de Tour: ' . $_SESSION['tour'] . '<br/>';
    echo 'Nombre de paire trouvée: ' .$_SESSION['pairFind'] .'<br/><br/>' ;

    if ($_SESSION['tour'] == 0) {
        $game = new Game();
        $cardGame = $game->create($_SESSION['gamer_id'],$_SESSION['nbpaire']);
        foreach ($cardGame as $id) {
            $card = new Card();
            $card->getCardfromId($id);
            $cards =[];
            array_push( $cards, $id);
        }
        $_SESSION['gameId'] = $game->getId();
        $_SESSION['CardList'] = $cardGame;

    }
    echo '<div class="card-wrapper">';
    for($j= 0; $j<count($_SESSION['CardList']); $j++) {
        $blur = (in_array(intval($_SESSION['CardList'][$j]),$_SESSION['cardsFound'])) ? 'blur' : '';
        $url = (in_array(intval($_SESSION['CardList'][$j]),$_SESSION['cardsFound'])) ? '' : 'tour.php?id='.$_SESSION['CardList'][$j].'';
        $pathImage =  ($_SESSION['tour'] != 0 && ($_SESSION['CardList'][$j] == $_SESSION['cardSelected']) || (in_array(intval($_SESSION['CardList'][$j]) ,$_SESSION['cardsFound']))) ? intval($_SESSION['CardList'][$j]) : 'back';
        echo '<a href="'. $url .'"><div class="card '. $blur. '" id="'. $_SESSION['CardList'][$j]. '">';
        echo  '<img src="../images/carte/' .  $pathImage . '.png'. '" alt="' . 'image '. intval($_SESSION['CardList'][$j]) .'"></div></a>';
    }

} else {
    header("Location: login.php");
}

?>

