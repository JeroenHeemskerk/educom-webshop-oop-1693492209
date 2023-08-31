<?php
function GetTop5Products(){
    $conn = ConnectDB();
    try {
        $sql = "SELECT id, productid, COUNT(productid) FROM shoppingcart 
         GROUP BY productid ORDER BY COUNT(productid) DESC LIMIT 5";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            throw new Exception("geen producten gevonden, SQL: " . $sql . ", Error " . $conn->error());
        }
        $carts = array();
        while($row = mysqli_fetch_assoc($result)) {
            $carts[$row["id"]] = $row;
        }
        return $carts;
    } finally {
    mysqli_close($conn);
    }
}