<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .user-details {
      margin-bottom: 20px;
    }
    .user-details label {
      font-weight: bold;
    }
    .user-details p {
      margin: 5px 0;
    }
    form {
      text-align: center;
    }
    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User Profile</h1>

    <?php
    // Check if the user is logged in (i.e., session username is set)
    if(isset($_SESSION['username'])) {
        // Assuming you have a function to establish database connection
        require "database.php";

        // Assuming you have a function to retrieve user details from the database
        $userDetails = userprofileview($_SESSION['username']);

        // Check if user details are fetched successfully
        if($userDetails) {
            ?>
            <div class="user-details">
              <label for="username">Username:</label>
              <p><?= htmlentities($userDetails['username']) ?></p>

              <label for="firstname">First Name:</label>
              <p><?= htmlentities($userDetails['firstname']) ?></p>

              <label for="lastname">Last Name:</label>
              <p><?= htmlentities($userDetails['lastname']) ?></p>

              <label for="email">Email:</label>
              <p><?= htmlentities($userDetails['email']) ?></p>

              <label for="phonenumber">Contact:</label>
              <p><?= htmlentities($userDetails['phonenumber']) ?></p>
            </div>
            <?php
        } else {
            // User details not found in the database
            echo "<p>User details not found.</p>";
        }
    } else {
        // User is not logged in
        echo "<p>User is not logged in.</p>";
    }
    ?>

    <form action="login.php" method="GET">
      <button type="submit">Back</button>
    </form>
  </div>
</body>
</html>
