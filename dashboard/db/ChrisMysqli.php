<?php
class ChrisMysqli extends DbConnector
{
	private $host,$user,$pass,$db;
	public function __construct(){$this->db = DbConnector::getInstance()->connect();}
	
	public function get($query)
	{
		$queryResult = mysql_query($query);
			if(!$queryResult){echo "Query ${$query} failed..";exit;}
			if(mysql_num_rows($queryResult) == 0){return null;}
			else{return new QueryResult($query);}
	}

	public function set()
	{
		
	}
}

class QueryResult
{
	private $query,$queryResult;
	public function __construct($query){ $this->query = $query; $this->queryResult = mysql_query($query);}

	public function fetch_row()
	{

	}

	public function fetch_assoc()
	{
		$resultArrayIndex = 0; $resultArray = array();
			while($row = mysql_fetch_assoc($this->queryResult))
			{
				$resultArray[$resultArrayIndex] = $row;
				$resultArrayIndex++;
			}
		return $resultArray;
	}	
}
?>