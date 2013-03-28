<?php
class Controller
{
	private $widgets;
	public function __construct($widgets)
	{
		$this->widgets = $widgets;
	}

	public function initDashboard()
	{
		require_once("dashboard/dashboard_widget.php");
		$dashboard = new Dashboard();
	}
}
?>