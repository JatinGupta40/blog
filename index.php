<?php include './header.php';

include_once 'classes/blog.php';
include_once 'classes/carousel.php';
include_once 'classes/user.php';
include_once 'classes/method.php';
$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;

$result1 = $carousel->carousel("SELECT * FROM carousel");
?>

<!-- Carousel Start -->

      <div class="demo carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target=".demo" data-slide-to="0" class="active"></li>
          <li data-target=".demo" data-slide-to="1"></li>
          <li data-target=".demo" data-slide-to="2"></li>
        </ul> 

        <!-- The slideshow -->
        <div class="carousel-inner">
        <?php
          $i = 0;
          foreach ($result1 as $row) 
          {
            $actives = '';
            if ($i == 0) 
            {
              $actives = 'active';
            }
              $img = $row['image'];
              $title = $row['title'];
              $imageby = $row['imageby'];
        ?>
            <div class="carousel-item <?= $actives; ?>">
              <img src="<?= $img; ?>">
              <h1><?= $title; ?></h1>
              <h3><?= $imageby; ?></h3>
            </div>
            <?php 
              $i++;
          } 
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href=".demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href=".demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
<!-- Carousel ends -->

<?php

    if (isset($_GET['pageno'])) 
    {
      $pageno = $_GET['pageno'];
     } 
    else 
    {
      $pageno = 1;
    }

  // Number of blogs to be shown on a single page. For Pagination.
  $no_of_records_per_page = 5;  
  $offset = ($pageno-1) * $no_of_records_per_page;

  // Counting the number of blogs user have of his own
  $result = $blog->countAllBlog(); 
  $total_rows = $method->fetchArray($result)[0];

  // CEIL is used to roundoff.
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $result = $blog->fetchBlogPaging($offset, $no_of_records_per_page);
  
  if($result->num_rows > 0)
  {
    while ($row = $method->fetchAssoc($result))
    {
      $id = $row['id'];
      $heading = $row['Heading'];
      $content=$row['content'];
?>
      <div class="blogbox">
        <h2><?php echo strtoupper($heading);?></h2>
        <p>
        <?php 
        { 
          // Showing only 150  words from content of blog.
          $content = substr($content,0,150);
          echo $content; 
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
  <?php include 'footer.php';?>