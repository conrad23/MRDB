<html>
<head>
	</head>
	<body>

		

<?php


$connection = new mysqli("cis.gvsu.edu", "toneyc", "toneyc") or die("Failed to connect 1");;
$connection->select_db("toneyc");

$user = $_POST['username'];
$pass = $_POST['password'];

if (isset($_POST['submit'])) {

	session_start();

	if (!empty($_POST['username'])) {
		$query = "select * from users where username = '$_POST[username]' and password = '$_POST[password]'";
		$result = $connection->query($query);
		$arr = $result->fetch_array();

		if (empty($arr)) {
			echo "<h3>Attempted Sign In Failed</h3>";
			echo '<a href="index.html">Re-Try?</a>';
		} else {
			header('Location: ratings.php');

		}

		// echo $arr[0];
		// echo $arr[1];

	}
}


// function sign_in($connection) {

// 	echo "test 0";

// 	session_start();

// 	if (!empty($_POST['username'])) {

// 		echo "test 1";
// 		$query = "select * from users where username = " . $user . " and password = " . $password;
// 		$result = $connection->query($query) or die(mysql_error);

// 		foreach ($result as $row) {
// 			echo "test 6";
// 			echo $row['username'];
// 		}

// 		// if (!empty($row['username']) and !empty($row['password'])) {
// 		// 	echo "test 2";
// 		// 	$_SESSION['username'] = $row['password'];
// 		// 	echo "SUCCESSFUL LOGIN";
// 		// } else {
// 		// 	echo "test 3";
// 		// 	echo "WRONG USERNAME OR PASSWORD";
// 		// }
// 	}
// }

// echo "test 4";

// if (isset($_POST['submit'])) {
// 	echo "test 5";
// 	sign_in($connection);
// }


?>

</body>
</html>