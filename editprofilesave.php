<?php
        include "config.php";
        $namaDepanError = $namaTengahError = $namaBelakangError = "";
        $tempatLahirError = $tglLahirError = $NIKError = "";
        $NegaraError = $EmailError = $nohpError = "";
        $alamatError = $kodeposError = $fotoError = "";
        $usernameError = $passError1 = $passError2 = "";
        $validasi = 0;

        if(isset($_POST['save'])){
            $namaDepan = mysqli_real_escape_string($connection,$_POST['namaDepan']);
            $namaTengah = mysqli_real_escape_string($connection,$_POST['namaTengah']);
            $namaBelakang = mysqli_real_escape_string($connection,$_POST['namaBelakang']);
            $tempatLahir = mysqli_real_escape_string($connection,$_POST['tempatLahir']);
            $tglLahir = mysqli_real_escape_string($connection,$_POST['tglLahir']);
            $NIK = mysqli_real_escape_string($connection,$_POST['NIK']);
            $email = mysqli_real_escape_string($connection,$_POST['email']);
            $noHP = mysqli_real_escape_string($connection,$_POST['noHP']);
            $alamat = mysqli_real_escape_string($connection,$_POST['alamat']);
            $kodepos = mysqli_real_escape_string($connection,$_POST['kodepos']);
            $username = $_SESSION['temp'];
            $check_email = "SELECT email FROM user WHERE username = '$username' LIMIT 1";
            $check_nik = "SELECT nik FROM user WHERE username = '$username' LIMIT 1";
            $result2 = mysqli_query($connection, $check_email);
            $result3 = mysqli_query($connection, $check_nik);

            if(empty($namaDepan)){
                $namaDepanError = "*Nama Depan tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z]*$/",$namaDepan)){
                    $namaDepanError = "*Hanya huruf yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if(empty($namaTengah)){
                $namaTengahError = "*Nama Tengah tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z]*$/",$namaTengah)){
                    $namaTengahError = "*Hanya huruf yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if(empty($namaBelakang)){
                $namaBelakangError = "*Nama Belakang tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z]*$/",$namaBelakang)){
                    $namaBelakangError = "*Hanya huruf yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if(empty($tempatLahir)){
                $tempatLahirError = "*Tempat Lahir tidak boleh kosong";
            }else {
                if(!preg_match("/^[a-zA-Z ]*$/",$tempatLahir)){
                    $tempatLahirError = "*Hanya huruf dan spasi yang diperbolehkan";
                }else {
                    $validasi += 1;
                }
            }

            if (empty($tglLahir)){
                $tglLahirError = "*Tanggal Lahir tidak boleh kosong";
            } else {
                $validasi += 1;
            }

            if(empty($NIK)){
                $NIKError = "*NIK tidak boleh kosong";
            }else{
                if(strlen($NIK) == 16){
                    $validasi += 1;
                }else{
                    $NIKError = "*NIK harus 16 digit";
                }
            }

            if(empty($_POST['Negara'])) {
                $NegaraError = "*Pilihan tidak boleh kosong ";
            } else {
                $validasi += 1;
                $negara = $_POST['Negara'];
            }

            if(empty($email)){
                $EmailError = "*Email tidak boleh kosong";
            }else{
                if(!preg_match("/^[a-zA-Z0-9@gmail.com]*$/",$email)){
                    $EmailError = "*Email tidak valid";
                }else{
                     $validasi += 1;
                }
            }
            
            if(empty($noHP)){
                $nohpError = "*No HP tidak boleh kosong";
            }else{
                if(strlen($noHP) == 11 || strlen($noHP) == 12){
                    $validasi += 1;
                }else{
                    $nohpError = "*No HP harus 12 digit";
                }
            }

            if(empty($alamat)){
                $alamatError = "*Alamat tidak boleh kosong";
            }else{
                $validasi += 1;
            }

            if(empty($kodepos)){
                $kodeposError = "*Kode Pos tidak boleh kosong";
            }else{
                if(strlen($kodepos) != 5){
                    $kodeposError = "*Kode Pos harus 5 karakter";
                }else{
                    $validasi += 1;
                }
            }

            if($validasi == 11){
                $negara = $_POST['Negara'];
                if(!file_exists($_FILES['file']['tmp_name'])){
                    $query = "UPDATE user SET namaDepan = '$namaDepan', namaTengah = '$namaTengah', namaBelakang = '$namaBelakang', tempatLahir = '$tempatLahir', tanggalLahir = '$tglLahir', nik= '$NIK', wargaNegara = '$negara',  email= '$email', noHP= '$noHP', alamat= '$alamat', kodePos='$kodepos'
                    WHERE username = '$username'";
                    $result=mysqli_query($connection, $query);
                }else{
                    $Image = $_FILES['file']['name'];
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $diUpload = "images/";
                    $terupload = move_uploaded_file($tmp_name, $diUpload.$Image);
                    $query = "UPDATE user SET namaDepan = '$namaDepan', namaTengah = '$namaTengah', namaBelakang = '$namaBelakang', tempatLahir = '$tempatLahir', tanggalLahir = '$tglLahir', nik= '$NIK', wargaNegara = '$negara',  email= '$email', noHP= '$noHP', alamat= '$alamat', kodePos='$kodepos', fotoProfil ='$Image'
                    WHERE username = '$username'";
                    $result=mysqli_query($connection, $query);
                }
                header("Location:profile.php");
            }
        }
    ?>