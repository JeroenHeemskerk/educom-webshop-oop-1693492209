<?php
include_once "views/FormsDoc.php";

class LoginDoc extends FormsDoc {
    protected function showFormPage(){
        echo 'login';
    }
    protected function showHeader(){
        echo "Login";
    }
    protected function showFormContent(){
        $this -> showFormField("email", "Email:", $this -> model -> emailErr, $this -> model -> email);
        $this -> showFormField("password", "Wachtwoord:", $this -> model -> passwordErr, $this -> model -> password);
    }
}