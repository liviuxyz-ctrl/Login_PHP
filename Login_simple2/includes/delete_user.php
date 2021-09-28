<?php

if(isset($_POST["delete"])){	
		require_once "dbh_inc.php";
		require_once "functions_inc.php";
		$d_email = $_POST["d_user"];
		if(empty($d_email)){
			header("location: ../admin_zone.php?error=empty_input");
			exit();
		}

		if(!(invalidEmail($d_email) !== false)){
			$id =  UidExists($conn, $d_email, $d_email)[$usersId];
			$sql = "DELETE FROM users WHERE usersId = $id";

			if (mysqli_query($conn, $sql)) {

			  header("location: ../admin_zone.php?error=delete_succes");
			} else {
			  header("location: ../admin_zone.php?error=delete_fail");
			}

		}else{
			header("location: ../admin_zone.php?error=invalid_user");
			exit();
		}
	}else{
		header("location: ../admin_zone.php");
		exit();
	}
