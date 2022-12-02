<?php

namespace Interfaces;

interface interface_RegisterUser {

    public function checkUsernameAlreadyInDB($username):int;
    public function checkEmailAlreadyInDB($email):int;
    public function registerNewUser($user);
    
}