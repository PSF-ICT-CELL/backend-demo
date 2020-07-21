<?php
header("Content-Type:application/json");
       
if(isset($_POST['submit'])){
    $status = ['status' => 'successful'];
 
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dateofbirth = $_POST['dateofbirth'];
    $cell = $_POST['cell'];
    
 
    $data = ['firstname' => $firstname , 'lastname' => $lastname , 'gender' => $gender ,  'dateofbirth' => $dateofbirth , 'cell' => $cell ];
    
 /*   $data = json_decode($data, true);*/
    
if(is_array($data)){
    echo json_encode($status);
} 
  
}

       
if(isset($_POST['read'])){
    $status = ['status' => 'successful'];
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $dateofbirth = $_POST['dateofbirth'];
    $cell = $_POST['cell'];
    
 
    $data = ['firstname' => $firstname , 'lastname' => $lastname , 'gender' => $gender ,  'dateofbirth' => $dateofbirth , 'cell' => $cell ];
    
       /*$data = json_decode($data, true);*/
    
if(is_array($data)){
    echo json_encode($data);
} 
  
}

?>