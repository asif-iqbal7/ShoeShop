<?php	
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// Include Database Connection config file.
	include './include/config.php';
	
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	$cPassword = $_POST["cPassword"];
    
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $role = $_POST["role"];
	
	$sql = "Select * from user where email='$email'";
	$result = mysqli_query($link, $sql);
	$num = mysqli_num_rows($result);
	
	// check if the user name is already exist or not
	if($num == 0) {
		if($password == $cPassword) {

			$sql = "INSERT INTO `user` (`user_name`,
				`password`,`email`,`contact`,`role`) VALUES ('$userName',
				'$password','$email','$contact','$role')";

			$result = mysqli_query($link, $sql);
			if ($result) {
                echo'<script>
                    alert("Your are Registered Successfully!");
                </script>';
			}
		}
		else {
            echo'<script>
            alert("Passwords do not match");
            </script>';
		}	
	}
if($num>0)
{
    echo'<script>
            alert("This Username is not available");
        </script>';
}	
}	
    // include mainInterfaceNav file
    include 'nav.php'; 
?>
    <div class="alignItemCenter">
    <form action="register.php" method="post">
    <h2 class="formHeading">Sign Up</h2>
        <label class="formLabel">User Name:</label>
        <input class="formInput" type="text" name="userName" id="" required>
        <br>
        <label class="formLabel">Password:</label>
        <input class="formInput" type="password" name="password" id="" required>
        <br>
        <label class="formLabel">Confirm Password:</label>
        <input class="formInput" type="password" name="cPassword" id="" required>
        <br>
        <label class="formLabel">Email:</label>
        <input class="formInput" type="email" name="email" id="" required>
        <br>
        <label class="formLabel">Contact:</label>
        <input class="formInput" type="tel" name="contact" id="" required>
        <br>
        <label class="formLabel">Role:</label>
        <select class="formInput" name="role" required>
            <option value=""></option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <div class="formButton">
        <button type="reset" class="buttonCss">Reset</button>
        <button type="submit" class="buttonCss">Register</button>
        </div>
    </form>
</div>
</body>
</html>