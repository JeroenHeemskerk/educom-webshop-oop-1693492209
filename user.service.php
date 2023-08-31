<?php
include_once "users.repository.php";
include_once "sessions.php";
define("RESULT_OK", 0);
define("RESULT_UNKNOWN_USER", -1);
define("RESULT_WRONG_PASSWORD", -2);
function AuthorizeUserByEmail($email, $password){
    $user = FindUserByEmail($email);
    return AuthorizeUser($user, $password);
}
function AuthorizeUserByUserId($userId, $password){
    $user = FindUserByUserId($userId);
    return AuthorizeUser($user, $password);
}
function AuthorizeUser($user, $password){
    if(empty($user)){
        return ['result' => RESULT_UNKNOWN_USER]; 
    }
    if($password != $user['password']){
        return ['result' => RESULT_WRONG_PASSWORD]; 
    }
    return ['result' => RESULT_OK, 'user' => $user]; 
}
function DoesEmailExist($email){
    $user = FindUserByEmail($email);
    return !empty($user);
}
function GetEmail($userId){
    $email = FindEmailByUserId($userId);
    return $email;
}
function StoreUser($email, $name, $password, $databaseErr){
    SaveUser($email, $name, $password, $databaseErr);
}
function UpdatePassword($password){
    $userId = getLogInUserId();
    UpdateUser($userId, $password);
}
function TestInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }