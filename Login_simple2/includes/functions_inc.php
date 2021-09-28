<?php
    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
        $result=false;
        if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function invalidUid($username){
        $result=false;
        //mistake in uid form
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    function invalidEmail($email){
        $result=false;
        //checking for valid email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $pwdRepeat){
        $result=false;
        //checking if password are
        // !== not equal
        if($pwd !== $pwdRepeat){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
    //also checking if the email is already used
    function UidExists($conn, $username, $email){
        //? placeholder
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        //prepared statemt anti sql injection
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../sign_up.php?error=stmtfailed1");
            exit();
        }
        // stmt stand for statement
        //specifying the data type ss stand for string
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        // if we get data from database
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;

        }

        mysqli_stmt_close($stmt);
    }


    function createUser($conn, $name, $email, $username, $pwd){
        //? placeholder
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
        //prepared statemt anti sql injection
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../sign_up.php?error=stmtfailed2");
            exit();
        }
        //hasing the passwords
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // stmt stand for statemt
        //specifing the data type ss stand for string
        //using the hashed password
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //redirecting afer an succeful sign up
        //hmmm oare de ce nu ajunge aici EDIT PT CA ESTI UN IDIOT CARE SCRIE CLOSED IN LOC DE CLOSE AKA LINIA 94 btw asta a durat 2h sa vad :(
        header("location: ../sign_up.php?error=none");
        exit();


    }
    //LOGIN
    function emptyInputLogin($username, $pwd){
        $result=false;
        if(empty($username) || empty($pwd)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    define('adminLevel', 1);


function get_users(){
    require_once "includes/dbh_inc.php";
    $sql ="SELECT usersUid,usersEmail,usersAdmin FROM users";
    $result = mysqli_query($conn, $sql);
    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $datas;
}

function login_user($conn, $email, $pwd){
		$username_exist = UidExists($conn, $email, $email);
		if($username_exist === false){
			header("location: ../login.php?error=loging_failed_no_user");
			exit();
		}
		$pwd_hasged = $username_exist["usersPwd"];
		$check_pwd = password_verify($pwd, $pwd_hasged);
		if($check_pwd === false){
			header("location: ../login.php?error=loging_failed");
			exit();
		}else if($check_pwd === true){
			session_start();
			$_SESSION["userid"] = $username_exist["usersId"];
			$_SESSION["useruid"] = $username_exist["usersUid"];

			if($username_exist["usersAdmin"] === adminLevel){
				$_SESSION["usersAdmin"] = true;
				header("location: ../index.php");
			}else{
				header("location: ../index.php");
				$_SESSION["usersAdmin"] = false;
			}
			exit();
		}
	}
