<?php 
    session_start();
    if(!isset($_SESSION['login_email']) && empty($_SESSION['login_email'])){
        header("location: processlogout.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="content">
    <h3>PSF Home Page</h3>

    <p id="home">
        <h3> Username: &nbsp <?php echo @$_SESSION['lastname_login'] ."&nbsp" .@$_SESSION['firstname_login']?><br></h3> 
        <h3> Email: &nbsp <?php echo @$_SESSION['login_email'] ?><br></h3>
        <h3> Department: &nbsp <?php echo @$_SESSION['department'] ?><br></h3>
        <h3> Date of Birth: &nbsp <?php echo @$_SESSION['dateofbirth'] ?><br></h3>
        <a href="processlogout.php">Logout</a>
    </p>    
</body>
</html>