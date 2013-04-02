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
		require_once("commandbridge/php/HtmlBuilder.php");
		$dashboard = new Dashboard();
		#$dashboard->fillGrid();
	}
}
?>