<?php

if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if(emptyInputLogin($username, $pwd) !== false){
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    login_user($conn, $username, $pwd);
}
else {
    header("location: ../login.php");
}
