<html>
    <head>
        <title>
            User Verification</title>
            <?php include "src.php";?></head>


    <body>
<?php

include "header.php";
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div align="center">
                                    <h3 style="color:blue">Control Panel Login</h3>
                                    <h4 style="color:blue">Enter Your Name and Password </h4>
                                    <form action="/dashboard.php" method="post">
                                    <br>   
                                    Author Name:
                                        <input type="text" name="name">
                                        <br>
                                        <br>
                                        Password:
                                        <input type="text" name="pass">
                                        <br><br>
                                        <input type="submit" value="Submit">
                                    </form> 
                                </div>
</body>
</html>
