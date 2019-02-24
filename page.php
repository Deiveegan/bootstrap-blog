<html>
<body>

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

                $row=$post_det->fetch_assoc();
                echo $row["content"];

                ?>    
				</body>
				</html>
				