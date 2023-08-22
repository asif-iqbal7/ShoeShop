<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
    // include navbar file
    include 'nav.php';
    include '../include/config.php'; 
    if(isset($_GET['pro_id'])){
        $pro_id1 = $_GET['pro_id'];
        $_SESSION['pro_id'] = $pro_id1;
        
    }
    $pro_id = $_SESSION['pro_id'];
    
       $sql1 = "SELECT p.pro_id, p.pro_name, p.pro_pic, p.pro_size, p.pro_price, p.status,  s.subCat_name
       FROM product p
       LEFT JOIN subcategory s ON p.subCat_id = s.subCat_id WHERE pro_id = '$pro_id'";

                $result1 = mysqli_query($link, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
               
                $pro_name= $row1['pro_name'];
                $subCat_name= $row1['subCat_name'];
                $pro_pic= $row1['pro_pic'];
                $pro_size= $row1['pro_size'];
                $pro_price= $row1['pro_price'];
                $statuss= $row1['status'];

                $path='../img/';
$DeletePic = $path . $pro_pic;
                
        ?>
<div class="alignItemCenter">
    <form action="updateProduct.php" method="post" enctype="multipart/form-data">
        <h2 class="formHeading">UPDATE PRODUCT</h2>
                    <!-- ------- -->
            <div>
                <label class="formLabel">SubCategory:</label>
                <select  name="subCat_id" required>
                    <?php
                $sql4 = "SELECT * FROM `subcategory` WHERE `subCat_name` = '$subCat_name' ";
    $result4 = mysqli_query($link, $sql4);
    $row4=mysqli_num_rows($result4);
    $subCat_id = $row4['subCat_id'];
    
        ?>
        while($row = mysqli_fetch_assoc($result3)){
                <option value="<?php echo $subCat_id; ?>"><?php echo $subCat_name; ?></option>
              
            <?php
            
$sql3 = "SELECT * FROM `subcategory`";
    $result3 = mysqli_query($link, $sql3);
    if(mysqli_num_rows($result3) > 0){
        while($row3 = mysqli_fetch_assoc($result3)){
?>
    <option value="<?php echo $row3['subCat_id'] ?>"> <?php echo $row3['subCat_name'] ?></option>     
    <?php
     } 
    }
?>
    </select>
        </div>
         <!-- ---------- -->
        <label class="formLabel">Product:</label>
        <input class="formInput" type="text" name="proName" id="" value ="<?php echo $pro_name;  ?>" required>
        <br>
        <label class="formLabel">picture:</label>
        <input class="formInput" type="file" name="propic" id="" value ="" required>
        <br>
        <label class="formLabel">Size:</label>
        <input class="formInput" type="text" name="proSize" id="" value ="<?php echo $pro_size;  ?>" required>
        <br>
        <label class="formLabel">price:</label>
        <input class="formInput" type="text" name="proPrice" id="" value ="<?php echo $pro_price;  ?>" required>
        <br>
        <div class="select">
        <label class="formLabel">Status:</label>

        <select name="status" required>
        <option value=""><?php echo $statuss;  ?></option>
  <option value="available">available</option>
  <option value="upcoming">upcoming</option>
</select>

        </div>
        <div class="formButton">
        <button type="submit" class="buttonCss">Update</button>
        </div>
        </form>
        </div>
        </body>
        </html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $proName = $_POST['proName'];
        $subCat_id = $_POST['subCat_id'];
        $pro_size = $_POST['proSize'];
        $pro_price = $_POST['proPrice'];
        $status = $_POST['status'];
        
        if(isset($_FILES['propic']))
{

unlink($DeletePic);
    $file_name = $_FILES['propic']['name'];
    $file_temp = $_FILES['propic']['tmp_name'];
    
    move_uploaded_file( $file_temp,"../img/".$file_name);
}
            $sql2 = "UPDATE `product` SET `pro_name`='$proName', `pro_pic` = '$file_name' ,`pro_size`='$pro_size',`pro_price`='$pro_price',`status`='$status',`subCat_id`='$subCat_id' WHERE `pro_id` = '$pro_id'";
                $result2 = mysqli_query($link, $sql2);
	
                if ($result2) {
                    header("location: displayProduct.php");
                }
                }
   
?>