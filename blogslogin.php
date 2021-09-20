<?php
include_once 'header.php';
include ("connection.php");
//session_start();
    
    
    if ($_SESSION['success'] == 1) //successfully registered message for new registered user only
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully Registered!</strong></div>';
        echo $_SESSION['success'];
        echo $_SESSION['fname'];
        echo $_SESSION['lname'];
        echo $_SESSION['email'];

    }
    else
    {

    }

    if($_SERVER["REQUEST_METHOD"] == "POST") //for edit  
    {
             include("connection.php"); 
    }
  

?>
    <div class="addblog">
        <h2><a href="createblog.php">Add Blog</a></h2>
        <h2><a href="personalisedcarousel.php">Personalise Carousel</a></h2>
    </div>
    <hr>
    <div class="myblog">
        <h2><u>My Blogs</u> <i class="fas fa-caret-down"></i></h2>
    </div>
<?php
    if ($_SESSION['email'] == "admin@gmail.com")
    {
        $sql = "select * from blog ORDER BY id DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)      
        {
            //$data = array();
            while ($row = mysqli_fetch_assoc($result))
            {
            // $id = $row['id'];
            $heading = $row['Heading'];
            $content = $row['content'];
?>
            <div class="blogbox">
                    <h3><?php echo $heading; ?></h3>
                    <p>
<?php
                    {
                        $content = substr($content, 0, 150); //trimming down the content to 150 words only
                        echo $content;
                        // echo $i;
                    }
?>
                    </p>
            </div>
<?php
            }
        }
        else
        {
?>
            <div class="">
                <h5>You have not added any Blog yet.</h5>
                <p>(To create click on the Add Blog button above.)</p>
            </div>
<?php        
        }
    }
    else
    {
        $email = $_SESSION['email'];
        $sql1 = "select * from user where emailid = '$email'"; //for accessing the id of the logged in user to be used as reference for getting Heading and content data to be fetched from the blog table
        $result1 = $conn->query($sql1);
        //echo $email;
        // print_r($result1); 
        //die();
        if ($result1->num_rows > 0)      
        {
            //$data = array();
            while ($row1 = mysqli_fetch_assoc($result1))
            {
                $id = $row1['id']; //id fetching from db table OF user
                $_SESSION['fname'] = $row1['fname'];
                $_SESSION['id'] = $row1['id'];

            }
        }
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } 
        else 
        {
            $pageno = 1;

        }

        // Number of blogs to be shown on a single page.
        $no_of_records_per_page = 5;  
        $offset = ($pageno-1) * $no_of_records_per_page;
        // echo $offset;

        // Fetching data from db table blog.
        $sql = "select id, Heading, content FROM blog where userid=$id ORDER BY id DESC LIMIT $offset, $no_of_records_per_page"; 
        $total_pages_sql = "SELECT COUNT(*) FROM blog where userid=$id"; // counting the number of blogs user have of his own.
        $result = mysqli_query($conn,$total_pages_sql); //mapping it to db.
        $total_rows = mysqli_fetch_array($result)[0];
        //echo $total_rows;
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        $result = $conn->query($sql);
        //echo $total_pages; //total number of pages to be made with respect to 5 blogs per page.
        if ($result->num_rows > 0)      
        {
            while ($row = mysqli_fetch_assoc($result))
            {
            //  echo implode(" ",$row);// $id = $row['id']; //string conversion.
            $heading = $row['Heading'];
            $content = $row['content'];
            $_SESSION['heading'] = $row['Heading'];
            $id = $row['id'];

?>
            <div class="" style="margin-top:20px;">
                <div class="blogbox">
                    <h3><?php echo $heading; ?></h3>
                    <p>
                    <?php
                        {
                            //$content = substr($content, 0, 150);
                            echo $content;
                            // echo $i;
                        }
                    ?>
                    <div class="editdelete">
                        <div class="editdeletebutton">
                            <a href="editblog.php?id=<?php echo $id;?>">
                            <button type="submit"  class="" name="submit"> Edit </button></a>
                        </div>
                        <div class="editdeletebutton">
                            <a href="deleteblog.php"><button type="submit" class="" name="submit"> Delete </button></a>
                        </div>
                    </div>
                    </p>
                </div>
            </div>
<?php
            }
        }
        else
        {
?>
        <div class="">
            <h5>You have not added any Blog yet.</h5>
            <p>(To create click on the '<u>Add Blog</u>' button above.)</p>
        </div>
<?php
        }
    }

    
?>
<div class="paging">
<ul>
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</div>

<?php include 'footer.php'; ?>
