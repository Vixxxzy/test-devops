<?php  
class Login_model{
	private $db;

	public function __construct(){
		// create object from database class
		$this->db = new Database;

		// check status
		if($this->db == false){
			echo "<script>console.log('Connection failed.' );</script>";
		}else{
			echo "<script>console.log('Connected successfully.' );</script>";
		}
	}

	public function check_login($data){
        $email = $data['email'];
		$password = $data['password'];
		$role = $data['select-role'];
		// case sensitive dengan menambahkan modifier BINARY sebelum kolom name
		$result = $this->db->query("select * from tbl_operator where role = '$role' AND email = '$email' AND password = '$password';");
		$this->db->db_close(); // Close database connection
		
		if ($result->num_rows > 0) {
			// convert to associative array
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			return $rows;
		} else {
			return "none"; // kosong return false
		}
	}

	public function get_student_info($email) {
		try {
			$sql = "SELECT * FROM tbl_students WHERE email = '$email'";
			$result = $this->db->query($sql);

			$this->db->db_close();
	
			if ($result->num_rows > 0) {
				$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
				return $rows;
			} 
			
			return []; // Jika tidak ada hasil, kembalikan array kosong
	
		} catch (Exception $e) {
			return []; // Tangani error dan kembalikan array kosong
		}
	}
}
?>