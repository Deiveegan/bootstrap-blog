
<?php
               include "cn.php";
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "SELECT * FROM posts where post_id =(select max(post_id) from posts)";
                $result = $conn->query($sql);
                echo "value of result=".$result->num_rows;
                echo "<table class='table table-striped'>";
                echo "<thead> <tr>  <th>Post Name</th> <th>Content of The post</th> </tr> </thead>";
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       
                        echo "<tr><td>" .$row["post_title"]. "</td><td>" .$row["content"]. "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
