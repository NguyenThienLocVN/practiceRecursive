<?php 
// Class connect database
class Database
{
    public $conn;
    
    // Construct method to connect
	public function __construct() {
		$this->conn = new mysqli("localhost", "root", "123456", "demo");
		
		// If error
		if(!$this->conn) {
			echo "Failed to connect to : " . mysql_connect_error($this->conn);
        }
    }

}

?>