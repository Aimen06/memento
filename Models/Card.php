<?php

namespace Memento;

use PDO;


require_once('Connexion.php');

class Card extends Connexion
{
    protected $id;
    protected $name;
    protected $image;

    public function __construct()
    {
        $this->id = null;
        $this->image = '';
        $this->name = '';
        parent::__construct();
    }

    /**
     * @return null
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }

    public function getCardfromId(string $id)
    {
        $query = $this->bdd->prepare("SELECT id, name, image  FROM Card WHERE id=?");
        $query->execute([intval($id)]);
        $cardDetail = $query->fetch(PDO::FETCH_ASSOC);
        foreach ($cardDetail as  $index => $value)
        {
            $this->$index = $value;
        }
        return $this;
    }



}