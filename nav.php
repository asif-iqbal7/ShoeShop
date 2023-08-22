<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./include/style.css">
</head>
<body>

    <div class="navbar">

        <div>
            <h2 class="navbarHeading">The Shoe Shop</h2>
        </div>
        <div class= "displayManu">
        <div class="manu">
    
    <a href="index.php"><button class="dropbtn">Home</button></a>
    
</div>

        <div class="manu">
    <div class="dropdown">
    <button class="dropbtn">Men</button>
    <div class="dropdown-content">
        <a href="menCasual.php">Casual</a>
        <a href="menFormal.php">Formal</a>
    </div>
</div>
</div>

<div class="manu">
    <div class="dropdown">
    <button class="dropbtn">Women</button>
    <div class="dropdown-content">
        <a href="womenCasual.php">Casual</a>
        <a href="womenParty.php">Party</a>
    </div>
</div>
</div>

<div class="manu">
    <div class="dropdown">
    <button class="dropbtn">Kids</button>
    <div class="dropdown-content">
        <a href="girls.php">Girls</a>
        <a href="boys.php">Boys</a>
    </div>
</div>
</div>

<div class="manu">
    
    <a href="upcoming.php"><button class="dropbtn">Upcom..</button></a>
    
</div>
<div class="manu">
    <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $cartCount = 0;
    if(isset($_SESSION['email'])){
        $userId = $_SESSION['user_id'];
    require_once './include/config.php';
    $sql = "SELECT COUNT(*) AS total_records FROM cart WHERE user_id = '$userId'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    
    if($num > 0) {
        $cartCount = $row["total_records"];
    }
    }
    ?>
    <a href="cart.php"><button class="dropbtn">Cart(<span style="color:yellow;"><b><?php echo $cartCount; ?></b></span>)</button></a>
    
</div>
<?php
if(isset($_SESSION['email'])){
    echo '<div class="manu">
    
    <a href="logout.php"><button class="dropbtn">Logout</button></a>
    
</div>';
}else{
    echo '<div class="manu">
    
    <a href="register.php"><button class="dropbtn">Register</button></a>
    
</div>


<div class="manu">
    
    <a href="login.php"><button class="dropbtn">Login</button></a>
    
</div>';
}
?>
    
</div>
</div>