<?php
session_start();
include_once 'header.php';
?>

<div>
	<table>
  <tr>
    <th>Username</th>
    <th>Email</th>
    <th></th>
  </tr>
  <?php
	require_once "includes/functions_inc.php";
  	$data = get_users();
  	foreach ($data as $user) {
  	echo "</td></tr>";
  	echo $user['usersId'];
	echo "<tr><td>";
   	echo $user['usersUid'];
   	echo "</td><td> ";
   	echo $user['usersEmail'];
   	echo "</td><td> ";

  }
  ?>
</table>
  <form action="includes/delete_user.php" method="post"><br>
	<input type="text" name="d_user" placeholder="Username/Email"><br>
	<button type="submit" name="delete">Delete user</button><br>
  </form>
  
<?php
	if(isset($_GET["error"])){
		if($_GET["error"] == "empty_input"){
			echo "<p> Camp necompletat!</p>";
		}
		if($_GET["error"] == "delete_succes"){
			echo "<p> User delete succeful!</p>";
		}
		if($_GET["error"] == "delete_fail"){
			echo "<p> User delete fail!</p>";
		}
		if($_GET["error"] == "invalid_user"){
			echo "<p> User unknow!</p>";
		}
	}
	?>

</div>
