<?php
    session_start();
    include("connection.php");
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];  //$_POST email is getting the values from the login page and pushing it to the variable
        $pass = md5($_POST['password']);

       echo $email, $pass;  //values that are coming from the user at login page
        
        $query = "select * from user where emailid = '$email'and password = '$pass'"; //emailid and password are the db name and email and pass are the variabe name that we get above
        
        $res = mysqli_query($conn,$query) or die(mysqli_error($conn));

        $result = mysqli_num_rows($res);
        //echo $result;
        if($result == 1)
        {
            $rows = mysqli_fetch_assoc($res);
            // {
            if($email == 'admin@gmail.com' && $pass == '21232f297a57a5a743894a0e4a801fc3' )
            {
                $fname = $rows['fname'];
                $lname = $rows['lname'];
                $email = $rows['emailid']; //emailid is coming from db and we are pushing it into variable email
                $pass = $rows['password'];
                //echo $fname, $lname, $email , $pass ;
                //session_start();
                header("location:blogslogin.php");
            }
            else
            {    
                $fname = $rows['fname'];
                $lname = $rows['lname'];
                $email = $rows['emailid']; //emailid is coming from db and we are pushing it into variable email
                $pass = $rows['password'];
                //echo $fname, $lname, $email , $pass ;
                //session_start();
                $_SESSION['fname'] = $fname;
                header("location:blogslogin.php");
            }
        }
        else
        {
        echo '<script>alert("Invalid Credentials") </script>';
        header("refresh:0,url=login.php");
        }
    }
?>

