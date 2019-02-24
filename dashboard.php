<html>
    <head>
        <title> Welcome to sample web</title>
       <?php include "src.php";?>
<body>
    <?php
    include "header.php";
    ?>
    <div class="container">

                <center>
                     <div id="div1">
                    <!-- admin credintials verification goes here  -->
                        <?php                    
                            $flag=0;
                            include "cn.php";

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            } 

                            $sql = "SELECT *  FROM author";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0)
                            {
                                // output data of each row
                                while($row = $result->fetch_assoc()) 
                                {
                                    if(($_POST["name"] == $row["author_name"]) && ($_POST["pass"] == $row["passkey"])  ) 
                                    {
                                    $flag=1;
                                    } 
                                }
                                    if($flag==1) 
                                    {
                                        //flag value 1 is eqal to valid user; If valid user it will show control panel
                                        // to add new user
                                        // generating form to get about new user details
                                      include "addpost.php";

            

                                    } else 
                                        { ?>
                                        <!-- 
                                                $flag=0 , means user name/ password does not match with db
                                                the following form will get the admin details again
                                        -->

                                       
                                       <div>
                                        <h3>Control Panel Login</h3>
                                        <h4> Username / Password is  Error pls Re Enter</h4>
                                        <form action="/dashboard.php" method="post">
                                            Name:<br>
                                            <input type="text" name="name">
                                            <br>
                                            Password:<br>
                                            <input type="text" name="pass">
                                            <br><br>
                                            <input type="submit" value="Submit">
                                        </form> 
                                    </div>

                                                                <?php
                                                                }
                                        
                                                    } else {
                                                            echo "No Users Found Go Back";
                                                        }
                                                        $conn->close();

                                                ?>

                                            </div>
                </center>

            </div> <!-- admin div close -->
            
            

</body>
</html>