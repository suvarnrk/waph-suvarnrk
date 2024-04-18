<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Edit User Profile</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript">
    
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
  <h1>Edit User Profile Here!</h1>


  <form name="editProfileForm" action="userupdate.php" method="POST" class="form edit-profile" onsubmit="return validateForm();">
    Username<input type="text" class="text_field" name="username" required> <br>
    First Name<input type="text" class="text_field" name="firstname" required><br>
    last Name<input type="text" class="text_field" name="lastname" required><br>
    Email<input type="email" class="text_field" name="email" required placeholder="name@example.com"><br>
    Contact Number<input type="tel" class="text_field" name="phonenumber" required pattern="[0-9]{10}" title="Please enter a 10-digit phone number"><br>
    Password<input type="password" class="text_field" name="password" required><br>
    
    <button class="button" type="submit">Update</button>
  </form>
</body>
</html>