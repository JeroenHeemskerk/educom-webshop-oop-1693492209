<?php
include_once 'sessions.php';
include_once 'shoppingcart.php';
function ShowWebshopItem($product){echo '
    <p>naam: ';echo $product["name"]; echo '</p>
    <p>prijs: ';echo $product["price"]; echo ' euro</p>
    <p>beschrijving: ';echo $product["description"]; echo '</p>
    <img src="';echo $product["filename"]; echo '" width="100%" height="100%"></img>';
    ShoppingCartForm("webshop", "AddProductToCart", "bestel", $product["id"]);
}