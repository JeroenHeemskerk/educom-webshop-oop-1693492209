<?php
include_once "views/ProductDoc.php";

class ShoppingcartDoc extends ProductDoc {
    protected function showHeader(){
        echo "Shoppingcart";
    }
    protected function showContent(){
        foreach($this -> model -> cartLines as $cartLine) {
            $this -> ShoppingCartForm("shoppingcart", "RemoveProductFromCart", "haal er 1 van uw winkelwagen weg", $cartLine["id"]);
            $this -> ShoppingCartForm("shoppingcart", "AddProductToCart", "voeg nog 1 toe aan uw winkelwagen", $cartLine["id"]);
            echo '
            <p>totaal: ';echo $cartLine["quantity"]; echo '</p>
            <p>naam: ';echo $cartLine["name"]; echo '</p>
            <p>prijs: ';echo $cartLine["price"]; echo ' euro</p>
            <p>beschrijving: ';echo $cartLine["description"]; echo '</p>
            <a href="index.php?page=webshopitem&row=';echo $cartLine["id"]; echo'"><img src="';echo $cartLine["filename"]; echo '" width="10%" height="10%"></a></p>';
        }
        echo '<p>Eindbedrag: '; echo $this -> model -> total; echo' euro</p>';
        if(!empty($this -> model -> cartLines)){
            $this -> ShoppingCartForm("shoppingcart", "AddProductToDatabase", "afrekenen");
        }
    }
}