<?php include './header.php';
include 'connection.php';
//session_start();
if (isset($_GET['pageno'])) {
   $pageno = $_GET['pageno'];
} 
else 
{
   $pageno = 1;
}
$no_of_records_per_page = 5;  //Number of blogs to be shpwn on a single page
$offset = ($pageno-1) * $no_of_records_per_page;
//echo $offset;
$total_pages_sql = "SELECT COUNT(*) FROM blog"; //counting the number of blogs user have of his own
$result = mysqli_query($conn,$total_pages_sql); //mapping it to db
$total_rows = mysqli_fetch_array($result)[0];
//echo $total_rows;
$total_pages = ceil($total_rows / $no_of_records_per_page);
//$result = $conn->query($sql);
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
            //echo $id;

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
               <p><a href="article.php?Heading=<?php echo $heading; ?>&id=<?php echo $id;?>">Read More</a></p>
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
<div class="paging">
<ul>
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">< Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next ></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
</div>

          
  
  <?php include 'footer.php';?>
