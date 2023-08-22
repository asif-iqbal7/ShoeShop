<?php
include 'nav.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset($_SESSION['user_id'])){

$user_id = $_SESSION['user_id'];


require_once './include/config.php';
    $sql = "SELECT * FROM cart WHERE `user_id` = '$user_id'";
  ?>
  <div class="alignItemCenter">

    <?php
    
        $result = mysqli_query($link, $sql);
	    $num = mysqli_num_rows($result);
        
            echo '<div class="alignItemCenter">';
            
            if($num >= 1) {
                echo'<table style = "width: 40%;"  class="schoolTable">
                <caption><h1>Cart</h1></caption>
                <tr>
                    
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                    
                </tr>';
                $totalCart = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $totalCart += $row['item_price'];
                    echo "<tr>
                    <td> {$row['item_name']} </td>".
                    "<td> {$row['item_price']} </td>".
                    "<td><a href='deleteCartItem.php?cart_id={$row['cart_id']}'><button type='' >Delete</button></a> </td> ".
                    "
                    </tr>";
              }
               echo '</table>';
               ?>
               <h3>Total Amount: <?php echo $totalCart; ?></h3>
               <?php
              echo' <a href="placeOrder.php"><button class="buttonCss">Checkout</button></a>
           </div>';
        }else{
            echo '<div class="alignItemCenter">NO RECORD FOUND</div>';
        }

    }else{
        echo '<div class="alignItemCenter">NO RECORD FOUND</div>';
    }   

?>
        
</body>
</html>