<html>
<head>
	</head>
	<body>

		

<?php

//connect to DB
$connection = new mysqli("cis.gvsu.edu", "toneyc", "toneyc") or die("Failed to connect 1");;
$connection->select_db("toneyc");

//get post data and start session for user
$user = $_POST['username'];
$pass = $_POST['password'];
session_start();
$_SESSION['username'] = $user;

if (isset($_POST['submit'])) {
	if (!empty($_POST['username'])) {

		//fetches attempted user login + pass
		$query = "select * from users where username = '$_POST[username]' and password = '$_POST[password]'";
		$result = $connection->query($query);
		$arr = $result->fetch_array();

		//if query comes back empty, sign in fails
		if (empty($arr)) {
			echo "<h3>Attempted Sign In Failed</h3>";
			echo '<a href="index.html">Re-Try?</a>';
		} else {
			// if query comes back fine, redirect to ratings page
			header('Location: ratings.php');

		}
	}
}

?>

</body>
</html>