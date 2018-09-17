<?php 
// Class connect database
class Database
{
	public $conn;
	public $qr;
	public $categories;
    
    // Construct method to connect
	public function __construct() {
		$this->conn = new mysqli("localhost", "root", "123456", "demo");
		
		// If error
		if(!$this->conn) {
			echo "Failed to connect to database";
		}
		
		// Query data
		$qr = mysqli_query($this->conn, "select * from menu" );
		
		
		$this->categories = array();

		while ($row = mysqli_fetch_assoc($qr)){

			$this->categories[] = $row;
		}

		// Return an array of query result
		return $categories;
	}
}

$db = new Database();
// echo $db->getCategories();

?>