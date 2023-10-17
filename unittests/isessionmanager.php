<?php
interface isessionmanager {  
    public function GetLoginPassword();
    public function readCart();
    public function AddProductToCart();
    public function RemoveProductFromCart();
    public function getLogInUserId();
    public function CleanCart();
    public function LogoutUserSession();
    public function LogInUserSession();
}