<?php
include "carts.repository.php";
function SearchForTop5Products(){
    $carts = GetTop5Products();
    return $carts;
}