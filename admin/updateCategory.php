<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
    // include navbar file
    include 'nav.php';
    include '../include/config.php'; 
    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $_SESSION['cat_id'] = $cat_id;
        
    }
    $categoryid = $_SESSION['cat_id'];

       $sql1 = "SELECT * FROM category WHERE cat_id = '$categoryid'";

                $result1 = mysqli_query($link, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
               
                $catIid= $row1['cat_id'];
                $catname= $row1['cat_name'];
                
        ?>
<div class="alignItemCenter">
    <form action="updateCategory.php" method="post">
        <h2 class="formHeading">UPDATE CATEGORY</h2>

        <label class="formLabel">Category:</label>
        <input class="formInput" type="text" name="CatName" id="" value ="<?php echo $catname;  ?>" required>
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
        
        $CatName = $_POST['CatName'];
        
            $sql2 = "UPDATE `category` SET `cat_name`='$CatName' WHERE `cat_id` = '$categoryid'";
                $result2 = mysqli_query($link, $sql2);
	
                if ($result2) {
                    unset($_SESSION['cat_id']);
                    header("location: displayCategory.php");
                }
                }
   
?>