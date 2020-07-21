<?php
    @session_start();

$errorcount= 0;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;

if($errorcount == 0){
$_SESSION['emailok']= $email;
//check eamil and character length

        if (!preg_match("/[@]/",$email)){
          $emailerror= " Email $email not correct";
        }
          if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
          }else{
            $allUsers= scandir("db");
            $countallUsers= count($allUsers);
        
           //check if user already exist
     for($counter=0; $counter < $countallUsers; $counter++){
       $currentUsers= $allUsers[$counter];
        $invalidemail= "yes";
       if($currentUsers == "User".$email.".json"){
           $invalidemail= "no";
           //check user password 
           @$userstring= file_get_contents("db/User".$email.".json");
            @$userObject= json_decode($userstring);
            $DBpassword= $userObject->password;
           $Userpassword= password_verify($password, $DBpassword);
           $invalidpassword= "yes";
           if($password == $Userpassword){
               $invalidpassword= "no";
            echo $_SESSION['loged_in']= $userObject->id;
            echo $_SESSION['firstname_login']= $userObject->firstname;
            echo $_SESSION['lastname_login']= $userObject->lastname;
            echo $_SESSION['login_email']= $userObject->email;
            echo $_SESSION['dateofbirth']= $userObject->dateofbirth;
            echo $_SESSION['department']= $userObject->department;
           
                           
            
            header('Location: dashboard.php');
            die();
           }elseif(@$invalidpassword == "yes"){
               $invalidpassword= 1;
             $invalidpassworderror= "<span style='color:red';>Invalid password create an account</span>";
            }

       }else{
            $passwordemail= 1;
             $invalidemailerror= "<span style='color:red';>Email not recognise create an account</span>";
       }
     }
            
          }
}
?>