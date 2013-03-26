<html>
<head>
	<title>Chris's Dashboard</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link href='generalUse/css/base.css' rel='stylesheet' type='text/css'>
	<link href='topBar/topBar.css' rel='stylesheet' type='text'>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
</head>
<body>
	<!-- <h1>Welcome Christopher</h1> -->
	<?php
		echo file_get_contents('topBar/topBar.html');
		require_once("widget.php");
		$dashboard = new Dashboard(0);
	?>
	<a href="index.php?logout">Logout</a>
</body>
</html>