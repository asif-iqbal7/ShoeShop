<?php
include 'nav.php';
    include '../include/config.php';
    $sql = "SELECT * FROM product";
  ?>
  <div class="alignItemCenter">
    <?php
    
        $result = mysqli_query($link, $sql);
	    $num = mysqli_num_rows($result);
        
            echo '<div class="alignItemCenter">';
            
            if($num >= 1) {
                echo'<table style = "width: 95%;" >
                <caption><h1>Product</h1></caption>
                <tr>
                    
                    <th>Product Name</th>
                    <th>Product picture</th>
                    <th>Product Size</th>
                    <th>Product Price</th>
                    <th>Sold</th>
                    <th>Product Status</th>
                    <th>Product Status Actions</th>
                    <th>Product Actions</th>
                    
                </tr>';
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td> {$row['pro_name']} </td>".
                    "<td><img src='../img/".$row['pro_pic']."' alt='' width='100'></td>".
                    "<td> {$row['pro_size']} </td>".
                    "<td> {$row['pro_price']} </td>".
                    "<td> {$row['sold']} </td>".
                    "<td> {$row['status']} </td>".
                    "<td> <a href='actions.php?status=available&pro_id={$row['pro_id']}'><button style='margin-right:10px;' type='' >available</button></a><a href='actions.php?status=upcoming&pro_id={$row['pro_id']}'><button type='' >upcoming</button></a> </td> ".
                    "<td> <a href='updateProduct.php?pro_id={$row['pro_id']}'><button style='margin-right:10px;' type='' >Update</button></a><a href='deleteProduct.php?pro_id={$row['pro_id']}'><button type='' >Delete</button></a> </td> ".
                    "
                    </tr>";
              }
               echo '</table>
            </div>';
        }else{
            echo '<div class="alignItemCenter">NO RECORD FOUND</div>';
        }

        
?>
</body>
</html>