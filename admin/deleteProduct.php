<?PHP
// Delete Category
 if(isset($_GET['pro_id'])){
    $pro_id=$_GET['pro_id'];
    
        include '../include/config.php';

        $sql = "SELECT * FROM product WHERE pro_id = '$pro_id'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $picture = $row['pro_pic'];
        $path='../img/';
        $DeletePic = $path . $picture;
        
        $sql =  "DELETE FROM `product` WHERE `pro_id` = '$pro_id'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                unlink($DeletePic);
header("location: displayProduct.php");
            }  
    }
?>

