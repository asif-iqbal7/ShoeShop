<?php
    // include  file
    require_once './include/config.php';
    
    if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
       if(isset($_SESSION['user_id'])){
        $userid = $_SESSION['user_id'];
       } 

        if(!isset($_SESSION['email'])&&isset($_GET['add-to-cart'])){
            header("location: login.php");
        }
//  cart implementation
if(isset($_GET['add-to-cart'])&&isset($_SESSION['email'])){
    
    $productId = $_GET['add-to-cart'];
    $sql = "SELECT * FROM product WHERE pro_id = '$productId'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $productName = $row['pro_name'];
    $productPrice = $row['pro_price'];
    
    $sql = "INSERT INTO `cart` (`item_name`,`item_price`,`user_id`) 
            VALUES ('$productName','$productPrice','$userid')";
                $result = mysqli_query($link, $sql);
    
}
include 'nav.php'; 
    ?>

<H2 class="proHeading" style="margin-bottom:10px"><u>Girls</u></H2>
<div class="outerContainer">

<?php

$sql = "SELECT p.pro_id, p.pro_name, p.pro_pic, p.pro_size, p.pro_price, p.status,  s.subCat_name
FROM product p
LEFT JOIN subcategory s ON p.subCat_id = s.subCat_id WHERE subCat_name = 'girls' AND `status` = 'available'";
                                  
            $result = mysqli_query($link, $sql);
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            
                           echo '<div class="container">
    <div class="tilePic">
    <img  src="./img/'.$row["pro_pic"].'" alt="" width="300">

    </div>
    <div class="ProDetails">
        <div class="flex-item"><h4>
        '.$row["pro_name"].'</h4></div>
        <div class="flex-item"><span>Size </span>'.$row["pro_size"].'</div>
        <div class="flex-item"><span><b>Rs.</b></span><b>'.$row["pro_price"].'</b></div><div class="flex-item"><a style="color:red;" href="girls.php?add-to-cart='.$row["pro_id"].'"><u>Add to Cart</u></a></div>
        
</div>
</div>';
                            
     } 
 }

?>
</div>
</body>
</html>