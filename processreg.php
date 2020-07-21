<?php
//Process Registration page
@session_start();

$errorcount = 0;
@$firstname = $_POST['firstname'] != "" ? $_POST['firstname'] : $errorcount++;
@$lastname = $_POST['lastname'] != "" ? $_POST['lastname'] : $errorcount++;
@$email = $_POST['email'] != "" ? $_POST['email'] : $errorcount++;
@$password = $_POST['password'] != "" ? $_POST['password'] : $errorcount++;
@$gender = $_POST['gender'] != "" ? $_POST['gender'] : $errorcount++;
@$department = $_POST['department'] != "" ? $_POST['department'] : $errorcount++;
@$dateofbirth = $_POST['dateofbirth'] != "" ? $_POST['dateofbirth'] : $errorcount++;

if($errorcount == 0){
$_SESSION['firstname']=ucfirst(str_replace('  ','',$firstname));
$_SESSION['lastname']=ucfirst(str_replace('  ','',$lastname));
$_SESSION['email']=$email;
$_SESSION['department']=$department;
$_SESSION['dateofbirth']= $dateofbirth;
$_SESSION['gender']= $gender;

  //remove of whitespace and check numeric input
  if (!empty($firstname)&&!empty($email)&&!empty($lastname)&&!empty($department)&&!empty($password)&&!empty($dateofbirth)&&!empty($gender)){
    
    if(strlen($firstname)>=2 && strlen($lastname)>=2){
      
      if (ctype_alpha($firstname) && ctype_alpha($lastname) ){
        
        if (preg_match("/[@]/",$email)){
 
          if(strlen($email)<5){
            $emaillenerror= " invalid less than five character";
          }else{
      //Checking database
      $allUsers= scandir("db");
      $countallUsers= count($allUsers);
      $nextUserid=($countallUsers-2);
     $userobject=[
      'id'=> $nextUserid,
      'firstname'=>$firstname,
      'lastname'=>$lastname,
      'gender'=>$gender,
      'email'=>$email,
      'password'=> password_hash($password, PASSWORD_DEFAULT),
      'department'=>$department,
      'dateofbirth'=>$dateofbirth,
      'Reg_date_time'=> date('D M Y / H:i',time()),
     ];
     $_SESSION['userobject']= $userobject;
              
     
              //check if user already exist
              for($counter=0; $counter < $countallUsers; $counter++){
                $currentUsers= $allUsers[$counter];
            
                if($currentUsers == "User".$email.".json"){
                  $_SESSION['message1']="Email already exist! can't be use try another email";
                  header("Location: reg.php");
                  die();
                }
              }
              //generate token code
              $token="";
              $code=['a','A','b','B','c','C','d','D','e','E','f','F','g','G',
              'h','H','i','I','j','J','k','K','l','L','m','M','n','N'];

              for($i = 0; $i < 5; $i++){
                $index = mt_rand(0,count($code)-1);
               $tokencode = $token .= $code[$index];
               $_SESSION['tokencode']= $tokencode;
              }
               //Registration mail comfirmation
                $to = $email;
                $subject = 'PSF Registration Comfirmation';
                $message = "Your registration comfirmation mail for PSF $department department" ."\n"."This is Your comfirmation registration token\n<a href='tokenreg.php'>$tokencode</a>";
                $headers = "From: PSF Registraion Token";

                if(mail($to, $subject, $message, $headers)){ 
                  $_SESSION['emailok']="<span style='color: green'>Enter the comfirmation token sent to your email </span>";
                  $_SESSION['userobject']= $userobject;
                 
                  //save token code
                  $usertoken=[
                    'token'=> $tokencode,
                  ];

                  file_put_contents("tokenDB/token".$_SESSION['email']. ".json",json_encode($usertoken));
                  header("Location: tokenreg.php");
                  die();
                }else{
                  $_SESSION['regfail']= "<span style= 'color:red'> Your registration confirmation mail fail to send! check your mail settings.<br>
                  Enter your activation code</span> $tokencode";
                  header("Location: tokenreg.php");
                  die();
                }
                      
            }
        }else{
          $emailerror= "$email not correct";
         }
     }else{
      $alphanumerror= "Enter only alphabet input";
     }
    }else{
      $nameerror= "Name enter less than 2";  
    }
  }else{
        echo "fill in all fields in the form";
      }
    }
    ?>