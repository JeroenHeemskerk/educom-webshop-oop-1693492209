<?php

class testUser{
    public $user = array("id" => 300, "name" => "nietgoed", "password" => "foute_boel", "email" => "incorrect");

    public function __construct($id = 200, $name = "fout", $password = "wrong", $email = "not_correct"){
        $this -> user;
        $this -> user["id"] = $id;
        $this -> user["name"] = $name;
        $this -> user["password"] = $password;
        $this -> user["email"] = $email;
    }
}