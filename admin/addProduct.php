<?php
    // include navbar file
    include 'nav.php'; 
   
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '../include/config.php';
        
        $ProductName = $_POST['ProductName'];
        $ProductSize = $_POST['ProductSize'];
        $subCat_id = $_POST['subCat_id'];
        $ProductPrice = $_POST['ProductPrice'];
        $status = $_POST['status'];
        
        if(isset($_FILES['ProductPicture']))
{

    $file_name = $_FILES['ProductPicture']['name'];
    $file_temp = $_FILES['ProductPicture']['tmp_name'];
    
    move_uploaded_file( $file_temp,"../img/".$file_name);
}

            $sql = "INSERT INTO `product` (`pro_name`,`pro_pic`,`pro_size`,`pro_price`,`status`,`subCat_id`) VALUES ('$ProductName','$file_name','$ProductSize','$ProductPrice','$status','$subCat_id')";
                $result = mysqli_query($link, $sql);
	
                if ($result) {
                    header("location: displayProduct.php");
                }
                }
    
?>

<div class="alignItemCenter">

    <form action="addProduct.php" method="post" enctype="multipart/form-data">
        <h2 class="formHeading">ADD Product</h2>
        <!-- --------- -->
        <label class="formLabel">SubCategory:</label>
  <select class="formInput" name="subCat_id" required>
    
  <option value="">--none--</option>
  
<?php
include '../include/config.php';
$sql = "SELECT * FROM `subcategory`";
                        $result = mysqli_query($link, $sql);
    
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['subCat_id'] ?>"> <?php echo $row['subCat_name'] ?></option>     
                            <?php
                             } 
                          }
                          ?>

</select>

<br>
        <!-- -------------- -->
        
        <label class="formLabel">Product Name:</label>
        <input class="formInput" type="text" name="ProductName" id="" required>
        <br>
        <label class="formLabel">Product Picture:</label>
        <input class="formInput" type="file" name="ProductPicture" id="" required>
        <br>
        <label class="formLabel">Product Size:</label>
        <input class="formInput" type="text" name="ProductSize" id="" required>
        <br>
        <label class="formLabel">Product Price:</label>
        <input class="formInput" type="text" name="ProductPrice" id="" required>
        <div class="select">
        <label class="formLabel">Status:</label>

        <select name="status" required>
        <option value="">--none--</option>
  <option value="available">available</option>
  <option value="upcoming">upcoming</option>
</select>

        </div>
        <br>
        <div class="formButton">
        <button type="submit" class="buttonCss">Add</button>
        </div>
    </form>
</div>
</body>
</html>