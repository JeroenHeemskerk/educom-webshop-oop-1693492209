<?php
session_start();
function LoginUser($data) {
    $_SESSION['name'] = $data["name"];
    $_SESSION['userId'] = $data["userId"];
}
function LogoutUser() {
    session_unset();
    session_destroy();
}
function IsUserLogIn() {
    if(!empty($_SESSION['name'])){
        return true;
    }else{
        return false;
    }
}
function getLogInUsername() {
    return $_SESSION['name'];
}
function getLogInUserId() {
    return $_SESSION['userId'];
}
function AddProductToCart($ProductId) {
    if(array_key_exists($ProductId, getCart())){
        $_SESSION['cart'][$ProductId] += 1;
    } else {
        $_SESSION['cart'][$ProductId] = 1;
    }
}
function RemoveProductFromCart($ProductId) {
    $_SESSION['cart'][$ProductId] -= 1;
}
function CleanCart() {
    unset($_SESSION["cart"]);
}
function getCart(){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    return $_SESSION['cart'];
}