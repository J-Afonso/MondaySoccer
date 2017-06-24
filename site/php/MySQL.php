<?php
/**
 * A database abstraction class
 *
 * Note: This class is set up to work with mySQL, however it could be replaced to connect to
 * SQL Server, Oracle or even an XML datastore
 *
 * @author Pedro Eugénio
 * @version 1.0
 * @copyright ©2005 Pedro Eugénio <voxmachina@gmail.com>
 * @package Database
 * @subpackage Classes
 */
class MySQL {

	/**
	 * @var string The database host, e.g. localhost or db.mydomain.com
	 * @access private
	 */
	var $_host = "";

	/**
	 * @var string The name of the database we want to connect to
	 * @access private
	 */
	var $_database = "";

	/**
	 * @var string The username with which to connect to the database
	 * @access private
	 */
	var $_user = "";

	/**
	 * @var string The password used to connect to the database
	 * @access private
	 */
	var $_password = "";

	/**
	 * @var int mySQL resource identifiation for the current connection
	 * @access private
	 */
	var $_linkID = 0;

	/**
	 * @var int mySQL resource identifiation for the current query
	 * @access private
	 */
	var $_queryID = 0;

	/**
	 * @var array Storage for the current record
	 * @access private
	 */
	var $_record = array();

	/**
	 * @var array Storage for the current row
	 * @access private
	 */
	var $_row;

	/**
	 * @var int mySql error number
	 * @access private
	 */
	var $_errorNumber = 0;

	/**
	 * @var string mySql error message
	 * @access private
	 */
	var $_errorMsg= "";



	/**
	 * @var boolean Whether or not to automatically free up memory using mysql_free_result()
	 */
	var $autoFree = 1;


	/**
	 * Constructor function that sets up the database connection settings
	 *
	 * @param string $host The database host, e.g. localhost or db.mydomain.com
	 * @param string $database The name of the database we want to connect to
	 * @param string $user The username with which to connect to the database
	 * @param string $password The password used to connect to the database
	 * @access public
	 */
	function MySQL($host,$database,$user,$password) {
		$this->_host = $host;
		$this->_database = $database;
		$this->_user = $user;
		$this->_password = $password;
	}



	/**
	 * Makes a connection to the database
	 *
	 * @access private
	 */
	function _connect() {
	
		//only open a connection if there isn't already one open
		if ($this->_linkID==0) {
			$this->_linkID = @mysql_pconnect($this->_host, $this->_user, $this->_password);
			if (!$this->_linkID) {
				$this->_errrorNumber = mysql_errno();
				$this->_errrorMsg = mysql_error();
				$this->halt("mysql_pconnect() failed");
			}
			if(!mysql_query("USE {$this->_database}", $this->_linkID)) {
				$this->_errrorNumber = mysql_errno();
				$this->_errrorMsg = mysql_error();
				$this->halt("Cannot Use Database ". $this->_database);
			}
		}
	}

	/**
	 * Executes a SQL query
	 *
	 * @param string $sql The SQL string to be executed
	 * @return int Query ID
	 * @access public
	 */
	function query($sql) {
		
		$this->_connect();

		//$sql = ereg_replace(';','',$sql);

		$this->_queryID = mysql_query($sql,$this->_linkID);
		$this->_row = 0;
		$this->_errrorNumber = mysql_errno();
		$this->_errrorMsg = mysql_error();

		if(!$this->_queryID) {
			$this->halt("Invalid SQL: ".$sql);
		}

		return $this->_queryID;
	}


	/**
	 * Advances the DB object onto the next record, returns false if no record available
	 *
	 * Example:
	 * <code>
	 *   while($db->next_record()) {
	 *     ...
	 *   }
	 * </code>
	 *
	 * @return boolean Whether or not a new record is available
	 * @access public
	 */
	function next_record() {
		$this->_record = mysql_fetch_array($this->_queryID);
		$this->_row += 1;
		$this->_errrorNumber = mysql_errno();
		$this->_errrorMsg = mysql_error();

		$stat = is_array($this->_record);
		if(!$stat && $this->autoFree) {
			mysql_free_result($this->_queryID);
			$this->_queryID = 0;
		}
		return $stat;
	}


