<?php

namespace Memento;

require_once('Models\Connexion.php');

class Rank extends Connexion
{
    protected $id;
    protected $gameId;

    public function __construct()
    {
        parent::__construct();
        $this->id = null;
        $this->gameId = null;
    }

}