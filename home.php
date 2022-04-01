<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        <?php include "home.css" ?>
    </style>
</head>
<body>
    <?php 
        session_start();
    ?>    
    <div class="navbar">
        <div class="temp1">
            Aplikasi Pengelolaan Keuangan
        </div>
        <div class="temp2">
            <a href="home.php">Home</a>
        </div>
        <div class="temp3">
            <a href="profile.php">Profile</a>
        </div>
        <div class="temp4">
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="content">
        <?php
        include "config.php";
            $username = $_SESSION['temp'];
            $sql= "SELECT namaDepan,namaTengah,namaBelakang FROM user WHERE username='$username'";
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            echo "Halo <b>".$row["namaDepan"]. " ". $row["namaTengah"]. " " . $row["namaBelakang"]. "</b>, Selamat datang di Aplikasi Pengelolaan Keuangan.";
        ?>
    </div>
</body>
</html>