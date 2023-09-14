<?php
class crud {
    public function testread(){
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $params = array(":email", "john@example.com");
            $this -> readOneRow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function testcreate(){
        try {
            $sql = "INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)";
            $params = array(":name", ":email", ":password", "gary", "gary@example.com", "testcrud");
            $this -> createrow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function testupdate(){
        try {
            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $params = array(":name", ":email", ":id", "john", "mary@example.com", 10);
            $this -> updaterow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function testdelete(){
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $params = array(":id","12");
            $this -> deleterow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
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
        var_dump($result -> name);
    }
    public function readMultipleRows ($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[1]);
        $stmt -> setFetchMode(PDO::FETCH_OBJ);
        $stmt -> execute();
        
        $result = $stmt -> fetchAll();
        return $result;
        //var_dump($result[0] -> name);
    }
    public function updaterow($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[3]);
        $stmt -> bindParam($params[1], $params[4]);
        $stmt -> bindParam($params[2], $params[5]);
        $stmt -> execute();
    }
    public function deleterow($sql, $params){
        $conn = $this -> connection();

        $stmt = $conn->prepare($sql);
        $stmt -> bindParam($params[0], $params[1]);
        $stmt -> execute();
    }
}