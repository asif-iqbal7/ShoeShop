<?php
include 'nav.php';
    include '../include/config.php';
    $sql = "SELECT * FROM product WHERE sold > 0";
  ?>
  <div class="alignItemCenter">
 

    <?php
    
        $result = mysqli_query($link, $sql);
	    $num = mysqli_num_rows($result);
        
            echo '<div class="alignItemCenter">';
            
            if($num >= 1) {
                echo'<table style = "width: 95%;" >
                <caption><h1>Sale Product</h1></caption>
                <tr>
                    
                    <th>Product Name</th>
                    <th>Product picture</th>
                    <th>Product Size</th>
                    <th>Product Price</th>
                    <th>Sold</th>
                    
                </tr>';
                $sale = 0;
                $profit = 0;

                while($row = mysqli_fetch_assoc($result)) {
                    $sale = $sale + ($row['pro_price']*$row['sold']);
                    echo "<tr>
                    <td> {$row['pro_name']} </td>".
                    "<td><img src='../img/".$row['pro_pic']."' alt='' width='100'></td>".
                    "<td> {$row['pro_size']} </td>".
                    "<td> {$row['pro_price']} </td>".
                    "<td> {$row['sold']} </td>".
                    "
                    </tr>";
              }
               echo '</table>';
               $stockValue = 0;
               $sql = "SELECT * FROM product WHERE `status` = 'available'";
               $result = mysqli_query($link, $sql);
               while($row = mysqli_fetch_assoc($result)) {
                $stockValue = $stockValue + $row['pro_price'];
               }
               $grossValue = ($stockValue)-($stockValue*20/100);
               $profit = $sale*20/100;
               echo '
            </div>
            <div><table style="table-layout: fixed;width:30%;border:none;margin-left:auto;margin-right:0 auto;">
    <tr>
        <td style="border:none;">Total Stock Value:</td>
        <td style="border:none;">' . $grossValue . '</td>
        
    </tr>
    <tr>
        <td style="border:none;">Total Sale:</td>
        <td style="border:none;">'.$sale.'</td>
        
    </tr>
    <tr>
        <td style="border:none;">Total Profit:</td>
        <td style="border:none;">'.$profit.'</td>
        
    </tr>
</table></div>';
        }else{
            echo '<div class="alignItemCenter">NO RECORD FOUND</div>';
        }

        
?>

</body>
</html>