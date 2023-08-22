<?PHP
// Delete Category
 if(isset($_GET['cat_id'])){
    $cat_id=$_GET['cat_id'];
    
        include '../include/config.php';
        $sql =  "DELETE FROM `category` WHERE `cat_id` = '$cat_id'";
            $result = mysqli_query($link, $sql);
            if ($result) {
             
header("location: displayCategory.php");
            }  
    }
?>