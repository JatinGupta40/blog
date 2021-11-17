<?php include 'header.php'; 
include("connection.php");


$result = $conn->query("SELECT image FROM carousel");



?>

<!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="/assets/main.css"> -->
  </head>
  <style>

  </style>

  <body>

<div id="demo" class="carousel slide" data-ride="carousel">

                 <!-- The slideshow -->

          <div class="carousel-inner">
              <?php
                $i = 0;
                foreach ($result as $row) {
                    $actives = '';
                    if ($i == 0) {
                        $actives = 'active';
                    }
                      $img = $row['image'];
                    // $img = $row['banner_path'];
                ?>

                  <div class="carousel-item <?= $actives; ?>">
                      <img src="<?= $img; ?>">
                  </div>
              <?php $i++;
                } ?>

          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
          </a>

      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>