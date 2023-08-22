<?php

// Delete Cart
 
        include './include/config.php';
        $sql =  "DELETE FROM `cart`";
            $result = mysqli_query($link, $sql);
             
session_start();

session_unset();

session_destroy();

header("location: index.php");
?>