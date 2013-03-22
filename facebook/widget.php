<?php
require_once($_SERVER['DOCUMENT_ROOT']."/facebookapp/index.php");
class FbWidget extends Facebookapp
{
	public static $mode = "deploy" ;
	private static $widgetParth = "facebook/deploy/";

	public function __construct()
	{
		$this->connect();
	}

	public function getNewsfeed()
	{
		return $this->getNewsfeedApi();
	}

	public function getMe()
	{
		return $this->getMeApi();
	}

	public function setMode($mode)
	{
		FbWidget::$mode = $mode;
		FbWidget::$widgetParth = "facebook/".$mode."/";
	}
}
?>