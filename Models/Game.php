<?php

namespace Memento;

require_once('Models\Connexion.php');

class Game extends Connexion
{
    protected $id;
    protected $nbPaire;
    protected $nbTour;
    protected $winnerId;
    protected $date;


    public function __construct()
    {
        parent::__construct();
        $this->id = null;
        $this->nbPaire = null;
        $this->nbTour = null;
        $this->winnerId = null;
        $this->date = '';
    }

    public function getId(): null
    {
        return $this->id;
    }

    public function setId(null $id): void
    {
        $this->id = $id;
    }

    public function getNbPaire(): null
    {
        return $this->nbPaire;
    }

    public function setNbPaire(null $nbPaire): void
    {
        $this->nbPaire = $nbPaire;
    }

    public function getNbTour(): null
    {
        return $this->nbTour;
    }

    public function setNbTour(null $nbTour): void
    {
        $this->nbTour = $nbTour;
    }

    public function getWinnerId(): null
    {
        return $this->winnerId;
    }

    public function setWinnerId(null $winnerId): void
    {
        $this->winnerId = $winnerId;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }


    public function init($userId,$nbPaire)
    {

    }
}