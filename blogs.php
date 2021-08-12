<?php include './header.php';
include 'connection.php';

$sql =  "select * from blog ORDER BY id DESC";
$result = $conn->query($sql);


  if($result->num_rows > 0)
   {
      //$data = array();
      while ($row = $result->fetch_array())
         {
?>
            <div class="container" style="margin-top:20px;">
            <div class="blogbox">
               <h3><?php echo $row['fname']?></h3>
               <p>Analytics is the systematic computational analysis of data or statistics. It is used for the discovery, 
                  interpretation, and communication of meaningful patterns in....
               </p>
               <p><a href="./blog.analytics.php">Read More</a></p>
            </div>
         </div>
<?php
         }
   }
   else
      {
      echo "There are No post added ";
      }

?>


      <!-- blogs section start -->
      
      <!-- <main id="main">
      </main> -->
      <!-- End #main -->
<?php include './footer.php'; ?>
