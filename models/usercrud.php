<?php
class usercrud {
    private $crud;
 
    public function __construct(crud $crud) {
        $this -> crud = $crud;
    }
    public function createUser($name, $email, $password){
        try {
            $sql = "INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)";
            $params = array(":name", ":email", ":password", $name, $email, $password);
            $this -> crud -> createrow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function readUserByEmail($email){
        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $params = array(":email", $email);
            return $this -> crud -> readOneRow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function readUserByUserId($userid){
        try {
            $sql = "SELECT * FROM users WHERE id = :id";
            $params = array(":id", $userid);
            return $this -> crud -> readOneRow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    public function UpdateUser($userId, $password){
        try {
            $sql = "UPDATE users SET password = :password WHERE id = :id";
            $params = array(":password", ":id", $password, $userId);
            $this -> crud -> updaterow($sql, $params);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
}