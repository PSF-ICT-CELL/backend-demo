<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="form-signin">
        <form action="index.php" method="post">
        <?php
            session_start();
            include_once("processlogin.php");

        ?>
        <h4>PSF Sign in Page</h4>
        <?php if(isset($_SESSION['loginok']) && !empty($_SESSION['loginok'])){
                echo $_SESSION['loginok']."<br>";
                unset($_SESSION['loginok']);
                }
            ?>
            <label for="">Email</label>
            <input type="email" name="email" id="input" placeholder="Email" required="required"
            value="<?php if(isset($_SESSION['emailok'])&&!empty($_SESSION['emailok'])){
                echo $_SESSION['emailok'];
                unset($_SESSION['emailok']);
            }
            ?>">
            <?php if(!empty(@$invalidemailerror)){
                echo $invalidemailerror."<br>";
            }
            ?>
            <label for="">Password</label>
            <input type="password" name="password" id="input" placeholder="Password" pattern=".{8,}" required="required" title="Must be 8 character long."> 
            <?php if(!empty(@$invalidpassworderror)){
                echo @$invalidpassworderror."<br>";
            }
            ?>
            <input type="submit" id="button" value="Login">
        </form>
    </div>
    <div>
        <p>To create an account <a href="reg.php"><button>Signup</button></a></p>
    </div>
</body>
</html>