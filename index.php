<?php 
include "connection.php";
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
    exit;
}
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>
<body class="home-body">
    <header class="home-header">
        <div class="wrapper">
            <div class="home-logo">
                <a href="index.php">Forum</a>
            </div>
            <nav class="home-nav">
                <a href="#">Mijn vrienden</a>
                <a href="profile.php?id=<?= $_SESSION['user_id'] ?>">Profiel</a>
            </nav>
            <div class="top-right-buttons">
                <a href="logout.php">logout</a>
            </div>
        </div>
    </header>

    <div class="banner">
        <div class="wrapper">
            <h2>Posts</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, nostrum. Nemo ipsa omnis 
               illum vitae, laboriosam id iusto odio. Consequatur dolores quae culpa sequi earum officiis eveniet 
               ullam dolor accusantium?</p>
        </div>
    </div>