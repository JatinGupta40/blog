<?php

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/search.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');


$search = new searchQuery\search;
$method = new methodQuery\method;

  if(isset($_GET['search'])) 
  {
    $searchtext = $_GET['search'];
    $result = $search->search($searchtext);
    $row = $method->numrows($result);
    if($row) 
    {
      while ($row = $result->fetch_array()) 
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
            <p><a href="article?Heading=<?php echo $heading; ?>&id=<?php echo $id;?>">Read More</a></p>
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

<?php
  include 'footer.php';
?>

