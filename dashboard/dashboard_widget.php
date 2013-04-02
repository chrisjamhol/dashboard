<?php
class Dashboard
{
	private $userMail,$db;

	public function __construct()
	{
		$this->userMail = $_SESSION['user_mail'];
		$this->getLayout();
	}
	
	private function getLayout()
	{

	}

	public function fillGrid($row,$col)
	{

	}

	/*
	public function getHeadCont(){}
	public function getBodyCont(){}
	*/
}
?>