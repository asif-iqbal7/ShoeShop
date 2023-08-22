<?php
include '../include/config.php';
if(isset($_GET['orderId'])){
    $orderId = $_GET['orderId'];
                        $sql = "UPDATE orders SET `status` = '1'
WHERE order_id   = '$orderId'";
                $result = mysqli_query($link, $sql);
                        }

if(isset($_GET['pro_id'])&&isset($_GET['status'])&&$_GET['status']=='available'){
$status=$_GET['status'];
$pro_id=$_GET['pro_id'];
$sql = "UPDATE product SET `status` = '$status'
WHERE pro_id   = '$pro_id'";
                $result = mysqli_query($link, $sql);
                if($result){header("location: displayProduct.php");}


}
if(isset($_GET['pro_id'])&&isset($_GET['status'])&&$_GET['status']=='upcoming'){
    $status=$_GET['status'];
    $pro_id=$_GET['pro_id'];
    $sql = "UPDATE product SET `status` = '$status'
    WHERE pro_id   = '$pro_id'";
                    $result = mysqli_query($link, $sql);
                    if($result){header("location: displayProduct.php");}
    
    
    }


    if(isset($_GET['orderId'])){
        $orderId = $_GET['orderId'];

        $sql = "SELECT * FROM `orders` WHERE `order_id` = '$orderId'";
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $products = $row['product_name'];
                        
                        $strings = explode(",",$products);

foreach ($strings as $string) {
    
    $sql = "UPDATE product SET `sold` = sold + 1 
    WHERE pro_name   = '$string'";
                    $result = mysqli_query($link, $sql);
}   
if($result){
    header("location: orders.php");
}   

    }

?>