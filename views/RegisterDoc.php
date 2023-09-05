<?php
include_once "../views/FormsDoc.php";

class RegisterDoc extends FormsDoc {
    protected function showFormContent(){
        $this -> showFormField("name", "Naam:");
        $this -> showFormField("email", "Email:");
        $this -> showFormField("password", "Wachtwoord:");
        $this -> showFormField("passwordcheck", "Herhaal wachtwoord:");
    }
}