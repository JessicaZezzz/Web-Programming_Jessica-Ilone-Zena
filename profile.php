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
        include "config.php";
        $username = $_SESSION['temp'];
        $sql= "SELECT namaDepan,namaTengah,namaBelakang,tempatLahir, tanggalLahir, nik, wargaNegara,email,noHP, alamat, kodePos, fotoProfil FROM user WHERE username='$username'";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();
        $data1 = $row["namaDepan"];
        $data2 = $row["namaTengah"];
        $data3 = $row["namaBelakang"];
        $data4 = $row["tempatLahir"];
        $data5 = $row["tanggalLahir"];
        $data6 = $row["nik"];
        $data7 = $row["wargaNegara"];
        $data8 = $row["email"];
        $data9 = $row["noHP"];
        $data10 = $row["alamat"];
        $data11 = $row["kodePos"];
        $data12 = $row["fotoProfil"];    
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
                <td><?php echo "<b>".$data1."</b>"?></td>
                <td>Nama Tengah</td>
                <td><?php echo "<b>".$data2."</b>"?></td>
                <td>Nama Belakang</td>
                <td><?php echo "<b>".$data3."</b>"?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><?php echo "<b>".$data4."</b>"?></td>
                <td>Tgl Lahir</td>
                <?php
                    $originalDate = $data5;
                    $newDate = date("d-m-Y", strtotime($originalDate));
                ?>
                <td><?php echo "<b>".$newDate."</b>"?></td>
                <td>NIK</td>
                <td><?php echo "<b>".$data6."</b>"?></td>
            </tr>
            <tr>
                <td>Warga Negara</td>
                <td><?php echo "<b>".$data7."</b>"?></td>
                <td>Email</td>
                <td><?php echo "<b>".$data8."</b>"?></td>
                <td>No HP</td>
                <td><?php echo "<b>0".$data9."</b>"?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><?php echo "<b>".$data10."</b>"?></td>
                <td>Kode Pos</td>
                <td><?php echo "<b>".$data11."</b>"?></td>
                <td>Foto Profil</td>
                <td><?php echo "<img src= 'images/".$data12."'height=100 width=100>"; ?></td>  
            </tr>
        </table>
    </div>
    <div class="edit">
        <a href="editprofile.php">Edit</a>
    </div>
</body>
</html>