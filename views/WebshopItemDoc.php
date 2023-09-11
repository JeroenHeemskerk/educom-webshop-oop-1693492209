<?php
include_once "views/ProductDoc.php";

class WebshopItemDoc extends ProductDoc {
    protected function showHeader(){
        echo "WebshopItem";
    }
    protected function showContent(){echo '
        <p>naam: ';echo $this -> model -> product["name"]; echo '</p>
        <p>prijs: ';echo $this -> model -> product["price"]; echo ' euro</p>
        <p>beschrijving: ';echo $this -> model -> product["description"]; echo '</p>
        <img src="';echo $this -> model -> product["filename"]; echo '" width="100%" height="100%"></a></p>';
        $this -> ShoppingCartForm("webshop", "AddProductToCart", "bestel", $this -> model -> product["id"]);
    }
}