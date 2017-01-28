<?php
if(!defined(INDEX_CHECK_LBARMAN) || INDEX_CHECK_LBARMAN != "TRUE")
	die("Hack attempt. Infos logged");


class SQL {
	private $connection;
	private $host;
	private $user;
	private $userPassword;
	private $selectedDatabase;
	private $lastQueryResult;
	private $error;
	
	function setConnection($connectionIn)
	{
		$this->connection = $connectionIn;
	}
	
	function getConnection() {
		return $this->connection;
	}
	
	function setHost($hostIn) {
		$this->host = $hostIn;
	}
	
	function getHost() {
		return $this->host;
	}
	
	function setUser($userIn) {
		$this->user = $userIn;
	}
	
	function getUser() {
		return $this->user;
	}
	
	function setUserPassword($userPasswordIn) {
		$this->userPassword = $userPasswordIn;
	}
	
	
	function getUserPassword() {
		return $this->userPassword;
	}
	
	function setSelectedDatabase($selectedDatabaseIn) {
		$this->selectedDatabase = $selectedDatabaseIn;
	}
	
	function getSelectedDatabase() {
		return $this->selectedDatabase;
	}
	
	function setLastQueryResult($lastQueryResultIn) {
		$this->lastQueryResult = $lastQueryResultIn;
	}
	
	function getLastQueryResult() {
		return $this->lastQueryResult;
	}
	
	function getError() {
		return $this->error;
	}
	
	/**
	 * @param $database => Database which you would want to connect to
	 * @param $host
	 * @param $user
	 * @param $userPassword
	 */
	function __construct($database = NULL, $host = NULL, $user = NULL, $userPassword = NULL) {
		
		// If any of the connection variables are not set, use the default variable set
		if($host == NULL || $user == NULL || $userPassword == NULL) {
			$this->setHost(DB_HOST);
			$this->setUser(DB_USER);
			$this->setUserPassword(DB_PASSWORD);
		}
		$this->connection = mysql_connect($this->getHost(), $this->getUser(), $this->getUserPassword());
		
		if(!$this->connection) $this->error = "The connection to database has failed : ".mysql_error();
		
		if($database != NULL)
			$this->selectDatabase($database);
		else
			$this->selectDatabase(DB_NAME);
	}
	
	function selectDatabase($database = DB_NAME) {
		if(!isset($this->connection)) $this->error = "No connection to the database has been established.";
		else {
			mysql_select_db($database, $this->connection) or die("Failed to select the following database : " . $database);
			$this->selectedDatabase = $database;
			if(!$this->selectedDatabase)
			{
				$this->error = "Selection of database failed : " . mysql_error();
			}
		}
	}
	
	function query($query) {
		if(!isset($this->connection)) echo "No connection to the database has been established.";
		else if(!isset($this->selectedDatabase)) echo "No database selected.";
		else {
			$result = mysql_query($query) or die("The following query has failed : " . $query . "<br/> Reason : " . mysql_error());
			$this->setLastQueryResult($result);
			return $result;
		}
	}
	
	function unsafeQuery($query) {
		if(!isset($this->connection)) echo "No connection to the database has been established.";
		else if(!isset($this->selectedDatabase)) echo "No database selected.";
		else {
			$result = mysql_query($query) or die("The following query has failed : " . $query . "<br/> Reason : " . mysql_error());
			$this->setLastQueryResult($result);
			return $result;
		}
	}
	
	/**
	 * @desc This method simply loads all the objects of a SQL query into an array that you can use afterwards
	 */
	function loadObjects() {
		$returnArray = array();
		
		while($row = mysql_fetch_array($this->getLastQueryResult())) {
			$returnArray[] = $row;
		}
		
		return $returnArray;
	}
	
	function tableExists($table)
	{
     	$exists = mysql_query("SELECT 1 FROM `$table` LIMIT 0", $this->connection);
      	if ($exists) return true;
    	else return false;
	}
	
	function fieldExists($field, $table)
	{
     	$exists = mysql_query("SELECT $field FROM `$table` LIMIT 0", $this->connection);
      	if ($exists) return true;
    	else return false;
	}
	
	function getLastInsertId() {
		return mysql_insert_id($this->connection);
	}
	
	function close() {
		mysql_close($this->connection);
	}
}

?>