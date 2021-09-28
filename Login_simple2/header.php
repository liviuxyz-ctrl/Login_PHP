<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir = "ltr">
    <head>
        <meta charset="utf-8">
        <title> PHP LOGIN </title>
        <!--<script src = "java_script/script.js"></script>
        -->
        <link rel="stylesheet" href="css/style.css">
        <script src="java_script/script.js"></script>

    </head>
    <body>
           <div id="clock">
            </div>

        <nav>
            <div class= "wrapper">
                <!--<a href="index.php" <img src=" " alt="Blog logo"> </a> -->
                <ul>
                    <li><a href="index.php">Home </a></li>

                    <?php
                        if(isset($_SESSION["useruid"])){
                            if(isset($_SESSION["usersAdmin"])){

                                echo "<li><a href='admin_zone.php'>Admin zone</a></li>";
                                echo "<li><a href='profile.php'>Profile page</a></li>";
                                echo "<li><a href='includes/logout_inc.php'>Log out</a></li>";
                            }else{
                            echo "<li><a href='profile.php'>Profile page</a></li>";
                            echo "<li><a href='includes/logout_inc.php'>Log out</a></li>";
                            }
                        }else
                        {
                            echo "<li><a href='sign_up.php'>Sign up</a></li>";
                            echo "<li><a href='login.php'>Log in</a></li>";
                        }

                        ?>

                </ul>
            </div>
        </nav>

    <div class="wrapper">
