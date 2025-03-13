<?php 

include "connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $loggedInUser = $stmt->fetch();

        if ($loggedInUser && password_verify($password, $loggedInUser['password'])) {
            $_SESSION["user_id"] = $loggedInUser["user_id"];
            header("Location: index.php");
            exit();
        } else {
            echo 'Invalid email and/or password';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>


<body>
    <form class="container" method="post">
        <h2>Welcome Back!</h2>
        <label for="email"><b>Email address or user name</b></label>
        <input type="text" placeholder="Enter Email" id="email" name="email" required>
    
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" id="password" name="password" required>

        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>    
        
      </div>
    
      <div class="container" style="background-color:#f1f1f1">
      <input class="loginButton" type="submit" id="login" name="login" value="Login">
        <span class="psw">Don't have an account? <a href="signup.php">Sign up!</a></span>
      </div>
    </form>
</body>
</html>