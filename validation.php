<?php
   include("connection.php"); 
   
   if(isset($_POST['submit']))
   {
       $fname=$_POST['fname'];
       $lname=$_POST['lname'];
       $email=$_POST['email'];
       $pass=$_POST['password'];
       $repass=$_POST['repassword'];
   
       //Check if user is already registered
       echo $fname," ",$lname," ", $email," ", $pass, " " ,$repass ;
       $sql = "Select * from user where emailid = '$email'";
       //echo $sql;
       $res = mysqli_query($conn,$sql);
      // echo "\n $sql";
       $row = mysqli_num_rows($res);
       //echo $row;
   
    
      if($row >=  1){
          echo "<script> alert('Email is already register.. Register using different Email Id ')</script>";
          header("refresh:0,url=register.php");
       }
       else{
           $result="INSERT INTO `user`(`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')";
           $run=mysqli_query($conn,$result);
           if($run){
               echo "<script> alert('Registration Successfully !')</script>";
               header("refresh:0,url=login.php");
           }
           else{
               echo "<script> alert(' Registration failed ')</script>";
           }
       }
  }
   ?>