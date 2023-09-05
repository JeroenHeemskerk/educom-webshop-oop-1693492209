<?php
include_once "views/BasicDoc.php";

abstract class ProductDoc extends BasicDoc {
    protected function showContent(){
        echo "test van product";
    }
    protected function ShoppingCartForm($text){echo'
        <form action="index.php" method="post">
            <input type="hidden" name="page">
            <input type="hidden" name="productid">
            <input type="hidden" name="action">
            <input type="submit" value="';echo $text ;echo'">
        </form>';
    }
}