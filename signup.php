<?php

include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST["username"]);
    $password = ($_POST["password"]);
    $email = ($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Invalid email format.";
    } else {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            
           
            $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
            $stmt->execute([
                'username' => $username,
                'password' => $hashed_password,
                'email' => $email
            ]);
            
            
            header("Location: login.php");
            exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="/assets/css/signup.css">
</head>
<body>
<!--navbar toevoegen--> 
    <form class="container" action="signup.php" method="post">
        <h2>Sign up for an account!</h2>

        <label for="email"><b> Enter email address</b></label>
        <input type="text" placeholder="Enter Email" id="email" name="email" required>

        <label for="username"><b>Enter Username</b></label>
        <input type="text" placeholder="Enter Username" id="username" name="username" required>
    
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" id="password" name="password" required>

      </div>
    
      <div class="container" style="background-color:#f1f1f1">
        <button type="submit" name="signup" class="loginbtn">Sign up</button>
        <span class="psw">By creating an account, you agree to the <a href="termsOfUse.html">Terms Of Use!</a></span>
        
        <span class="psw">Already have an account? <a href="login.php">Log in!</a></span>
    </div>
    </form>

    <!--footer toevoegen-->
