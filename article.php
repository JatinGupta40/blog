<?php 
include './header.php';
include ("connection.php");

   // Getting id of blog
   $a = $_GET['id']; 

?>

<!-- blogs content start -->
<div class="blogbox">
         <?php //fetching heading and content using heading value     
         
         // Fetching the id and image from carousel
            // $sql1 = "select * from carousel";
            // $result1 = mysqli_query($conn,$sql1);
            
            // if($result1->num_rows > 0)
            //    {
            //       //print_r($result1);
            //       while ($row1 = mysqli_fetch_assoc($result1))
            //       {
            //          $userid = $row1['userid'];
            //          $image = $row1['image'];
            //          //print_r($userid);
            //          //print_r($image);
            //       }
            //    }
            
            // echo $a;
            $sql = "select * from blog where id='$a'";
            $result = mysqli_query($conn,$sql);
            {
               if($result->num_rows > 0)
               {
                  //$data = array();
                  while ($row = mysqli_fetch_assoc($result))
                  {
                     //echo "hello";
                     $id = $row['id'];
                     $title = $row['Heading'];
                     $content = $row['content'];
                     $logo = $row['image'];
                     //print_r($content);
                  }
               }
            }
//            echo $_GET['Heading']; 
         // below - <img class="blogimage img-fluid animated img-thumbnail"  src="images/analyticblog.jpeg" alt="Responsive image" >
         
         
         ?>
         <h2>Analytics</h2 >
         <img class="blogimage"  src="images/<?php echo $logo; ?>" alt="image" >
         <p><?php echo $content;?></p>
      </div>
      <!-- blogs content END -->
      <div class="blogcommentsection">
         <form action="">
            <p><b><i>Please provide Your valuable Comments - </i></b></p>
            <textarea class="blogcommentbox" id="comments" name=""></textarea>
            <br>
            <button type="button" class="btn btn-primary"  onclick="thankyou()" value="Submit">SUBMIT</button>
            <i>
               <p id="ty"></p>
            </i>
         </form>
      </div>
   </div>
</div>
<main id="main"></main>
<!-- End #main -->
<div style="margin-top:50px;"></div>
<script>
   function thankyou()
   {
       document.getElementById("ty").innerHTML = "Thank You for your Valuable comment";
   }
   
   var x = window.location.href;
   document.getElementById("demo").innerHTML = "The full URL of this page is:<br>" + x;
   document.write(x)
</script>      

<?php include 'footer.php';?>