<?php

require_once './include/config.php';
// Delete Category
 if(isset($_GET['cart_id'])){
    $cart_id=$_GET['cart_id'];
    
        $sql =  "DELETE FROM `cart` WHERE `cart_id` = '$cart_id'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                header("location: cart.php");
                
            }  
    }
?>