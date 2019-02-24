
<html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
           

            <title>Technology blog</title>

            
           

            <!-- Bootstrap core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- // for blog ui-->
            
            <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> <!-- for pagination -->
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>

   
            <!-- pagination Script -->
            <script type="text/javascript" src="vendor/bootpag/jquery.bootpag.js"></script>
            <script type="text/javascript" src="vendor/bootpag/jquery.bootpag.min.js"></script>
            
          
            
   
            
            <!-- Custom styles for this template -->
            <link href="css/blog-post.css" rel="stylesheet">
            

        </head>

    <body>

        <!-- Navigation -->
        
                    
                    
       
<?php
include "header.php";
?>
                <!--  ================================
                
                DB connections and query....
                =====================================  -->
               
              <?php
                include "cn.php";

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM `posts` order by post_created desc";
                $sql2 = "SELECT a.`author_name`,b.`post_id` from `author` a,`posts` b where a.`author_id`=b.`author_id` order by b.`post_created` desc ";

                $post_det = $conn->query($sql);
                $author_det = $conn->query($sql2);

                if ($post_det->num_rows > 0) {
                } else {
                    echo " No results found";
                }

                ?>    
                <!--
                
                    =====================================================================
        
                    Page Content 
                    =====================================================================
                -->
     
                    <div class="container">

                        <div class="row">

                        <!-- Post Content Column -->
                        <div class="col-md-8">

                            <!--  post while  start -->
                            <div>
                            <p class="well demo content3">
                                            

                                
                                        <?php
                                            while ($row_post = $post_det->fetch_assoc()) {
                                            $row_author = $author_det->fetch_assoc();
                                            
                                            echo "<h1>  <br/>" . $row_post["post_title"] . "</h1>";


                                        ?>
                                                    <!-- Title -->
                    
                                        <!-- Author -->
                                        <p class="lead">
                                        by
                                        <a href="author.php"><?php
                                            echo $row_author["author_name"];
                                        ?></a>
                        
                                         </p>

                                        <hr>

                                        <!-- Date/Time -->
                                        <p>Posted on <?= $row_post["post_created"] ?> </p>

                                        <hr>

                                            <!-- Post Content -->
                                            <div class="card-footer">
                                                    <p><?= $row_post["content"] ?></p>
                                            </div>
                                            <hr>
                                            <?php

                                                }// while end 
                                            ?>    <!-- next iteration while -->
                                    
                                             </p>
                                             <p class="demo demo3"></p>
                                        </div>
                                       
                                    
                                        <!-- Pagination starts -->
                                      
                                        <script type="text/javascript">
                                            $('.demo3').bootpag({
                                        total: 50,
                                        page: 5,
                                        maxVisible: 10,
                                        href: "#pro-page-{{number}}",
                                        leaps: false,
                                        next: 'next',
                                        prev: null
                                        }).on('page', function(event, num){ $(".content3").html("<?php echo 'hi divya';?>"); });
                                        </script>
                                       
                                       <!-- Pagination End -->
<!--
$(".content3").html("  ");""
  
  $sql3 = "SELECT * FROM `posts` where postnum="+ num;
                                            $post_det1 = $conn->query($sql3);
                                            $row_post = $post_det1->fetch_assoc();
                                            echo "<h1>  <br/>";
                                            echo $row_post["post_title"];
                                             echo "</h1>";
                                           echo "<p class=lead> by";
                                        echo "<a href="."#>";
                                        echo $row_author["author_name"]. "</a>";
                                       echo " <p>Posted on";
                                       echo  $row_post["post_created"];
                                       echo "</p><p>";
                                       echo $row_post["content"];
                                       echo "</p>";
                                       -->

                </div> <!-- col md 8-->
               
                <div class="col-md-4">
                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Widget start -->


                    <?php
include "category.php";
?>
<!-- Categories Widget  Ending-->
                                            <!--
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="#">JavaScript</a>
                                        </li>
                                        <li>
                                            <a href="#">CSS</a>
                                        </li>
                                        <li>
                                            <a href="#">Tutorials</a>
                                        </li>
                                    </ul>
                                </div> -->
                              
                          
                                
                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Side Widget</h5>
                        <div class="card-body">
                            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                        </div>
                    </div>

                    </div> <!--- col 4 /-->
          
          </div> <!-- /.row -->
                  
                  </div>
                  <!-- /.container -->                             
                
        
        <!-- Flushing DB Connection   -->
        <?php
                       
              $conn->close();
        ?>

     
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>