<?php
include_once 'functions_inc.php';

//This is for development only
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "login";

//case SENSITIVE

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Connection failed:" .mysqli_connect_error());

}
