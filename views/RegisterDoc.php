<?php
include_once "views/FormsDoc.php";

class RegisterDoc extends FormsDoc {
    protected function showHeader(){
        echo "Register";
    }
    protected function showFormContent(){
        $this -> showFormField("name", "Naam:", $this -> model -> nameErr, $this -> model -> name);
        $this -> showFormField("email", "Email:", $this -> model -> emailErr, $this -> model -> email);
        $this -> showFormField("password", "Wachtwoord:", $this -> model -> passwordErr, $this -> model -> password);
        $this -> showFormField("passwordcheck", "Herhaal wachtwoord:", $this -> model -> passwordcheckErr, $this -> model -> passwordcheck);
    }
}