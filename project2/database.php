
<?php 
$mysqli=  new mysqli('localhost','suvarnrk','ubuntu','waph');
		if($mysqli->connect_errno){ 
			printf("Database connection failed; %s\n", $mysqli->connect_error);
			return FALSE;
		}
function newuser($username, $firstname,$lastname, $email, $phonenumber, $password){
		global $mysqli;
		$prepared_sql = "INSERT INTO users(username,firstname,lastname,email,phonenumber,password) VALUES(?,?,?,?,?,md5(?));";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ssssss", $username,$firstname,$lastname,$email,$phonenumber,$password);
		if($stmt->execute())return TRUE;
		return FALSE;
	}
function userupdate($username, $firstname,$lastname, $email, $phonenumber, $password){
		global $mysqli;
		$prepared_sql = "UPDATE users SET firstname=?,lastname=?, email=?, phonenumber=?,password=md5(?) WHERE username=?";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ssssss", $username,$firstname,$lastname,$email,$phonenumber,$password);
		if($stmt->execute())return TRUE;
		return FALSE;
	}

function userprofileview($username)
{
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        return $result->fetch_assoc();
    }
    return null;
}
function checklogin_mysql($username, $password) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM users WHERE username= ? AND password = MD5(?)";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result=$stmt->get_result();
    if ($result->num_rows >= 1) return TRUE;
    return FALSE;
    }
    function passwordchange($username, $password) {
    global $mysqli;
    $prepared_sql = "UPDATE users SET password = md5(?) WHERE username= ?";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss",$password,$username);
    if ($stmt -> execute()) return TRUE;
    return FALSE;
    }
    
?>
