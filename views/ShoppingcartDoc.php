<?php
include_once "views/ProductDoc.php";

class ShoppingcartDoc extends ProductDoc {
    protected function showHeader(){
        echo "Shoppingcart";
    }
    protected function showContent(){
        $this -> ShoppingCartForm("haal er 1 van uw winkelwagen weg");
        $this -> ShoppingCartForm("voeg nog 1 toe aan uw winkelwagen");
        echo '
        <p>totaal: ';echo $this -> data['total']; echo' </p>
        <p>naam: ';echo $this -> data['name']; echo'</p>
        <p>prijs: ';echo $this -> data['price']; echo' euro</p>
        <p>beschrijving: ';echo $this -> data['description']; echo'</p>
        <a href="index.php?page=webshopitem&row="><img src="';echo $this -> data["filename"]; echo '" width="10%" height="10%"></a></p>';
        echo '<p>Eindbedrag: ';echo $this -> data['cost']; echo' euro</p>';
        $this -> ShoppingCartForm("afrekenen");
    }
}