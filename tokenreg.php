<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section class="form";>
                    <form action="tokenreg.php" method="post">
                    <h4>Token Registration</h4>
                    <?php  session_start();
                        
                    if(!empty($_SESSION['emailok'])){echo"<span style= 'color:red'>". $message= $_SESSION['emailok']."</span>";
                    } elseif (!empty($_SESSION['regfail'])){ 
                        echo $_SESSION['regfail'];
                    }elseif(empty($_SESSION['emailok']) || empty ($_SESSION['regfail'])){
                        session_destroy();
                        header("Location: reg.php");
                        die();
                    }   
                    @$errorcount = 0;
                    @$token = $_POST['token'] != "" ? $_POST['token'] : $errorcount++;
                    if($errorcount == 0){
                       $_SESSION['token']= str_replace('  ','',$token);
        
                        if($_SESSION['token'] === $_SESSION['tokencode']){

                        //save user data into database
                        file_put_contents("db/User".$_SESSION['email'] . ".json",json_encode($_SESSION['userobject']));
                        $_SESSION['loginok']="<span style='color:green'>Succesfully signup! you can now login</span>";
                        header("Location: index.php");
                        unset($_SESSION['emailok'],$_SESSION['regfail']);
                        die();
                        }else{
                            $error="<span style='color:red'>The token code you enter is wrong</span>";
                        } 
                    }
                    ?>
                    <br><label for=""> Token</label>
                    <input type="text" name="token" id="input" class="form-control" required placeholder="Token code">
                    <?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";
                    if(isset($error)){echo $error;}?>
                    <button type="submit">Sign Up</button>
                    </form>
</section>

</body>
</html>