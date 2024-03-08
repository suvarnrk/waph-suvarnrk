<?php 
	$username = $_POST["username"];
	$password = $_POST["password"];
	if(isset($username) and isset($password)){
		echo "Debug> changepassword.php-> Your password is successfully changed got username=$username;got password=$password";
		/*if(addnewuser($username, $password)){
			echo "Registration Succeed";
 		}else{
		echo "Rehistartion Failed!";
	}*/
}
else{
	echo " No username/password provided! ";
}
	function addnewuser($username, $password){
		$mysqli=  new mysqli('localhost','suvarnrk','ubuntu','waph');
		if($mysqli->connect_errno){ 
			printf("Database connction failed; %s\n", $mysqli->connect_error);
			return FALSE;
		}
		$sql = "INSERT INTO users(username,password) VALUES(?,md5(?));";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("ss", $username,$password);
		if($stmt->execute())
			return TRUE;
		return FALSE;
	}
?>
