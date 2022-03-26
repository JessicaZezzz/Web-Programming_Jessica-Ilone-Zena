<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include "Login.css" ?>
    </style>
</head>
<body>
    <?php
    session_start();
    $ErrorMessage = "";
    if(isset($_POST['login'])){
        if(isset($_SESSION)){
            if(!empty($_POST['UsernameLogin']) || !empty($_POST['PasswordLogin'])){
                if(($_POST['UsernameLogin'] == $_SESSION["Username"]) && (($_POST['PasswordLogin'] == $_SESSION['Password1'])||($_POST['PasswordLogin'] == $_SESSION['Password2']))){
                    header("Location:home.php");
                }else{
                    $ErrorMessage = "*Username dan Password tidak cocok";
                }
            }else{
                $ErrorMessage = "*Username dan Password tidak boleh kosong";
            }
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
