<?php
include_once "views/FormsDoc.php";

class ChangePasswordDoc extends FormsDoc {
    protected function showHeader(){
        echo "Change Password";
    }
    protected function showFormContent(){
        $this -> showFormField("oldpassword","oud wachtwoord:", $this -> model -> oldpasswordErr, $this -> model -> oldpassword);
        $this -> showFormField("password","nieuw wachtwoord:", $this -> model -> passwordErr, $this -> model -> password);
        $this -> showFormField("passwordcheck","herhaal wachtwoord:", $this -> model -> passwordcheckErr, $this -> model -> passwordcheck);
    }
}