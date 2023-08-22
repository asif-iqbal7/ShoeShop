<?php
    // include navbar file
    include 'nav.php'; 
   
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '../include/config.php';
        
        $categoryName = $_POST['categoryName'];

        $sql = "Select * from category where cat_name='$categoryName'";
        $result = mysqli_query($link, $sql);
	    $num = mysqli_num_rows($result);
        if($num == 0) {
            $sql = "INSERT INTO `category` (`cat_name`) 
            VALUES ('$categoryName')";
                $result = mysqli_query($link, $sql);
	
                if ($result) {
                    header("location: displayCategory.php");
                }
                }else{
                    echo'<script>
                        alert("This category is Already Taken");
                    </script>';
                }
    }
?>

<div class="alignItemCenter">

    <form action="addCategory.php" method="post">
        <h2 class="formHeading">ADD CATEGORY</h2>
        
        <label class="formLabel">Category Name:</label>
        <input class="formInput" type="text" name="categoryName" id="" required>
        <br>
        <div class="formButton">
        <button type="submit" class="buttonCss">Add</button>
        </div>
    </form>
</div>
</body>
</html>