<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
    // include navbar file
    include 'nav.php';
    include '../include/config.php'; 
    if(isset($_GET['subCat_id'])){
        $subCat_id = $_GET['subCat_id'];
        $_SESSION['subCat_id'] = $subCat_id;
        
    }
    $subcategoryid = $_SESSION['subCat_id'];

       $sql1 = "SELECT * FROM subcategory LEFT JOIN category ON subcategory.cat_id = category.cat_id WHERE subCat_id = '$subcategoryid'";

                $result1 = mysqli_query($link, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
               
                $subCat_name= $row1['subCat_name'];
                $cat_id= $row1['cat_id'];
                $cat_name= $row1['cat_name'];
                
        ?>
<div class="alignItemCenter">
    <form action="updateSubCategory.php" method="post">
        <h2 class="formHeading">UPDATE SUBCATEGORY</h2>
                    <!-- ------- -->
            <div>
                <label class="formLabel">Category:</label>
                <select  name="cat_id" required>
                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
              
            <?php
            
$sql3 = "SELECT * FROM `category`";
    $result3 = mysqli_query($link, $sql3);
    if(mysqli_num_rows($result3) > 0){
        while($row = mysqli_fetch_assoc($result3)){
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
        <input class="formInput" type="text" name="subCatName" id="" value ="<?php echo $subCat_name;  ?>" required>
        <br>
        <div class="formButton">
        <button type="submit" class="buttonCss">Add</button>
        </div>
        </form>
        </div>
        </body>
        </html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $subCatName = $_POST['subCatName'];
        $categoryid = $_POST['cat_id'];

            $sql2 = "UPDATE `subcategory` SET `subCat_name`='$subCatName',`cat_id`='$categoryid' WHERE `subCat_id` = '$subcategoryid'";
                $result2 = mysqli_query($link, $sql2);
	
                if ($result2) {
                    unset($_SESSION['subCat_id']);
                    header("location: displaySubCategory.php");
                }
                }
   
?>
        
