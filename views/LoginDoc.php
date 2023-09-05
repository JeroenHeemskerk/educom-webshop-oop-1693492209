<?php
include_once "views/FormsDoc.php";

class LoginDoc extends FormsDoc {
    protected function showHeader(){
        echo "Login";
    }
    protected function showFormContent(){
        $this -> showFormField("email", "Email:");
        $this -> showFormField("password", "Wachtwoord:");
    }
}