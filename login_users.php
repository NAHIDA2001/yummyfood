<?php
include_once '../Database/env.php';
session_start();
if(isset($_POST['submit'])){
    //* validation assign
    $email=$_POST['email'];
    $password=$_POST['password'];
    $entyped=md5($password);
    $errors=[];

    //* validation rules
    if(empty($email)){
        $errors['email']="Enter Your Email!";

    } 
     if(empty($password)){
        $errors['password']="Enter Your Password!";

    }
    if(count($errors)>0){
        $_SESSION['errors']=$errors;
     //  header("location:../backend/login.php");
    }else{
        //*No Errors Found

        //*Email Check
      
        $query="SELECT * FROM users WHERE email = '$email'";
        $data=mysqli_query($con,$query);

        if(mysqli_num_rows($data) > 0){
            $query="SELECT * FROM users WHERE email = '$email' AND password ='$entyped'";
            $data=mysqli_query($con,$query);
            if(mysqli_num_rows($data) > 0){
                $auth=mysqli_fetch_assoc($data);
                $_SESSION['auth']=$auth;
                var_dump($auth);
                header("location:../backend/Dashbroad.php");
         
            }else{
                $_SESSION['errors']['password']="Password Not Matching!";
                //header("location:../backend/login.php");
            }
            
    }else{
    
        $_SESSION['errors']['email']="No Email Found!";
        header("location:../backend/login.php");
    }

    }
}