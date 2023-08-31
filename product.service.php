<?php
include "products.repository.php";
include_once "sessions.php";
function SearchForProducts(){
    $products = GetAllProducts();
    return $products;
}
function SearchForProductById($productId){
    $product = GetProductById($productId);
    return $product;
}
function AddProductToDatabase(){
    $userId = getLogInUserId();
    $products = getCart();
    $productsId = array_keys($products);
        foreach($productsId as $productId){
            for($i=0; $i < $products[$productId]; $i++){
                SaveOrder($userId, $productId);
            }
        }
    CleanCart();
}