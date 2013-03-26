<?php
class Dashboard
{
	private $userId,$db;

	public function __construct($userId)
	{
		$this->userId = $userId;
		$this->getWidgets();
		$this->getLayout();
	}

	private function getWidgets()
	{

	}

	private function getLayout()
	{

	}
}
?>