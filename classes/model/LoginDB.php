<?php
	$filepath = realpath(dirname(__FILE__));
	 include ('./lib/session.php');
	 Session::checkLogin(); // gọi hàm check login để ktra session
	 include ('./lib/database.php');
    include ('./helpers/format.php');
    include ('./classes/view/LoginAlert.php');
?>



<?php 
	/**
	* 
    */
    
	class check_login {
		private $db;
		private $fm;
		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();
		}
		
		public function setupSession($result,$email){
			$value = $result->fetch_assoc();
            $_SESSION['email'] = $email;
			Session::set('customerLogin', true);
			Session::set('customerId', $value['id']);
			Session::set('customerEmail', $value['email']);
            Session::set('customerName', $value['name']);
            $loginAlert = new LoginAlert();
            $loginAlert->alertSuccess();
			header("Location:login.php");
		}
		public function credentialsCheck($email,$password) {
            $loginAlert = new LoginAlert();
			$email = $this->fm->validation($email); 
			$password = $this->fm->validation($password);

			$email = mysqli_real_escape_string($this->db->link, $email);
			$password = mysqli_real_escape_string($this->db->link, $password);
            $password = MD5($password);
            
			if(empty($email) || empty($password)){
				$loginAlert->alertEmpty();
			} else {
				$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password' LIMIT 1 ";
				$result = $this->db->select($query);

				if($result != false){ // credential exists
					$loginAlert->alertSuccess();
				} else {
                    $loginAlert->alertFail();
				}
			}
		}
	}
 ?>