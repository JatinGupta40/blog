<?php 
include './header.php';
include 'classes/method.php';
// Creating object of classes.
  $method = new method;
  $source = new sourceQuery\source;

  // Getting id of blog.
  $id = $_GET['id']; 
   
?>

<?php 

  // if($_POST['yes'])
  // {
  //   $sql = $source->delete($id);
  // }
  // elseif(isset($_POST['no']))
  // {

  // }


?>
  <!-- Form for deleting a blog; -->
  <div class="container deleteblog">
    <form action ="" method = "POST">
      <h3> Are you sure you want to delete this blog ? </h3>
      <div class="editdeletebutton">
        <button type="submit"  class="" value = "yes" name="submit"> Yes </button></a>
        <button type="submit"  class="" value = "no" name="submit"> No </button></a>
      </div>
    </form>
  </div>
  
  <!-- Blogs content start. -->
  <div class="blogbox">
  <?php 
    // Getting field DB table.     
    $result = $source->blogById($id);
    {
      if($result-> $method->numRows() > 0)
      {
        // Fetching details from blog table with respect to blog-id.
        while ($row = $method->fetchArray($result))
        {
          $id = $row['id'];
          $title = $row['Heading'];
          $content = $row['content'];
          $logo = $row['image'];
        }
      }
    }
  ?>
    <h2>Analytics</h2>
    <?php
    // Checking if there is any image uploaded for blog. If uploaded then only will be shown.
    if($logo == "")
    {

    }
    else
    {
    ?>
      <img class="blogimage" src="images/<?php echo $logo; ?>" alt="image" >
    <?php
    } 
    ?>
      <p><?php echo $content;?></p>
   </div>
   
  <!-- Blogs content END -->
   
<main id="main"></main>

<div style="margin-top:50px;"></div>

<?php include 'footer.php';?>