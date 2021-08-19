<?php
    include 'header.php';
    include 'connection.php';
    
        
            // else
            // {
            // if(!empty($_POST['pwd'])) //validation
            // {
            //     $pwd = htmlspecialchars($_POST['pwd']);
            // }
            // else
            // {
            //     $pwd = null;
            // }
            // if(!empty($_POST['repwd']))
            // {
            //     $repwd = htmlspecialchars($_POST['repwd']);
            // }
            // else
            // {
            //     $repwd = null;
            // }
            // if(empty($_POST['pwd']) && empty($_POST['repwd']) )
            // {
            //     $bothempty = true;
            // }   
            // else
            // {
            //     $bothempty = false;
            // }
            // if($_POST['pwd'] != $_POST['repwd'])
            // {
            //     $notequal = true;
            // }
            // else
            // {
            //     $notequal = false;
            // }

            // $errors = array();

            // if($pwd == null)
            // {
            //     $errors['pwd'] = "Password Required";
            // }
            // if($repwd == null)
            // {
            //     $errors['repwd'] = "Confirm Password Required";
            // }
            // if($bothempty == true)
            // {
            //     $errors['bothemptypwd'] = "Fields cannot be empty";
            // }
            // if($notequal == true)
            // {
            //     $errors['noteqal'] = "Confirmed Password did not match";
            // } //validation ends
        //}
        

       // 
        
       if(isset($_POST['submit']))
        {
            if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
                {
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
    
    <?php

    if($_GET['key'] && $_GET['code'])
    {
        $email = $_GET['key'];
        $code = $_GET['code'];
        $sql = "SELECT * FROM `user` WHERE `reset_link_token`='".$code."' and `emailid`='".$email."'";
        //echo $email;
        //echo $code;
        $query = mysqli_query($conn,$sql);
        $curDate = date("d-m-Y H:i:s");
        //print_r($query);
        //echo $sql;
        if (mysqli_num_rows($query) > 0) 
            {   
                $row= mysqli_fetch_array($query);
                if($row['exp_date'] > $curDate)
                    {
?>
                    <div>
                        <form action="updatepwd.php" class="form container forgotpwd" method="POST";>
                            <div>
                                <label>New Password :</label>
                                <input class="<?php if(isset($errors['pwd'])) : ?>input-error<?php endif; ?>" type="password" name="pwd" placeholder="*****"></input>
                            </div>
                            <div>
                                <label>Confirm Password :</label>
                                <input class="<?php if(isset($errors['repwd'])) : ?>input-error<?php endif; ?>" type="password" name="repwd" placeholder="*****"></input>
                            </div>
                            <div>
                                <button type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
<?php
                    }
            }
            else
            {
                echo '<div class="warning">Sorry, Your Reset Password link has expired.</div>';  
            }
    }
     
?>

<?php include 'footer.php';?>