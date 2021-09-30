<?php
  include "header.php";
  include 'classes/method.php';
      
  // Creating Object.
  $method = new method;
  $source = new sourceQuery\source;
                      
        if(isset($_GET['search'])) 
        {
          $search = $_GET['search'];
          $result = $source->search($search);
          $row = $method->numRows($result);
          if ($row) 
          {
            while ($row = $method->fetchArray($result)) 
            {
              $id = $row['id'];
              $heading = $row['Heading'];
              $content=$row['content'];
                                               
?>
              <div class="container" style="margin-top:20px;">
                <div class="blogbox">
                  <h3><?php echo $heading;?></h3>
                  <p>
<?php 
                  {
                    $content = substr($content,0,150);
                    echo $content; 
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
            echo '<div class="alert alert-danger">Sorry, No Result Found!</div>';
          } 
        }
?>