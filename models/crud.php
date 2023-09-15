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

        $NumOfParams = count($params);
        $loops = $NumOfParams / 2 ;

        $stmt = $conn->prepare($sql);
        for($i = 0; $i < $loops; $i++){
            $stmt -> bindParam($params[$i], $params[$i + $loops]);
        }
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
    public function readMultipleRows($sql){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
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