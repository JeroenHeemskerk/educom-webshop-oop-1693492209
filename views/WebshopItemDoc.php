<?php
include_once "views/ProductDoc.php";

class WebshopItemDoc extends ProductDoc {
    protected function showHeader(){
        echo "WebshopItem";
    }
    protected function showContent(){echo '
        <p>naam: ';echo $this -> data["name"]; echo '</p>
        <p>prijs: ';echo $this -> data["price"]; echo ' euro</p>
        <p>beschrijving: ';echo $this -> data["description"]; echo '</p>
        <img src="';echo $this -> data["filename"]; echo '" width="100%" height="100%"></a></p>';
        $this -> ShoppingCartForm("bestel");
    }
}