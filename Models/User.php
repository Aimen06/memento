<?php

namespace Memento;

use PDO;

require_once('Connexion.php');

class User extends Connexion
{
    protected $id;


    protected $firstname;
    protected $lastname;
    protected $login;
    protected $password;
    protected $connected;

    public function __construct()
    {
        parent::__construct();
        $this->id = null;
        $this->firstname = '';
        $this->lastname = '';
        $this->login = '';
        $this->password = '';
        $this->connected= false;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
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

    public function register(string $firstname,string $lastname,string $login, string $password)
    {
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $insert = $this->bdd->prepare('INSERT INTO User (login, password,firstname,lastname) VALUES (?, ?, ?, ?)');
        $insert->execute(array($this->login, $this->password, $this->firstname, $this->lastname));
        $this->id =  $this->bdd->lastInsertId();
        return true;
    }

    public function connect(string $login, string $password) : void
    {
        $this->setLogin($login);
        $this->setPassword($password);
        if(!empty($this->login) && !empty($this->password)) {
            $query = $this->bdd->prepare('SELECT *  FROM User WHERE login= ? AND password= ?');
            $query->execute([$this->login, $this->password]);
            $userDetail = $query->fetch(PDO::FETCH_ASSOC);
            foreach ($userDetail as  $index => $value)
            {
                $this->$index = $value;
            }
            $this->connected = true;
        }
    }

    public function getConnected()
    {
        return $this->connected;
    }

    public function getUserfromId(int $id)
    {
        $query = $this->bdd->prepare("SELECT id, firstname, lastname, login, password  FROM User WHERE id=?");
        $query->execute([$id]);
        $userDetail = $query->fetch(PDO::FETCH_ASSOC);
        foreach ($userDetail as  $index => $value)
        {
            $this->$index = $value;
        }
        return $this;
    }


}