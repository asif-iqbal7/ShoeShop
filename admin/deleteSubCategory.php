<?PHP
// Delete Category
 if(isset($_GET['subCat_id'])){
    $subCat_id=$_GET['subCat_id'];
    
        include '../include/config.php';
        $sql =  "DELETE FROM `subcategory` WHERE `subCat_id` = '$subCat_id'";
            $result = mysqli_query($link, $sql);
            if ($result) {
             
header("location: displaySubCategory.php");
            }  
    }
?>