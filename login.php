<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Include Database Connection config file.
	include './include/config.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $role = $_POST["role"]; 
    $sql = "SELECT * FROM user WHERE `email` = '$email' AND `role` ='$role' AND `password` = '$password'";
    
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    
    if ($num == 1){
        $userId = $row['user_id'];
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $userId;
        if($role=='user'){
        header("location: index.php");
        }elseif($role=='admin'){
            header("location: ./admin/home.php");
        }
    } 
    else{
        echo'<script>
            alert("Invalid Credentials");
        </script>';
    }
}   

    // include navbar file
    include 'nav.php'; 
?>

    <div class="alignItemCenter">
    <form action="Login.php" method="post">
    <h3 class="formHeading">Login</h3>
        <label class="formLabel">Email:</label>
        <input class="formInput" type="email" name="email" id="" required>
        <br>
        <label class="formLabel">Password:</label>
        <input class="formInput" type="password" name="password" id="" required>
        <br>
        <div class="select">
        <label class="formLabel">Role:</label>

        <select name="role" required>
        <option value="">--none--</option>
  <option value="user">user</option>>
  <option value="admin">admin</option>>
</select>

        </div>
        <br>
        <div class="formButton">
        <button type="reset" class="buttonCss">Reset</button>
        <button type="login" class="buttonCss">Login</button>
        </div>
    </form>
</div>
</body>
</html>