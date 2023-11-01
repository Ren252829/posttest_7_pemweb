<?php
    require "connect.php";

    if(isset($_POST["regis"])){
        $username = strtolower($_POST["username"]);
        $pass = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        if ($pass === $cpassword) {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

            if (mysqli_fetch_assoc($result)){
                echo "
                    <script>
                    alert ('Username telah digunakan');
                    document.location.href = 'regis.php';  
                    </script>";
            } else {
                $sql = "INSERT INTO user VALUES ('', '$username', '$pass')";
                $result = mysqli_query($conn, $sql);

                if (mysqli_affected_rows($conn) > 0) {
                    echo "
                    <script>
                    alert ('Regsitrasi Berhasil');
                    document.location.href = 'login.php';
                    </script>";
                    
                } else {
                    echo "
                    <script>
                    alert ('Regsitrasi Gagal');
                    document.location.href = 'regis.php';
                    </script>";
                }
            }
        } else {
            echo "
                    <script>
                    alert ('Password tidak sama');
                    document.location.href = 'regis.php';
                    </script>";
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <header>
        <h2 class="logo">Renaldi</h2>
        <nav class="navigation">
            <a href="index.html">Home</a>
            <a href="#">Contact</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <button class="btnlogin-popup">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <div class="form-box register">
            <h2>Daftar</h2>
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" placeholder="username" name="username" required>
                    <!-- <label>Username</label> -->
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" placeholder="Password" name="password" required>
                    <!-- <label>Email</label> -->
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" placeholder="Confirm Password" name="cpassword" required>
                    <!-- <label>Password</label> -->
                </div>
                <div class="ingat">
                    <label><input type="checkbox">
                    simpan akun</label>
                </div>
                <button type="submit" class="btn" name="regis">Buat Akun</button>
                <div class="login-register">
                    <p>sudah punya akun? <a href="login.php" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>




    <script src="scriptlogin.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>