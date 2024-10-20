<?php

namespace Memento;

use PDO;

require_once('Connexion.php');

class Game extends Connexion
{
    protected $id;
    protected $nbPaire;
    protected $nbTour;
    protected $userId;
    protected $date;
    protected $isFinished;



    public function __construct()
    {
        parent::__construct();
        $this->id = null;
        $this->nbPaire = null;
        $this->nbTour = null;
        $this->userId = null;
        $this->date = '';
        $this->isFinished = null;
    }

    public function getIsFinished(): int
    {
        return $this->isFinished;
    }

    public function setIsFinished(int $isFinished): void
    {
        $this->isFinished = $isFinished;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNbPaire(): int
    {
        return $this->nbPaire;
    }

    public function setNbPaire(int $nbPaire): void
    {
        $this->nbPaire = $nbPaire;
    }

    public function getNbTour(): int
    {
        return $this->nbTour;
    }

    public function setNbTour(int $nbTour): void
    {
        $this->nbTour = $nbTour;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }


    public function create(int $userId, int $nbPaire) : array
    {
        $this->setUserId($userId);
        $this->setNbPaire($nbPaire);
        //genrer la liste de carte
        $cardList =[];
        $imagesList= range(1, 12);
        shuffle($imagesList);
        for ($i=0 ; $i<$nbPaire; $i++) {
            $card = $imagesList[$i];
            $cardA = $card .'a';
            $cardB = $card .'b';
            array_push($cardList, $cardA, $cardB);
           shuffle($cardList);
        }
        $this->date = date("Y-m-d H:i:s");
        $insert = $this->bdd->prepare('INSERT INTO Game (nb_paire,nb_tour,user_id,date,is_finished) VALUES (?, ?,?,?,?)');
        $insert->execute(array($this->nbPaire,$this->nbTour, $this->userId, $this->date, $this->isFinished));
        $this->id =  $this->bdd->lastInsertId();
        return $cardList;
    }

    public function save()
    {
        $insert = $this->bdd->prepare('INSERT INTO Game (nb_paire,nb_tour,user_id,date,is_finished) VALUES (?, ?,?,?,?)');
        $insert->execute(array($this->nbPaire,$this->nbTour, $this->userId, $this->date, $this->isFinished));
        return true;
    }

    public function getGamefromId(int $id)
    {
        $query = $this->bdd->prepare("SELECT id, nb_paire, nb_tour, user_id, date, is_finished  FROM Game WHERE id=?");
        $query->execute([$id]);
        $gameDetail = $query->fetch(PDO::FETCH_ASSOC);
        foreach ($gameDetail as  $index => $value)
        {
            $this->$index = $value;
        }
        return $this;
    }

    public function getGamefromPaire(int $nbPair)
    {
        $query = $this->bdd->prepare("SELECT id, nb_paire, nb_tour, user_id, date, is_finished  FROM Game WHERE nb_paire=? ORDER BY nb_tour ASC");
        $query->execute([$nbPair]);
        $gameDetail = $query->fetch(PDO::FETCH_ASSOC);
        foreach ($gameDetail as  $index => $value)
        {
            $this->$index = $value;
        }
        return $this;
    }


}