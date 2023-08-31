<?php 
include_once "user.service.php";
function CheckRegister() {
    $nameErr = $emailErr = $passwordErr = $passwordcheckErr = $databaseErr = $genericErr = "";
    $name = TestInput(getPostVar('name'));
    $email = TestInput(getPostVar('email'));
    $password = TestInput(getPostVar('password'));
    $passwordcheck = TestInput(getPostVar('passwordcheck'));
    $registervalid = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($name)) {
            $nameErr = "naam is verplicht";
        } else {
            if (!ctype_alpha($name)) {
                $nameErr = "nummers in je naam zijn niet toegstaan";
            }
        }
        if (empty($email)) {
            $emailErr = "email is verplicht";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "je moet een echt emailadres invullen";
            }
        }
        if (empty($password)) {
            $passwordErr = "wachtwoord is verplicht";
        } else if (empty($passwordcheck)) {
                $passwordcheckErr = "herhaal wachtwoord is verplicht";
            } else if ($password != $passwordcheck) {
                    $passwordErr = $passwordcheckErr = "wachtwoorden moeten hetzelfde zijn";
                }
        if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($passwordcheckErr)) {
            try {
                if(DoesEmailExist($email) == false){
                    $registervalid = true;
                }else {
                    $emailErr = "de email bestaat al";
                }
            } catch(Exception $e){
                $data['genericErr'] = 'sorry er is een technische storing4';
            }
        }
    }

    return array ("registervalid"=> $registervalid, "name" => $name, "email" => $email, "password" => $password, "passwordcheck" => $passwordcheck, 
    "nameErr" => $nameErr, "emailErr" => $emailErr, "passwordErr" => $passwordErr, "passwordcheckErr" => $passwordcheckErr, 
    "databaseErr" => $databaseErr, "genericErr" => $genericErr);
}

function ShowRegisterForm($data) { echo '
    <form action="index.php" method="post" name="register">
        <div>
            <input type="hidden" name="page" value="register">
        </div>';
        ShowFormField("name", "Naam:", $data["name"], $data['nameErr']);
        ShowFormField("email", "Email:", $data["email"], $data['emailErr']);
        ShowFormField("password", "Wachtwoord:", $data["password"], $data['passwordErr']);
        ShowFormField("passwordcheck", "Herhaal wachtwoord:", $data["passwordcheck"], $data['passwordcheckErr']);
        echo '
        <div>
            <input type="submit" value="verstuur">
            '. $data['databaseErr'] . '
        </div>
';}

function ShowFormField($for, $label, $value, $error){echo '
    <div>
        <label class="form" for=' . $for . '>' . $label . '</label>
        <input class="input" type="text" id=' . $for . ' name=' . $for . ' 
        value="'.(!empty($value) ? $value : '') .'">';
        echo '<span class="error">' . $error . '</span>';
        echo '
    </div>';
}