<?php
require_once("DbConnector.php");
require_once("ChrisMysqli.php");

$db = new ChrisMysqli(); 
#$result = $db->get("SELECT * FROM widget")->fetch_assoc();
foreach($db->get("SELECT * FROM widget")->fetch_assoc() as $row)
{
	echo $row['name']."\n";
}
?>