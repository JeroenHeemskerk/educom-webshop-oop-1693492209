<?php 
include_once "user.service.php";
include_once "register.php";
function CheckLogin() {
    $emailErr = $passwordErr = $genericErr  = "";
    $userId = "";
    $name = TestInput(getPostVar('name'));
    $email = TestInput(getPostVar('email'));
    $password = TestInput(getPostVar('password'));
    $loginvalid = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $userInfo = AuthorizeUserByEmail($email, $password);
            switch($userInfo['result']) {
                case RESULT_UNKNOWN_USER:
                    $emailErr = "deze email is niet gevonden in het database";
                    break;
                case RESULT_WRONG_PASSWORD:
                    $passwordErr = "wachtwoord hoort niet bij deze email";
                    break;
                case RESULT_OK:
                    $name = $userInfo["user"]["name"];
                    $userId = $userInfo["user"]["id"];
                    $loginvalid = true;
                    break;
                default: 
                   logDebug("Onbekend result " . $userInfo['result']);
                   break;
                }
            } catch(Exception $e){
                $data['genericErr'] = 'sorry er is een technische storing3';
            }
        }
    return array ("loginvalid"=> $loginvalid, "email" => $email, "password" => $password, 
    "emailErr" => $emailErr, "passwordErr" => $passwordErr, "genericErr" => $genericErr, "name" => $name, "userId" => $userId);
}

function ShowLoginForm($data) { echo '
    <form action="index.php" method="post" name="login">
        <div>
            <input type="hidden" name="page" value="login">
        </div>';
        ShowFormField("email", "Email:", $data["email"], $data['emailErr']);
        ShowFormField("password", "Wachtwoord:", $data["password"], $data['passwordErr']);
        echo '
        <div>
            <input type="submit" value="verstuur">
        </div>
';}