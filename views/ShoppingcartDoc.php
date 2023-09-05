<?php
include_once "../views/ProductDoc.php";

class ShoppingcartDoc extends ProductDoc {
    protected function showContent(){
        $this -> ShoppingCartForm("haal er 1 van uw winkelwagen weg");
        $this -> ShoppingCartForm("voeg nog 1 toe aan uw winkelwagen");
        echo '
        <p>totaal: </p>
        <p>naam: </p>
        <p>prijs:  euro</p>
        <p>beschrijving: </p>
        <a href="index.php?page=webshopitem&row=" width="10%" height="10%"></a></p>';
        echo '<p>Eindbedrag:  euro</p>';
        $this -> ShoppingCartForm("afrekenen");
    }
}