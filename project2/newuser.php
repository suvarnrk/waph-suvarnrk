<?php 
	require "database.php";
	$username = $_POST["username"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"]; 
	$phonenumber = $_POST["phonenumber"];
	$password = $_POST["password"];
	if(isset($username)  && isset($firstname) && isset($lastname) && isset($email) && isset($phonenumber) && isset($password)){
		if(newuser($username, $firstname, $lastname,$email, $phonenumber,$password)){
			echo "Registration Succeeded";
 		}else{
			echo "Registration Failed!";
		}
	}
	else{
		echo "All the details are not provided";
	}
?>

<form action="loginform.php" method="GET">
    <button type="submit">Back to Login!</button>
</form>