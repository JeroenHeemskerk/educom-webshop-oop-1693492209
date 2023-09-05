<?php
include_once "../views/ProductDoc.php";

class WebshopItemDoc extends ProductDoc {
    protected function showContent(){echo '
        <p>naam: </p>
        <p>prijs:  euro</p>
        <p>beschrijving: </p>
        <img src="" width="100%" height="100%"></img>';
        $this -> ShoppingCartForm("bestel");
    }
}