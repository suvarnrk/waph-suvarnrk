
<?php 
	require "database.php";
	$username = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenumber"]; 
	$password = $_POST["password"];
	if(isset($username)  && isset($firstname) && isset($lastname) && isset($email) && isset($phonenumber) && isset($password)){
		if(userupdate($username, $firstname, $lastname,$email, $phonenumber,$password)){
			echo "Profile Updated Succeeded";
 		}else{
			echo "Profile Updated Failed!";
		}
	}
	else{
		echo "All the details are not provided correctly";
	}
?>
<form action="loginform.php" method="GET">
    <button type="submit">Go back to login page</button>
</form>
