<?php
include_once "views/ProductDoc.php";

class Top5Doc extends ProductDoc {
    protected function showHeader(){
        echo "Top5";
    }
    protected function showContent(){$i = 1;
        foreach ($this -> model -> carts as $cart) {
            $Product = $this -> model -> GetProductById($cart["productid"]); echo '
            <p>Welkom bij de 5 best verkochte items alle tijden</p>
            <div class="Product">
            <p>plek '; echo $i; echo ' best verkochte product deze week</p>
            <p>naam: ';echo $Product["name"]; echo '</p>
            <a href="index.php?page=webshopitem&row=';echo $Product["id"]; echo'"><img src="';echo $Product["filename"]; echo '" width="50%" height="50%"></a>
            </div>';
            $i++;
        }
    }
}