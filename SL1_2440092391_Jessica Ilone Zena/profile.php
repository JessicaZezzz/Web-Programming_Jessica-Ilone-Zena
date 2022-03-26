<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        <?php include "profile.css" ?>
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
    <h1>Profil Pribadi</h1>
    <div class="profile">
        <table>
            <tr>
                <td>Nama Depan</td>
                <td><?php echo "<b>".$_SESSION["NamaDepan"]."</b>"?></td>
                <td>Nama Tengah</td>
                <td><?php echo "<b>".$_SESSION["NamaTengah"]."</b>"?></td>
                <td>Nama Belakang</td>
                <td><?php echo "<b>".$_SESSION["NamaBelakang"]."</b>"?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><?php echo "<b>".$_SESSION["TempatLahir"]."</b>"?></td>
                <td>Tgl Lahir</td>
                <?php
                    $originalDate = $_SESSION["TglLahir"];
                    $newDate = date("d-m-Y", strtotime($originalDate));
                ?>
                <td><?php echo "<b>".$newDate."</b>"?></td>
                <td>NIK</td>
                <td><?php echo "<b>".$_SESSION["Nik"]."</b>"?></td>
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td><?php echo "<b>".$_SESSION["WargaNegara"]."</b>"?></td>
                <td>Email</td>
                <td><?php echo "<b>".$_SESSION["Email"]."</b>"?></td>
                <td>No HP</td>
                <td><?php echo "<b>".$_SESSION["nohp"]."</b>"?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo "<b>".$_SESSION["Alamat"]."</b>"?></td>
                <td>Kode Pos</td>
                <td><?php echo "<b>".$_SESSION["KodePos"]."</b>"?></td>
                <td>Foto Profil</td>
                <?php $temp = $_SESSION['file'];?>
                <td><?php echo "<img src= 'images/".$temp."'height=100 width=100>"; ?></td>  
            </tr>
        </table>
    </div>
</body>
</html>