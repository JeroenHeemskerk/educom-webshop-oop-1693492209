<?php
interface ishopcrud {    
    public function readProductByProductId();  
    public function readAllProducts();
    public function readTop5Products();
    public function createOrder();
}