<?php
   include('../connection.php'); 
   
   if(isset($_POST['submit']))
   {
       $title=$_POST['title']; //post title is coming from the UI and getting stored into title
       $content=$_POST['content'];

   
       echo $title," ",$content ; //printing all the values entered by the new user.
       $sql = "Select * from user where  = '$email'";  //checking the entered email id with the existing email id's

       $res = mysqli_query($conn,$sql); //mapping to the db
       
       $row = mysqli_num_rows($res);
      //echo $row;
   
        if($row >=  1)
                {
                    echo "<script> alert('Email is already register.Try using different Email Id ')</script>";
                    header("refresh:0,url=register.php");
                }
                 else
                    {
                     $result="INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')";
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
?>