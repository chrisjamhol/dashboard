<html>
<?php
$topFolderName = "dashboard";
$redirectUrl = split("/",substr($_SERVER["REDIRECT_URL"],(strlen($topFolderName)+2)));
global $widgetName,$widgetEntry;
$widgetName = ucwords(strtolower($redirectUrl[0]));
$widgetEntrypoint = $redirectUrl[1];

die();
require_once("includer.php");
$login = new Login();
if($login->isLoggedIn() === false)
{
	echo "user not logged in";
	echo file_get_contents("login/login.html");
}
else
{
	require_once("dashboard/dashboard.php");
}
?>
</html>