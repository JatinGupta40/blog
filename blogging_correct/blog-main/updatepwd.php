<?php 

include "connection.php";
$a = isset($_GET['pwd']);
echo $a;
echo "asd";
if(isset($_POST['submit']))
        {
            if(isset($_POST['pwd']) && isset($_POST['reset_link_token']) && $_POST['email'])
                {
                    echo $_POST['pwd'];
                echo "hello";
                $email = $_POST['email'];
                echo $email;
                $code = $_POST['reset_link_token'];
                echo $code;
                $password = md5($_POST['password']);
                echo $password;
                $query = mysqli_query($conn,"SELECT * FROM `user` WHERE `reset_link_token`='".$code."' and `emailid`='".$email."'");
                $row = mysqli_num_rows($query);
                    if($row)
                    {
                        mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE emailid='" . $emailId . "'");
                        echo '<p>Congratulations! Your password has been updated successfully.</p>';
                    }
                    else
                    {
                        echo "<p>Something goes wrong. Please try again</p>";
                    }
            }else
            {
                echo "bhar";
            }
        }
        ?>