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
		require_once('facebook/widget.php');
		FbWidget::setMode("deploy");
		$fb = new FbWidget();
		$fbNewsfeed = $fb->getNewsfeed();
		echo "<br /><br /><br />";
		var_dump($fbNewsfeed)
	?>
</body>
</html>