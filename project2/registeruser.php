<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript">
    function displayTime() {
      document.getElementById('digit-clock').innerHTML = "Current time: " + new Date();
    }
    setInterval(displayTime, 500);
    
    function validateForm() {
      var email = document.forms["registrationForm"]["email"].value;
      var phone = document.forms["registrationForm"]["phonenumber"].value;
      var password = document.forms["registrationForm"]["password"].value;
      
      // Email validation
      var emailPattern = /^[\w.-]+@[\w-]+(\.[\w-]+)*$/;
      if (!emailPattern.test(email)) {
        alert("Please provide a valid email address");
        return false;
      }
      
      // Phone number validation
      var phonePattern = /^\d{10}$/;
      if (!phonePattern.test(phone)) {
        alert("Mobile number must be a 10-digit");
        return false;
      }
      
      // Password validation
      var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
      if (!passwordPattern.test(password)) {
        alert("Password must contain at least one letter, one number, and be at least 8 characters long");
        return false;
      }
    }
  </script>
</head>
<body>
  <h1>Register Here!</h1>

  <form name="registrationForm" action="newuser.php" method="POST" class="form login" onsubmit="return validateForm();">
    Username <input type="text" class="text_field" name="username" required> <br>
    First Name <input type="text" class="text_field" name="firstname" required><br>
    Last Name<input type="text" class="text_field" name="lastname" required><br>
    Email<input type="email" class="text_field" name="email" required placeholder="name@example.com"><br>
    Password <input type="password" class="text_field" name="password" required><br>
    Contact Number <input type="tel" class="text_field" name="phonenumber" required pattern="[0-9]{10}" title="Please enter a 10-digit phone number"><br>
    <button class="button" type="submit">Register</button>
  </form>
</body>
</html>
