<?php
    // include navbar file
    include 'nav.php'; 
   
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once './include/config.php';
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        $paymentMethod = $_POST['payment'];
              
if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        
        $userid = $_SESSION['user_id'];

        $sql = "Select * from cart where user_id='$userid'";
        $result = mysqli_query($link, $sql);
        
	    $num = mysqli_num_rows($result);
       
        $timestamp = time();
$formattedDateTime = date("Y-m-d H:i:s", $timestamp);
        
        $totalCart = 0;
        $concatenatedStrings = "";
        if(!$num == 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $totalCart += $row['item_price'];
            // $concatenatedStrings .= $row['item_name'] . " ";
            $concatenatedStrings .= $row['item_name'] . ",";
        }

            $sql = "INSERT INTO `orders`(`first_name`, `last_name`, `email`, `address`, `phone_number`, `product_name`, `total_amount`,`paymentMethod`,`time`,`user_id`) VALUES ('$firstName','$lastName','$email','$address','$phoneNumber','$concatenatedStrings','$totalCart','$paymentMethod','$formattedDateTime','$userid')";
                $result = mysqli_query($link, $sql);
                if($result){
                    echo'<script>
                        alert("Your Order is Placed");
                    </script>';
                }
        }else{
            echo '<h3>Your cart is empty</h3>';
        }
                
                }
                   
?>

<div class="alignItemCenter">

    <form action="placeOrder.php" method="post">
        <h2 class="formHeading">Place Order</h2>
       
        <label class="formLabel">First Name:</label>
        <input class="formInput" type="text" name="firstName" id="" required>
        <br>
        <label class="formLabel">Last Name:</label>
        <input class="formInput" type="text" name="lastName" id="" required>
        <br>
        <label class="formLabel">Email:</label>
        <input class="formInput" type="email" name="email" id="" required>
        <br>
        <label class="formLabel">Address:</label>
        <input class="formInput" type="text" name="address" id="" required>
        <br>
        <label class="formLabel">Phone Number:</label>
        <input class="formInput" type="tel" name="phoneNumber" id="" required>
        <br>
        <label class="formLabel">Payment Method:</label>
        <input type="radio" name="payment" value="COD" checked> cod
        <input type="radio" name="" value="" disabled> online
        <br>
        <div class="formButton">
        <button type="submit" style="width:130px" class="buttonCss">Confirm Order</button>
        </div>
    </form>
</div>
</body>
</html>