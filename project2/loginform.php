<h1>Login Page</h1>
<link rel="stylesheet" type="text/css" href="style.css">

<form action="login.php" method="POST" class="form login">
    Username <input type="text" class="text_field" name="username" /><br>
    Password <input type="password" class="text_field" name="password" /><br>
    <button class="button" type="submit">
        Login
    </button>
</form>
<button class="button" onclick="window.location.href='registeruser.php';" type="submit">
        New User, Sign up Here!
    </button>
