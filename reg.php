<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psf Signup</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <main>
        
    <section class="form";>
                    <form action="reg.php" method="post">
                    <h4>PSF Signup Page</h4>
                    <?php   session_start();
                    include('processreg.php');
                    session_destroy();
                    ?>
                    <?php if(!empty($_SESSION['message1'])){echo"<span style= 'color:red'>". $message= $_SESSION['message1']."</span>";}
                    //if (!empty($_SESSION['regfail'])){ echo $_SESSION['regfail'];}
                     echo "<br>";
                    ?>
                    <label for=""> Firstname</label>

                    <input type="text" name="firstname" id="input" class="form-control" <?php  if(isset($_SESSION['firstname']) && !empty($_SESSION['firstname'])){
                    echo "value=".$_SESSION['firstname'];};?>  placeholder="Firstname" 
                    required pattern="[A-Z\sa-z]+" title="Only alphabets and space allowed.">
                    <?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?>   
                    
                    <label for=""> Lastname</label>
                    <input type="text" name="lastname" id="input" class="form-control" <?php  if(isset($_SESSION['lastname']) && !empty($_SESSION['lastname'])){
                    echo "value=".$_SESSION['lastname'];};?>  placeholder="Lastname" 
                    required pattern="[A-Z\sa-z]+" title="Only alphabets and space allowed.">
                    <?php echo "<span style= 'color:red'>".@$nameerror,@$alphanumerror."</span>";?>   
                    
                    <label for=""> Email</label>
                    <input type="email" name="email" id="input" class="form-control" <?php  if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
                    echo "value=".$_SESSION['email'];};?> required placeholder="Email" >
                    <?php echo "<span style= 'color:red'>".@$emailerror,@$emaillenerror."</span>";?>
                    
                    <label for=""> Pasword</label>
                    <input type="password" name="password" id="input" class="form-control" value=""  placeholder="Password" 
                    pattern=".{8,}"required title="Password must be 8 charactes long.">
                    
                    <label for="">Gender</label>
                    <select required name="gender" id="">
                    <option value="M">Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    </select>
                    
                    <label for="">Department Cell</label>
                    <select required name="department" id="">
                    <option value="">Select Cell</option>
                    <option value="backend">Backend</option>
                    <option value="Frontend">Frontend</option>
                    <option value="Graphics">Graphics Designer</option>
                    </select>
                    
                    <label for="">Date Of Birth</label>
                    <input required type="date" name="dateofbirth" id="date" class="form-control" value=""  placeholder="Date of birth" >
                    <button type="submit">Sign Up</button>
                    <h4>Already have an account <a href="index.php">Login</h4>
                </form>
        </section>
</main>  
</body>
</html>