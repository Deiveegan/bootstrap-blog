<html lang="en">

        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>

    <body>
        <div class="container">

            <ul class="nav nav-pills">
                <li><a data-toggle="pill" href="#home1">Home</a></li>
                <li class="active"><a data-toggle="pill" href="#admin">Admin</a></li>
                <li><a data-toggle="pill" href="#contact">Contact</a></li>
            </ul>


            <div class="tab-content">
                <div id="home1" class="tab-pane fade">
                    <h3>Welcome to sample web</h3>
                    <?php
                      
                       // initial db connection details r in cn.php
                       include "cn.php";

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 
                        
                        $sql = "SELECT name, dept FROM std";
                        $result = $conn->query($sql);
                        echo "<table border=5>";
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                            
                                echo "<tr><td>" .$row["name"]. "</td><td>" .$row["dept"]. "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>

                </div>    <!--Home tab  closing div -->

                <div id="admin" class="tab-pane fade in active">
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

                                $sql = "SELECT name, pass FROM std";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0)
                                {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) 
                                    {
                                        if(($_POST["name"] == $row["name"]) && ($_POST["pass"] == $row["pass"])  ) 
                                        {
                                        $flag=1;
                                        } 
                                    }
                                        if($flag==1) 
                                        {
                                            //flag value 1 is eqal to valid user; If valid user it will show control panel
                                            // to add new user
                                            // generating form to get about new user details
                                            echo "<center align='center'><h3>Enter User Details</h3><form action='/add.php' method='post'>";
                                            echo  "Name:";
                                                    echo "      <input type='text' name='name'>
                                                    <br><br>
                                                    Dept:";
                                            echo  "     <input type='text' name='dept'>
                                                    <br><br>
                                                    Age:        <input type='text' name='age'>
                                                    <br><br>
                                                    Password:<input type='text' name='pass'>
                                                    <br><br>
                                                    <input type='submit' value='Insert'></form> </center>";

                
    
                                        } else 
                                            { ?>
                                            <!-- 
                                                    $flag=0 , means user name/ password does not match with db
                                                    the following form will get the admin details again
                                            -->

                                            <div>
                                        <h3>Control Panel Login</h3>
                                        <h4>Your Username / Password Error pls Re Enter</h4>
                                        <form action="/admin" method="post">
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
                
                <div id="contact" class="tab-pane fade">
                    <h3>Contact Details</h3>
                </div> <!-- contact div close -->
        
           
            </div> <!-- tabs  div close -->
        </div> <!-- container div close -->

    </body>

</html>