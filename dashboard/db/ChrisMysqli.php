<?php
class ChrisMysqli extends DbConnector
{
	protected $host,$user,$pass,$db;
	public function __construct(){
		$this->db = DbConnector::getInstance()->connect();
	}

	public function get($query)
	{
		$queryResult = mysql_query($query);
			if(!$queryResult){echo "Query ${$query} failed..";exit;}
			if(mysql_num_rows($queryResult) == 0){return null;}
			else{return new QueryResult($query);}
	}

	public function update()
	{
		if(true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete()
	{
		if(true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

class QueryResult
{
	private $query,$queryResult,$numRows;
	public function __construct($query){ $this->query = $query; $this->queryResult = mysql_query($query); $this->numRows = mysql_num_rows($queryResult);}

	public function num_rows(){return $this->numRows;}

	public function fetch_row(){
		if($queryResult)
		{
			return mysql_fetch_row($queryResult);
		}
		else{return false;}

	}

	public function fetch_assoc()
	{
		if($queryResult)
		{
			$resultArrayIndex = 0; $resultArray = array();
			while($row = mysql_fetch_assoc($this->queryResult))
			{
				$resultArray[$resultArrayIndex] = $row;
				$resultArrayIndex++;
			}
			return $resultArray;
		}
		else{return false;}

	}
}

?>