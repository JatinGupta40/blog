<?php
include "header.php";
include "connection.php";
                    if(isset($_GET['search'])) 
                    {
                        $search = $_GET['search'];
                        $sql = "SELECT * FROM blog WHERE Heading LIKE '%$search%'";// OR content LIKE '%$search%' ORDER BY updated_at DESC";
                        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        $row = mysqli_num_rows($result);
                        //print_r($result);
                        //echo $search;
                        //echo $row;
                        //die();
                           if ($row) 
                            {
                              while ($row = $result->fetch_array()) 
                              {
                                $id = $row['id'];
                                $heading = $row['Heading'];
                                $content=$row['content'];
                                //echo $id;
                                
?>
                                <div class="container" style="margin-top:20px;">
                                    <div class="blogbox">
                                    <h3><?php echo $heading;?></h3>
                                    <p>
<?php 
                                    {
                                        $content = substr($content,0,150);
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
                                echo '<div class="alert alert-danger">Sorry, No Result Found!</div>';
                            } 
                    }
                   
                    
                  
?>