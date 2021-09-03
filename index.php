<?php include './header.php';
include 'connection.php';
//session_start();
if (isset($_GET['pageno'])) 
   {
      $pageno = $_GET['pageno'];
   } 
else 
   {
      $pageno = 1;
   }

   //Number of blogs to be shown on a single page. For Pagination.
   $no_of_records_per_page = 5;  
   $offset = ($pageno-1) * $no_of_records_per_page;
   $total_pages_sql = "SELECT COUNT(*) FROM blog"; //counting the number of blogs user have of his own
   $result = mysqli_query($conn,$total_pages_sql); //mapping it to db
   $total_rows = mysqli_fetch_array($result)[0];
   $total_pages = ceil($total_rows / $no_of_records_per_page);
   $sql =  "select * from blog ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
   $result = $conn->query($sql);
   if($result->num_rows > 0)
   {
      //$data = array();
      while ($row = mysqli_fetch_assoc($result))
         {
            $id = $row['id'];
            $heading = $row['Heading'];
            $content=$row['content'];
         //   $image = $row['image'];
         //   echo $image;
   
?>
         <div class="blogbox">
               <h2><?php echo strtoupper($heading);?></h2>
               <p><?php 
                  { $content = substr($content,0,150);
                     echo $content; 
                     // echo $i;
                  }
                  ?>
               </p>
               <p><a href="article.php?Heading=<?php echo $heading; ?>&id=<?php echo $id;?>">Read More</a></p>
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

          
  
  <?php include 'footer.php';?>
