<?php
include_once "views/ProductDoc.php";

class WebshopDoc extends ProductDoc {
    protected function showHeader(){
        echo "Webshop";
    }
    protected function showContent(){
        foreach ($this -> model -> products as $product) {echo '
            <div class="webshopitem">
            <p>naam: ';echo $product["name"]; echo '</p>
            <a href="index.php?page=webshopitem&row=';echo $product["id"]; echo'"><img src="';echo $product["filename"]; echo '" width="50%" height="50%"></a>
            </div>';
            //2 1 5 4 3
        }
    }
}