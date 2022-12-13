<?php

namespace Entity;

class User {

    protected int $id;
    protected string $username;
    protected string $email;
    protected string $password;
    protected string $role;

    function __construct(
        $id,
        $username,
        $email,
        $password,
        $role="USER"
    )
    {
        $this->id = $id;
        $this->username = htmlspecialchars($username);
        $this->email = htmlspecialchars($email);
        $this->password = $password;
        $this->role = $role;
    }

    public function getId(){
        return $this->id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->$username = $username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->$email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->$password = $password;
    }

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }
}