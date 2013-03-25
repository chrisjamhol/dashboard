<html>
<head>
</head>
<body>
<?php
require_once("includer.php");
$login = new Login();
if($login->isLoggedIn())
{
	#header("Location: dashboard/dashboard.php");
	echo "user logged in";
}
else
{
	#header("Location: login/login.php");
	echo "user not logged in";
	echo file_get_contents("login/login.html");
}
?>
</body>
</html>