	/**
	 * Moves the DB object onto a particular record
	 *
	 * @param int $rowNumber The requested row to move to
	 * @access public
	 */
	function seek($rowNumber) {
		$status = mysql_data_seek($this->_queryID, $rowNumber);
		if($status) $this->_row = $rowNumber;
	}



	/**
	 * Returns information about a particular table
	 *
	 * @param string $table The table name for which the metadata is wanted
	 * @return array A multi-dimentional array of metadata
	 * @access public
	 */
	function metadata($table) {
		$count = 0;
		$id    = 0;
		$res   = array();

		$this->_connect();
		$id = @mysql_list_fields($this->_database, $table);
		if($id < 0) {
			$this->_errrorNumber = mysql_errno();
			$this->_errrorMsg = mysql_error();
			$this->halt("Metadata query failed.");
		}
		$count = mysql_num_fields($id);

		for ($i=0; $i<$count; $i++) {
			$res[$i]["table"] = mysql_field_table ($id, $i);
			$res[$i]["name"]  = mysql_field_name  ($id, $i);
			$res[$i]["type"]  = mysql_field_type  ($id, $i);
			$res[$i]["len"]   = mysql_field_len   ($id, $i);
			$res[$i]["flags"] = mysql_field_flags ($id, $i);
			$res["meta"][$res[$i]["name"]] = $i;
			$res["num_fields"]= $count;
		}

		mysql_free_result($id);
		return $res;
	}

	/**
	 * Returns how many rows were affected by the last query
	 *
	 * @return int How many rows were affected
	 * @access public
	 */
	function affected_rows() {
		return mysql_affected_rows($this->_linkID);
	}



	/**
	 * Returns how many rows were returned by the last query
	 *
	 * @return int How many rows were returned
	 * @access public
	 */
	function num_rows() {
		return mysql_num_rows($this->_queryID);
	}

	/**
	 * Returns how many fields were returned with the last query
	 *
	 * @return int How many  fields
	 * @access public
	 */
	function num_fields() {
		return mysql_num_fields($this->_queryID);
	}


	/**
	 * Returns how many rows were returned by the last query
	 *
	 * @return int How many rows were returned
	 * @access public
	 * @deprecated Deprecated alias to {@link num_rows() num_rows()}.
	 */
	function nf() {
		return $this->num_rows();
	}


	/**
	 * Prints how many rows were returned by the last query
	 *
	 * @return int How many rows were returned
	 * @access public
	 * @deprecated Deprecated alternative to {@link num_rows() num_rows()} that outputs the number of rows returned.
	 */
	function np() {
		print $this->num_rows();
	}


	/**
	 * Returns the value of a particular field
	 *
	 * @param string $name The field whose value wants returning
	 * @return mixed The value of a particular field in the current recordset
	 * @access public
	 */
	function f($name) {
		return $this->_record[$name];
	}


	/**
	 * Prints the value of a particular field
	 *
	 * @param string $name The field whose value wants printing
	 * @access public
	 * @deprecated Deprecated alternative to {@link f() f()} that prints out the value of a field, use <code>echo $db->f("field")</code> instead.
	 */
	function p($name) {
		print $this->_record[$name];
	}

	/**
	 * An error occured so create an exception in the {@link Debug Debug} object.
	 *
	 * @param string $msg Error Message
	 * @access public
	 * @uses Debug::exception()
	 */
	function halt($msg) {
		die("[".$this->_errorNumber."] " . $msg . " {".$this->_errorMsg."}");
	}

	/**
	 * Returns the id of the last row that was INSERTed.
	 *
	 * return int Database id of last INSERTed row
	 * @access public
	 */
	function last_insert_id(){
		return mysql_insert_id($this->_linkID);
	}
}



?>
