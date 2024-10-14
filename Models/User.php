<?php

namespace Memento;

require_once('Models\Connexion.php');

class User extends Connexion
{
    protected $id;


    protected $firstname;
    protected $lastname;
    protected $login;
    protected $password;

    public function __construct()
    {
        parent::__construct();
        $this->id = null;
        $this->firstname = '';
        $this->lastname = '';
        $this->login = '';
        $this->password = '';

    }

    public function getId(): null
    {
        return $this->id;
    }

    public function setId(null $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


}