<?php
include 'nav.php';
    include '../include/config.php';
    $sql = "SELECT * FROM orders";
  ?>
  <div class="alignItemCenter">

    <?php
    
        $result = mysqli_query($link, $sql);
	    $num = mysqli_num_rows($result);
        
            echo '<div class="alignItemCenter">';
            
            if($num >= 1) {
                echo'<table style = "width: 95%;"  class="schoolTable">
                <caption><h1>Orders</h1></caption>
                <tr>
                    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>Phone Number</th>
                    <th>Product Name</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                </tr>';
                while($row = mysqli_fetch_assoc($result)) {
                    $orderId = $row['order_id'];
                    $status = $row['status'];
                    echo "<tr>
                    <td> {$row['first_name']} </td>".
                    "<td> {$row['last_name']} </td>".
                    "<td> {$row['email']} </td>".
                    "<td> {$row['address']} </td>".
                    "<td> {$row['phone_number']} </td>".
                    "<td> {$row['product_name']} </td>".
                    "<td> {$row['total_amount']} </td>".
                    "<td> {$row['paymentMethod']} </td>".
                    "<td> {$row['time']} </td>".
                    "<td>"; 
                    if(!$status==1){
                        
                        echo "<a href='actions.php?orderId=$orderId'><button type='' >complete</button></a>";
                }elseif($status==1){echo "<h4>Completed</h4>";
                }
                     echo "</td>".
                  
                  
                     "</tr>";
              }
               echo '</table>
            </div>';
        }else{
            echo '<div class="alignItemCenter">NO RECORD FOUND</div>';
        }

        
?>
</body>
</html>