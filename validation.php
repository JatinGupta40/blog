<?php
   include("connection.php"); 
   
   if(isset($_POST['submit']))
   {
       $fname=$_POST['fname']; //post fname is coming from the UI and getting stored into fname
       $lname=$_POST['lname'];
       $email=$_POST['email'];
       $pass=mb5($_POST['password']); //password is from UI that getting stored in pass
       $repass=$_POST['repassword'];
   
       //Check if user is already registered
       echo $fname," ",$lname," ", $email," ", $pass, " " ,$repass ; //printing all the values entered by the new user.
       $sql = "Select * from user where emailid = '$email'";  //checking the entered email id with the existing email id's
       //echo $sql;
       $res = mysqli_query($conn,$sql); //mapping to the db
       
       $row = mysqli_num_rows($res);
      //echo $row;
   
    if($pass == $repass)
    {
            if($row >=  1)
                {
                    echo "<script> alert('Email is already register.Try using different Email Id ')</script>";
                    header("refresh:0,url=register.php");
                    }
                 else
                    {
                     $result="INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email',mb5('$pass'))";
                     $run=mysqli_query($conn,$result);
                     if($run)
                        {
                         echo "<script> alert('Registration Successfull!')</script>";
                         $login = mysqli_query($conn,`select * from user where emailid = '$email' `);       
                         header("refresh:0,url=blogs.php");
                        }
                     else
                        {
                         echo "<script> alert(' Registration failed ')</script>";
                        }
                    }
                }
         else
         {
            echo "<script> alert('Password does not match')</script>";
            header("refresh:0,url=register.php");
         }   
    }    
?>