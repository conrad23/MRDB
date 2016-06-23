<html>
<head>
<title>
Contact - Movie Ratings Database
</title>
<link rel="stylesheet" href="index-style.css" type="text/css">
</head>
<body>

<?php

if (isset($_POST['submit'])) {
	//my email
	$toEmail = "conrad.toney@gmail.com";

	//information about user
	$fromEmail = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$requestedUser = $_POST['requestedUser'];
	$comment = $_POST['comment'];

	//subject line of email
	$subject = "Account Request - MRDB";

	//message sent in email
	$body = "First Name: " . $firstName . "\nLast Name: " . $lastName . "\nEmail: " . $fromEmail . "\nRequested Username: " . $requestedUser . "\nComments: " . $comment;

	//header info
	$header = "From:" . $fromEmail;

	//send email, notify user
	mail($toEmail, $subject, $body, $header);
	echo "Account request has been submitted.";

}
?>

<form action="contact.php" method="post">
<table>
<tr><td>First Name:</td><td><input type="text" name="firstName"></td></tr>
<tr><td>Last Name:</td><td><input type="text" name="lastName"></td></tr>
<tr><td>Email:</td><td><input type="text" name="email"></td></tr>
<tr><td>Request Username:</td><td><input type="text" name="requestedUser"></td></tr>
<tr><td>Comment:</td><td><input type="text" name="comment"></td></tr>
<tr><td><input type="submit" name="submit" value="Submit"></td><td></td></tr>
<tr><td><a href="index.html">Return to Sign-in Page</a></td><td></td></tr>
</table>
</form>


</body>
</html>