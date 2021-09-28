<?php
    include_once 'header.php';
 ?>

        <section class="login">
            <h2 class="sign_up"> Login </h2>
            <div class="sign_up">
            <form action= "includes/login_inc.php" method= "post">
                <input class =" form_input" type= "text" name= "uid" placeholder= "Username/Email...">
                <input class =" form_input" type= "password" name= "pwd" placeholder= "Password...">
                <button class="button" type= "submit" name="submit"> Login </button>
            </div>
            <?php
            //get we can see in the url
            //post we can't see that in the url
                if (isset($_GET["error"])) {
                    if($_GET["error"]== "emptyInput"){
                        echo "<p>You forgot to fill all the fields! </p>";
                    }
                    else if ($_GET["error"]== "wrongLogin"){
                        echo "<p>Incorect login info ! </p>";
                    }

                }
            ?>
        </section>



<?php
    include_once 'footer.php';
?>
