<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php include "Login.css" ?>
    </style>
</head>
<body>
    <?php
        session_start();
        include "config.php";
        $ErrorMessage = "";
        if(isset($_POST['login'])){
            $username = mysqli_real_escape_string($connection,$_POST['UsernameLogin']);
            $pass = mysqli_real_escape_string($connection,$_POST['PasswordLogin']);
            $passwords = md5($pass);
            $query = "SELECT * FROM user WHERE username='$username' AND (password1='$passwords' OR password2='$passwords')";
            $results = mysqli_query($connection, $query);
                if(!empty($username) && !empty($pass)){
                    if(mysqli_num_rows($results) == 1){
                        $_SESSION['temp']= $username;
                        header("Location:home.php");
                        echo"Berhasil masuk";
                    }else{
                        $ErrorMessage = "*Username dan Password tidak cocok";
                    }
                }else{
                    $ErrorMessage = "*Username dan Password tidak boleh kosong";
                }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table>
            <caption>Login</caption>
            <tr>
                <td>Username</td>
                <td><input type="text" name="UsernameLogin" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="PasswordLogin" id=""></td>
            </tr>
            <tr>
                <td><div class="error"><?php echo $ErrorMessage?></div></td>
            </tr>
        </table>
        <input type="submit" name="login" value="Login">
        <a href="welcome.php">Kembali</a>
    </form>
</body>
</html>
