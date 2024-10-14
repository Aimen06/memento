<?php

namespace Memento;

require_once('Models\Connexion.php');

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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage(): int
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


}