<?php
    // include navbar file
    include 'nav.php'; 
   
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '../include/config.php';
        
        $subCatName = $_POST['subCatName'];
        $cat_Id = $_POST['cat_Id'];

            $sql = "INSERT INTO `subcategory` (`subCat_name`,cat_id) 
            VALUES ('$subCatName','$cat_Id')";
                $result = mysqli_query($link, $sql);
	
                if ($result) {
                    header("location: displaySubCategory.php");
                }
    }
?>

<div class="alignItemCenter">

    <form action="addSubCategory.php" method="post">
        <h2 class="formHeading">ADD SUBCATEGORY</h2>
        <!-- ------- -->
        <div class="custom-select"  >
        <label class="formLabel">Category:</label>
  <select  name="cat_Id" required>
    
  <option value="">--Select--</option>
  
<?php
include '../include/config.php';
        $sql = "SELECT * FROM `category`";
        
                        $result = mysqli_query($link, $sql);
    
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['cat_id'] ?>"> <?php echo $row['cat_name'] ?></option>     
                            <?php
                             } 
                          }
                          ?>

</select>
</div>
        <!-- ---------- -->
        <label class="formLabel">SubCategory:</label>
        <input class="formInput" type="text" name="subCatName" id="" required>
        <br>
        <div class="formButton">
        <button type="submit" class="buttonCss">Add</button>
        </div>
    </form>
</div>
</body>
</html>