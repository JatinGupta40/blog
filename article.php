<?php 
include './header.php';
include ("connection.php");
//session_start();
// if(empty($_GET['id']))
// {
   $a = $_GET['id'];
   //echo $a;
// }
// // else{
//    echo$_GET['content'];
// }

?>

<!-- blogs content start -->
<div class="blog">
   <div class="container ">
      <div class="blogcontent">
         <?php //fetching heading and content using heading value           
            
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
                     //print_r($content);
                  }
               }
            }
//            echo $_GET['Heading']; 
         
         
         ?>
         <h3>Analytics</h3>
         <img class="blogimage img-fluid animated img-thumbnail"  src="images/analyticblog.jpeg" alt="Responsive image" >
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