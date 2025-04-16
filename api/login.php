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

        header("Content-Type: application/json");
        if ($loggedInUser && password_verify($password, $loggedInUser['password'])) {
            $_SESSION["user_id"] = $loggedInUser["user_id"];
            echo json_encode(['status' => 'success', 'user_id' => $loggedInUser["user_id"]]);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
            exit();
        }
    }
}
?>