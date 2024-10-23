<?php session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Memento|Topscore</title>
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
use Memento\Game;
use Memento\User;
use Memento\Card;

require_once ('../Models/User.php');
require_once ('../Models/Game.php');


if (!empty($_SESSION['isFinish'])) {
    echo '<h2> Bravo  ' . $_SESSION['firstname'] . '   ' . $_SESSION['lastname'] . ' , vous avez  fini le jeu de ' . $_SESSION['nbpaire']
    . ' paires en ' . $_SESSION['tour'] . ' tours.</h2> <br/>' ;
   echo '<strong>Classement des ' . $_SESSION['nbpaire'] . ' paires. </strong> <br/>' ;
    $chart = new Game();

    $scoreList = $chart->getAllGamefromPaire( $_SESSION['nbpaire']);
    $counter = 0;
    foreach ($scoreList as $score ) {
        $counter++;
        echo  '<div class="wrapper-top">
                 <div class="top">' . $counter. '. ' . strtoupper($score['firstname']) . '  '  . strtoupper($score['lastname']) . ' TOUR: ' .
            $score["nb_tour"] . '</div></div>';
    }
        }else {
        for ($i = 3 ; $i < 13; $i++) {
            echo '<strong>Classement des ' .  $i . ' paires. </strong> <br/>' ;
            $chart = new Game();
            $scoreList = $chart->getAllGamefromPaire($i);
            if(count($scoreList)>1) {
                $counter = 0;
                foreach ($scoreList as $score ) {
                    $counter++;
                    echo  '<div class="wrapper-top">
                
                 <div class="top">' . $counter. '. ' . strtoupper($score['firstname']) . '  '  . strtoupper($score['lastname']) . ' TOUR: ' .
                        $score["nb_tour"] . '</div></div>';
                }
            } else {
                echo "Pas de classement <br/>" ;
            }

    }
}




?>
