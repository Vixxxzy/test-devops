<?php
class Home_model{
    private $db;

    public function __construct(){
        $this->db = new Database90;

        if($this->db == false) {
            echo "<script>console.log('Connection failed.' );</script>";
        }else{
            echo "<script>console.log('Connected successfully.' );>/script>";
        }
    }

    public function input_data($data) {
        try{
            $reg_number = $data['reg_number'];
            $nim_number = $data['nim_number'];
            $email = $data['email'];
            $fullname = $data['fullname'];
            $password = $data['password'];

            date_default_timezone_set('Asia/Makassar');
            $datanow = date("Y-m-d H:i:s");

            $sql = "INSERT INTO `tbl_students` (`reg_number`, `nim_number`, `email`, `fullname`, `password`, `created_at`, `updated_at`) 
        VALUES ('$reg_number', '$nim_number', '$email', '$fullname', '$password', '$datanow', '$datanow')";


            if ($sql === true) {
                return "SUCCESS";
            } else {
                return "FAILED";
            }

        } catch (Exception $e) {
            return "ERROR";
        }
    }
}
?>