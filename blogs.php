<?php include './header.php';
include 'connection.php';
$sql =  "select * from blog ORDER BY id DESC";
$result = $conn->query($sql);
  if($result->num_rows > 0)
   {
      //$data = array();
      while ($row = mysqli_fetch_assoc($result))
         {
            $id = $row['id'];
            $heading = $row['Heading'];
            $content=$row['content'];

?>
            <div class="container" style="margin-top:20px;">
            <div class="blogbox">
               <h3><?php echo $heading;?></h3>
               <p><?php 
                  { $content = substr($content,0,150);
                     echo $content; 
                     // echo $i;
                  }
                  ?>
               </p>
               <p><a href="article.php?id=<?php echo $heading; ?>">Read More</a></p>

            </div>
         </div>
<?php
         }
   }
   else
      {
         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>There are no posts added</strong> .</div>';
      }

?>


      <!-- blogs section start -->
      
      <!-- <main id="main">
      </main> -->
      <!-- End #main -->
<?php include './footer.php'; ?>
