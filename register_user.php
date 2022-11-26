<?php
session_start();
include_once '../Database/env.php';

if(isset($_POST['register'])){
    //*variable assigent
    $error=[];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $entyped=md5($password);
    $cpassword=$_POST['cpassword'];
    //*validation rules
    if(empty($fname)){
        $msg="Enter Your Fast Name";
        $error['fname']=$msg;
    }elseif(strlen($fname)>50){
        $error['fname']="Enter Valid Character!";

    }
    if(empty($lname)){
        $msg="Enter Your Last Name";
        $error['lname']=$msg;
    }elseif(strlen($lname)>50){
        $error['lname']="Enter Valid Character!";
    }

    if(empty($email)){
        $msg="Enter Your Email";
        $error['email']=$msg;
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error['email']="Enter Valid Email!";
    }

   if(empty($password)){
    $msg="Enter Your password";
    $error['password']=$msg;
   }elseif(strlen($password)<8){
    $error['password']="Enter Valid Password!";
   }
   if(empty($cpassword)){
    $msg="Confrim Your password";
    $error['cpassword']=$msg;
   }elseif($password !== $cpassword){
    $error['cpassword']="Confrim Password Didn't Match";
   }
   if(count($error)>0){
  $_SESSION['errors']=$error;
  $_SESSION['old_data']=$_POST;

    header("location: ../backend/register.php");
   }else{
    $query="INSERT INTO users( first_name, last_name, email, password) VALUES ('$fname','$lname','$email','$entyped')";
    $result=mysqli_query($con,$query);
    $_SESSION['success']="You Have Been Register Successfully!";
    header("location:../backend/login.php");
}
   }
   
 