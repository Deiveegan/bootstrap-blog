

<?php
   include "cn.php";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "insert into posts (post_id,author_id,post_title,post_created,content) values ($_POST[postid],$_POST[aut_id],'$_POST[title]','$_POST[date]','$_POST[content]')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<a href='index.php'>Go Back</a>";
    } 
    else{
            echo "Error: " . $sql . "<br>" . $conn->error;
     }


    $conn->close();
?>