<?php
    // include navbar file
    include 'nav.php'; 

    ?>

<H2 class="proHeading" style="margin-bottom:20px"><u>Upcoming</u></H2>
<div class="outerContainer">

<?php

require_once './include/config.php';

$sql = "SELECT p.pro_id, p.pro_name, p.pro_pic, p.pro_size, p.pro_price, p.status,  s.subCat_name
FROM product p
LEFT JOIN subcategory s ON p.subCat_id = s.subCat_id WHERE `status` = 'upcoming'";
                                  
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
        <div class="flex-item"><span><b>Rs.</b></span><b>'.$row["pro_price"].'</b></div><div class="flex-item"><a style="color:red;" href="#"><u>Add to Cart</u></a></div>
        
</div>
</div>';
                            
     } 
 }

?>

</div>
</body>
</html>