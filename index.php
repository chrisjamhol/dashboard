<?php
#--------------------#
$baseFolderName = "dashboard";
$redirectUrl = split("/",substr($_SERVER["REDIRECT_URL"],(strlen($baseFolderName)+2)));
//var_dump($redirectUrl);
$widgetName = ucwords(strtolower($redirectUrl[0]));
$widgetPath = $redirectUrl[0]."/".strtolower($widgetName)."_widget.php";
require_once("includer.php");
#echo "<br />n: ".$widgetName."<br />";
#echo "p: ".$widgetPath."<br />";
#--------------------#
$login = new Login();
if($login->isLoggedIn() === false)
{
	$login->showLoginPage();
}
else
{
	$widgets = WidgetSupervisor::getWidgets($_SESSION['user_mail']);
	$controller = new Controller($widgets);
	$controller->initDashboard();
	echo '<a href="index.php?logout">Logout</a><br /><br />';
	#$control = new Controller($widgetName,$widgetPath,$redirectUrl);
	#$controller = new Controller($widgets);
}
?>