<?php
//Class handling Database connection and querying it
//Author: Steven Ng forked from Yaw Agyepong
class Database
{
	private $dbHOST = "localhost";
    private $dbUSER = "root";
    private $dbPASS = "";//"cselab29";
    private $dbNAME = "paws";
    private $db_connection;
	
	public function __construct() {
		$this->db_connection = mysql_connect($this->dbHOST, $this->dbUSER, $this->dbPASS) or die(mysql_error());
        mysql_select_db($this->dbNAME) or die("Database connection error. Please check if the database is operational or if your connection is faulty.");
	}	
	
	public function __destruct() {
		mysql_close($this->db_connection);
    }
	
	public function insert($data)
	{
		$password = $data['password'];
		$hash = hash('sha256', $password);
		function createSalt()
		{
			$text = md5(uniqid(rand(), true));
			return substr($text, 0, 3);
		}
		$salt = createSalt();
		//while (true)
		//echo $salt;
		$password = hash('sha256', $salt . $hash);
		$query = "INSERT INTO member (firstname, lastname, password, email, salt) VALUES ('". mysql_real_escape_string($data['firstname']) ."', '". mysql_real_escape_string($data['lastname']) ."', '". $password ."', '". mysql_real_escape_string($data['email']) ."', '". $salt ."');";
		
		mysql_query($query);
		//while (true)
		//echo $salt;
	}
	
	public function login($data)
	{	
			session_regenerate_id();
			$_SESSION['sess_user_id'] = $userData['id'];
			$_SESSION['sess_username'] = $userData['username'];
			session_write_close();
			header('Location: index.php');
	}
}
?>