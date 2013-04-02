<?php
abstract class Widget
{
	private $row,$col,$rowspan,$colspan;
	public function __construct($row,$col,$colspan,$rowspan){$this->row = $row; $this->col = $col;$this->rowspan = $rowspan; $this->colspan = $colspan;}
	
	abstract function getHeadCont();
	abstract function getBodyCont();
	abstract function getPos();
}
?>