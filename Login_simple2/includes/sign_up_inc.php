<?php
//if it is inside de code
if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat)!== false){
        header("location: ../sign_up.php?error=emptyInput");
        exit();
    }


    if(invalidUid($username)!== false){
        header("location: ../sign_up.php?error=invalidUid");
        exit();
    }

    if(invalidEmail($email)!== false){
        header("location: ../sign_up.php?error=invalidEmail");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat)!== false){
        header("location: ../sign_up.php?error=passwordNoMatch");
        exit();
    }

    if(UidExists($conn, $username, $email)!== false){
        header("location: ../sign_up.php?error=usernameTaken");
        exit();
    }

    //password lenght

    createUser($conn, $name, $email, $username, $pwd);
}
else{
    header("location: ../sign_up.php");
    exit(); // stops the script
}
