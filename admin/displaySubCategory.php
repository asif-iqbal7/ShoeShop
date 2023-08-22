<?php
include 'nav.php';
    include '../include/config.php';
    $sql = "SELECT * FROM subcategory";
  ?>
  <div class="alignItemCenter">
 
    <?php
    
        $result = mysqli_query($link, $sql);
	    $num = mysqli_num_rows($result);
        
            echo '<div class="alignItemCenter">';
            
            if($num >= 1) {
                echo'<table style = "width: 40%;">
                <caption><h1>SubCetegory</h1></caption>
                <tr>
                    
                    <th>Name</th>
                    <th>Action</th>
                    
                </tr>';
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td> {$row['subCat_name']} </td>".
                    "<td> <a href='updateSubCategory.php?subCat_id={$row['subCat_id']}'><button style='margin-right:10px;' type='' >Update</button></a><a href='deleteSubCategory.php?subCat_id={$row['subCat_id']}'><button type='' >Delete</button></a> </td> ".
                    "
                    </tr>";
              }
               echo '</table>
            </div>';
        }else{
            echo '<div class="alignItemCenter">NO RECORD FOUND</div>';
        }
       
?>
</body>
</html>