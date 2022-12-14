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
        $role="USER",
        $address,
        $city,
        $postal_code,
        $phone_number
    )
    {
        $this->id = $id;
        $this->username = htmlspecialchars($username);
        $this->email = htmlspecialchars($email);
        $this->password = $password;
        $this->role = $role;
        $this->address = htmlspecialchars($address);
        $this->city = htmlspecialchars($city);
        $this->postal_code = htmlspecialchars($postal_code);
        $this->phone_number = htmlspecialchars($phone_number);
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

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->$address = $address;
    }

    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->$city = $city;
    }

    public function getPostal_Code(){
        return $this->postal_code;
    }

    public function setPostal_Code($postal_code){
        $this->$postal_code = $postal_code;
    }

    public function getPhone_Number(){
        return $this->phone_number;
    }

    public function setPhone_Number($phone_number){
        $this->phone_number = $phone_number;
    }
}