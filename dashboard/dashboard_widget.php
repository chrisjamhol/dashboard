<?php
class Dashboard
{
	private $userMail,$db;

	public function __construct()
	{
		$this->userMail = $_SESSION['user_mail'];
		$this->getWidgets();
		$this->getLayout();
	}

	private function getWidgets()
	{

	}

	private function getLayout()
	{

	}

	/*
	public function getHeadCont(){}
	public function getBodyCont(){}
	*/
}
?>