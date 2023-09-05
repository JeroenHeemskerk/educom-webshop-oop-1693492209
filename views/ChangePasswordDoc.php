<?php
include_once "views/FormsDoc.php";

class ChangePasswordDoc extends FormsDoc {
    protected function showHeader(){
        echo "Change Password";
    }
    protected function showFormContent(){echo '
        <div>
            <label class="form" for="oldpassword">oud wachtwoord:</label>
            <input class="input" type="text" id="oldpassword" name="oldpassword">';
            echo '<span class="error"></span>';
            echo '
        </div>
        <div>
            <label class="form" for="password">nieuw wachtwoord:</label>
            <input class="input" type="text" id="password" name="password">';
            echo '<span class="error"></span>';
            echo '
        </div>
        <div>
            <label class="form" for="passwordcheck">herhaal wachtwoord:</label>
            <input class="input" type="text" id="passwordcheck" name="passwordcheck">';
            echo '<span class="error"></span>';
            echo '
        </div>';
    }
}