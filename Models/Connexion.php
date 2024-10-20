<?php

namespace Memento;


use PDO;
use PDOException;

class Connexion
{
    protected $bdd;

    public function __construct()
    {
        try {
            // Établir la connexion à la base de données
            $this->bdd = new PDO('mysql:host=localhost:8889;dbname=memento', 'root', 'root');

            // Définir le mode d'erreur PDO sur exception
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        } catch (PDOException $e) {
            echo "Échec de la connexion : " . $e->getMessage();
        }
    }
}

?>