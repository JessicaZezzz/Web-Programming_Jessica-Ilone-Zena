<?php
        session_start();
        include "config.php";
        $namaDepanError = $namaTengahError = $namaBelakangError = "";
        $tempatLahirError = $tglLahirError = $NIKError = "";
        $NegaraError = $EmailError = $nohpError = "";
        $alamatError = $kodeposError = $fotoError = "";
        $usernameError = $passError1 = $passError2 = "";
        $validasi = 0;

        if(isset($_POST['submit'])){
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
            $username = mysqli_real_escape_string($connection,$_POST['username']);
            $password = mysqli_real_escape_string($connection,$_POST['password1']);
            $password2 = mysqli_real_escape_string($connection,$_POST['password2']);

            $check_username = "SELECT * FROM user WHERE username='$username' LIMIT 1";
            $check_email = "SELECT * FROM user WHERE email='$email' LIMIT 1";
            $check_nik = "SELECT * FROM user WHERE nik='$NIK' LIMIT 1";
            $result1 = mysqli_query($connection, $check_username);
            $result2 = mysqli_query($connection, $check_email);
            $result3 = mysqli_query($connection, $check_nik);
            $user1 = mysqli_fetch_assoc($result1);
            $user2 = mysqli_fetch_assoc($result2);
            $user3 = mysqli_fetch_assoc($result3);

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
                    if($user3['nik'] === $NIK){
                        $NIKError = "*NIK sudah terdaftar";
                    }else{
                        $validasi += 1;
                    }
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
                     if($user2['email'] === $email){
                        $EmailError = "*Email sudah terdaftar";
                    }else{
                        $validasi += 1;
                    }
                }
            }
            
            if(empty($noHP)){
                $nohpError = "*No HP tidak boleh kosong";
            }else{
                if(strlen($noHP) == 12){
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

            if(!file_exists($_FILES['file']['tmp_name'])){
                $fotoError = "*File tidak boleh kosong";
            }else{
                $validasi += 1;
            }



            if(empty($username)){
                $usernameError = "*Username tidak boleh kosong";
            }else{
                if(strlen($username)>5){
                    if($user1['username'] === $username){
                        $usernameError = "*Username sudah ada";
                    }else{
                        $validasi += 1;
                    }
                }else{
                    $usernameError = "*Username harus lebih dari 5 karakter";
                }
            }

            if(empty($password)){
                $passError1 = "*Password tidak boleh kosong";
            }else{
                if(strlen($password)>6 && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$%^&]).*$/',$password)){
                    $validasi += 1;
                }else{
                    $passError1 = "*Password harus terdiri dari huruf besar, huruf kecil, angka, dan spesial karakter";
                }
            }

            if(empty($password2)){
                $passError2 = "*Password tidak boleh kosong";
            }else{
                if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',$password2)){
                    if($password != $password2){
                        $validasi += 1;
                    }else{
                        $passError2 = "*Password tidak boleh sama dengan Password 1";
                    }
                }else{
                    $passError2 = "*Password harus terdiri dari huruf besar, huruf kecil, angka, dan spesial karakter";
                }
            }

            if($validasi == 15){
                // $_SESSION["NamaDepan"] = $namaDepan;
                // $_SESSION["NamaTengah"] = $namaTengah;
                // $_SESSION["NamaBelakang"] = $namaBelakang;
                // $_SESSION["TempatLahir"] = $tempatLahir;
                // $_SESSION["TglLahir"] = $tglLahir;
                // $_SESSION["Nik"] = $NIK;
                // $_SESSION["Email"] = $email;
                // $_SESSION["nohp"] = $noHP;
                // $_SESSION["Alamat"] = $alamat;
                // $_SESSION["KodePos"] = $kodepos;
                // $_SESSION["Username"] = $username;
                // $_SESSION["Password1"] = $password;
                // $_SESSION["Password2"] = $password2;
                // $_SESSION["WargaNegara"] = $_POST['Negara'];
                // $_SESSION['file'] = $_FILES["file"]["name"];
                $Image = $_FILES['file']['name'];
                $tmp_name = $_FILES['file']['tmp_name'];
                $diUpload = "images/";
                $terupload = move_uploaded_file($tmp_name, $diUpload.$Image);
                $password_1 = md5($password);
                $password_2 = md5($password2);
                $negara = $_POST['Negara'];
                $query = "INSERT INTO user (namaDepan, namaTengah, namaBelakang, tempatLahir, tanggalLahir, nik, wargaNegara, email, noHP, alamat, kodePos, fotoProfil, username, password1, password2) 
                        VALUES('$namaDepan', '$namaTengah', '$namaBelakang', '$tempatLahir', '$tglLahir', '$NIK', '$negara', '$email', '$noHP', '$alamat', '$kodepos', '$Image', '$username', '$password_1', '$password_2')";
                mysqli_query($connection, $query);
                header("Location:welcome.php");
            }
        }
    ?>