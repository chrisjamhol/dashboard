<?php session_start() ?>
<html>
<head>
	<title>Chris's Dashboard</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href="generalUse/css/base.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- <h1>Welcome Christopher</h1> -->
	<?php
		require_once("dashboard/widget.php");
		$dashboard = new Dashboard();
	?>
</body>
</html>