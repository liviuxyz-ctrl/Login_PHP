<?php
    include_once 'header.php';
 ?>

        <section class="register">
            <h2>Sign Up </h2>
            <div class="sign_up">
            <form action= "includes/sign_up_inc.php" method="post">
                <input class =" form_input" type= "text" name= "name" placeholder="Full name...">
                <input class =" form_input" type= "text" name= "email" placeholder="Email...">
                <input class =" form_input" type= "text" name= "uid" placeholder="Username...">
                <input class =" form_input" type= "password" name= "pwd" placeholder="Password...">
                <input class =" form_input" type= "password" name= "pwdrepeat" placeholder="Repeat password...">
                <button class="button" type= "submit" name="submit"> Sign Up </button>
            </form>
            </div>
            
            <?php
            //get we can see in the url
            //post we can't see that in the url
                if (isset($_GET["error"])) {
                    if($_GET["error"]== "emptyInput"){
                        echo "<p>You forgot to fill all the fields! </p>";
                    }
                    else if ($_GET["error"]== "invalidUid"){
                        echo "<p>Choose a proper username !</p>";
                    }
                    else if ($_GET["error"]== "invalidEmail"){
                        echo "<p>Choose a proper Email !</p>";
                    }
                    else if ($_GET["error"]== "passwordNoMatch"){
                        echo "<p>Passwords doesn't match !</p>";
                    }
                    else if ($_GET["error"]== "stmtfailed1"){
                        echo "<p>Something went wrong !</p>";
                    }
                    else if ($_GET["error"]== "stmtfailed2"){
                        echo "<p>Something went wrong again !</p>";
                    }
                    else if ($_GET["error"]== "usernameTaken"){
                        echo "<p>Username already taken</p>";
                    }
                    else if ($_GET["error"]== "none"){
                        echo "<p>You have signed up!</p>";
                    }
                }
            ?>
        </section>



<?php
    include_once 'footer.php';
?>
