<?php
include_once "views/BasicDoc.php";

abstract class ProductDoc extends BasicDoc {
    protected function showContent(){
        echo "test van product";
    }
    protected function ShoppingCartForm($page, $action, $text, $productid=''){echo'
        <form action="index.php" method="post">
            <input type="hidden" name="page" value="';echo $page;echo'">
            <input type="hidden" name="productid" value="';echo $productid ;echo'">
            <input type="hidden" name="action" value="';echo $action ;echo'">
            <input type="submit" value="';echo $text ;echo'">
        </form>';
    }
}