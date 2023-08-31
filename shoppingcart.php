<?php
include_once 'sessions.php';
function ShowShoppingCart(){
    $data = GetShoppingCartData();
    foreach($data['cartLines'] as $cartLine) {
        ShoppingCartForm("shoppingcart", "RemoveProductFromCart", "haal er 1 van uw winkelwagen weg", $cartLine["id"]);
        ShoppingCartForm("shoppingcart", "AddProductToCart", "voeg nog 1 toe aan uw winkelwagen", $cartLine["id"]);
        echo '
        <p>totaal: ';echo $cartLine["quantity"]; echo '</p>
        <p>naam: ';echo $cartLine["name"]; echo '</p>
        <p>prijs: ';echo $cartLine["price"]; echo ' euro</p>
        <p>beschrijving: ';echo $cartLine["description"]; echo '</p>
        <a href="index.php?page=webshopitem&row=';echo $cartLine["id"]; echo'"><img src="';echo $cartLine["filename"]; echo '" width="10%" height="10%"></a></p>';
    }
    echo '<p>Eindbedrag: '; echo $data['total']; echo' euro</p>';
    if(!empty($data['cartLines'])){
        ShoppingCartForm("shoppingcart", "AddProductToDatabase", "afrekenen");
    }
}

function ShoppingCartForm($page, $action, $text, $productid=''){echo'
    <form action="index.php" method="post">
        <input type="hidden" name="page" value="';echo $page;echo'">
        <input type="hidden" name="productid" value="';echo $productid ;echo'">
        <input type="hidden" name="action" value="';echo $action ;echo'">
        <input type="submit" value="';echo $text ;echo'">
    </form>';
}

function GetShoppingCartData(){ 
    $cart = getCart(); 
    $total = 0;
    $cartLines = array(); 
    foreach ($cart as $key => $quantity) { 
        $product = GetProductById($key); 
        $cartLine = array("id" => $product["id"], "name" => $product["name"], "quantity" => $quantity, "price" => $product["price"], "description" => $product["description"], "filename" => $product["filename"], 'subTotal' => ($quantity * $product['price']));
        $cartLines[] = $cartLine;
        $total += $cartLine['subTotal'];
    }
    return array("cartLines" => $cartLines, "total" => $total);
}