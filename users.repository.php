<?php
function ConnectDB(){
    $servername = "localhost";
    $username = "stijn_webshop_educom";
    //super goed wachtwoord ik weet
    $sqlpassword = "Stijnstijn12";
    $dbname = "stijn_webshop";
    $conn = mysqli_connect($servername, $username, $sqlpassword, $dbname);
    if (!$conn) {
        throw new Exception("Er is geen verbinden gevonden met het database");
    }
    return $conn;
}

function FindUserByEmail($email){
    $conn = ConnectDB();
    try {
        $email = $conn->real_escape_string($email);
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            throw new Exception("Finding User failed, SQL: " . $sql . ", Error " . $conn->error());
        }
        return $result->fetch_assoc();
    } finally {
    mysqli_close($conn);
    }
}
function FindUserByUserId($userId){
    $conn = ConnectDB();
    try {
        $userId = $conn->real_escape_string($userId);
        $sql = "SELECT * FROM users WHERE id='$userId'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            throw new Exception("Finding User failed, SQL: " . $sql . ", Error " . $conn->error());
        }
        return $result->fetch_assoc();
    } finally {
    mysqli_close($conn);
    }
}
function SaveUser($email, $name, $password, $databaseErr){
    $conn = ConnectDB();
    try {
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);
        $sql = "INSERT INTO users (name, email, password)
        VALUES ('$name','$email','$password')";
        if (mysqli_query($conn, $sql) === FALSE) {
            throw new Exception("Het is niet gelukt om het in het database te zetten");
        }
    } finally {    
    mysqli_close($conn);
    }
}
function UpdateUser($userId, $password){
    $conn = ConnectDB();
    try {
        $password = $conn->real_escape_string($password);
        $userId = $conn->real_escape_string($userId);
        $sql = "UPDATE users SET password='$password' WHERE id='$userId'";
        if (mysqli_query($conn, $sql) === FALSE) {
            throw new Exception("Het is niet gelukt om het in het database te zetten");
        }
    } finally {    
    mysqli_close($conn);
    }
}