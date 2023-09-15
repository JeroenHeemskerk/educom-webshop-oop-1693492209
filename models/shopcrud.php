<?php
class shopcrud {
    private $crud;
 
    public function __construct(crud $crud) {
        $this -> crud = $crud;
        $this -> crud = $this -> crud;
    }
    public function createProduct($name, $description, $price, $filename){
        try {
            $sql = "INSERT INTO products (name, description, price, filename)
            VALUES (:name, :description, :price, :filename)";
            $params = array(":userid", ":description", ":price", ":filename", $userid, $description, $price, $filename);
            $this -> crud -> createrow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function createOrder($userid, $productid){
        try {
            $sql = "INSERT INTO shoppingcart (userid, productid) VALUES (:userid, :productid)";
            $params = array(":userid", ":productid", $userid, $productid);
            $this -> crud -> createrow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function readTop5Products(){
        try {
            $sql = "SELECT id, productid, COUNT(productid) FROM shoppingcart 
             GROUP BY productid ORDER BY COUNT(productid) DESC LIMIT 5";
            return $this -> crud -> readMultipleRows($sql);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function readAllProducts(){
        try {
            $sql = "SELECT * FROM products";
            return $this -> crud -> readMultipleRows($sql);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }

    public function readProductByProductId($productid){
        try {
            $sql = "SELECT * FROM products WHERE id = :id";
            $params = array(":id", $productid);
            return $this -> crud -> readOneRow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}