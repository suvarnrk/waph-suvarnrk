<?php
	session_start();    
	if (checklogin_mysql($_POST["username"],$_POST["password"])) {
?>
	<h2> Welcome <?php echo $_POST['username']; ?> !</h2>
<?php		
	}else{
		echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
		die();
	}
	

  	function checklogin_mysql($username, $password) {
		//$account = array("admin","1234");
		$mysqli = new mysqli('localhost','admin1','password','waph');
		if($mysqli->connect_errno){
			printf("database connection error: %s\n", $mysqli->connect_error);
			exit();
		}
		$sql = "SELECT * FROM users WHERE username='" . $username . "'";
		$sql =$sql . " AND password='" .$password . "'";
		echo "DEBUG>sql= $sql";
		return TRUE;
	}	
	


?>
