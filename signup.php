<?php
   // session_start();
    include("connection.php");
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];  //$_POST email is getting the values from the login page and pushing it to the variable
        $pass = $_POST['password'];

        echo $email, $pass;  //values that are coming from the user at login page
        
        $query = "select * from user where emailid = '$email'and password = '$pass'";
        $res = mysqli_query($conn,$query) or die(mysqli_error($conn));

        $result = mysqli_num_rows($res);
        if($result == 1)
        {
            while($rows = mysqli_fetch_assoc($res))
            {
                $email = $rows['emailid']; //emailid is coming from db and we are pushing it into variable email
                $name = $rows['fname'];
                echo "$name";
                echo $email;
            }
            $_SESSION['name']= $name;
            $_SESSION['email']=$email;
        
            header("location:admin.php");
        }
        else
        {
        echo '<script>alert("invalid email or password") </script>';
        header("refresh:0,url=login.php");
        }
    }
?>

