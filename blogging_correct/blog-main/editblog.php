<?php 
    include "header.php";
    include "connection.php";
    //print_r($_GET['id']);
    //echo $_SESSION['fname'];
    //echo $_SESSION['id'];
    //echo $_SESSION['heading']; //not working
    $a = $_GET['id'];
    if (empty($_SESSION['id']))
    {
    header('index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        if (!empty($_POST['title'])) {
            $title = htmlspecialchars($_POST['title']);
        } else {
            $title = null;
        }

        if (!empty($_POST['content'])) {
            $content = htmlspecialchars($_POST['content']);
        } else {
            $content = null;
        }
        
        $errors = array();

        if ($title == null) {
            $errors['title'] = 'Title is Required.';
        }

        if ($content == null) {
            $errors['content'] = 'Content is Required.';
        }

        if (count($errors) > 0) 
        {
            foreach ($errors as $key => $value) 
            {
                echo '<div class="aler alert-danger">' . $value . '</div>';
            }
        }
        else
        {
            $sql = "UPDATE blog SET Heading='$title', content='$content' WHERE id=$a";
            if ($conn->query($sql) === TRUE) 
            {
                header('Location:blogslogin.php');
            }
            else 
            {
                $error = $conn->error;
                echo "Something Went Wrong";
            }
        }
    }
?>
<?php 
    //$ab = $_GET['id'];
    $sql = "SELECT * FROM blog WHERE id='" . $a . "' LIMIT 1";
   // $sql = "select * from blog where id='$a'";
        $result = mysqli_query($conn,$sql);
            if($result->num_rows > 0)
            {
                //$data = array();
                while ($row = mysqli_fetch_assoc($result))
                {
                //echo "hello";
                echo $a;
                $id = $row['id'];
                $title = $row['Heading'];
                $content = $row['content'];
                //echo $id;
                //print_r($result);
?>
        
<?php
         //print_r($content);

      }
   }


?>


 <div class="container d-flex align-items-center createblog">
<form action="" method="POST" style="width:55%">
<h3 class="form-caption">Edit Article</h3>
<hr>
  <div class="form-group">
    <label>Title/Heading</label>
    <input type="title" name ="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Content</label>
    <textarea type="content" name="content" rows="10" class="form-control" placeholder="Blog Content"><?php echo $content; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>