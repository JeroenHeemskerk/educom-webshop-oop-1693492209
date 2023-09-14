<?php
class crud {
    public function connection(){
        $servername = "localhost";
        $username = "stijn_webshop_educom";
        //super goed wachtwoord ik weet
        $sqlpassword = "Stijnstijn12";
        $dbname = "stijn_webshop";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $sqlpassword);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    public function createrow($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[3]);
        $stmt -> bindParam($params[1], $params[4]);
        $stmt -> bindParam($params[2], $params[5]);
        $stmt -> execute();
    }
    public function readOneRow($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[1]);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> execute();
        
        $result = $stmt -> fetch();
        return $result;
    }
    public function readMultipleRows ($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[1]);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> execute();
        
        $result = $stmt -> fetchAll();
        return $result;
    }
    public function updaterow($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[2]);
        $stmt -> bindParam($params[1], $params[3]);
        $stmt -> execute();
    }
    public function deleterow($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[1]);
        $stmt -> execute();
    }
}