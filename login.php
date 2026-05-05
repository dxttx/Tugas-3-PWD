<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="tengah">
        <div class="card">

            <h1 style="margin-bottom: 0.5rem">Welcome to CGV!</h1>

            <?php if ($_GET['error'] == 1) { ?>
                <h4 style="margin: 0px;">Password atau username salah!</h4>
            <?php } elseif ($_GET['error'] == 2) { ?>
                <h4 style="margin: 0px;">Login terlebih dahulu!</h4> 
            <?php } elseif ($_GET['error'] == 0) { ?>
                <h4 style="margin: 0px;">Silahkan masukkan email dan password kembali</h4> <?php } ?>

            <div>
                <form method="post">
                    <div>
                        <label for="email" style="color: #ffffff;">Email</label>
                        <input type="email" class="input" id="email" name="email" required
                            placeholder="Enter your email">
                    </div>
                    <div>
                        <label for="password" style="color: #ffffff;">Password</label>
                        <input type="password" class="input" id="password" name="password" required
                            placeholder="Enter your password"> <br>
                    </div>
                    <button type="submit" name="login" class="Btn">Login</button>
                    <center><a href="regist.php?ket=1">Buat akun disini</a></center>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
            $data = mysqli_fetch_assoc($query);

            if ($data && $data['password'] == $password) {
                $_SESSION['email'] = $data['email'];
                $_SESSION['nama'] = $data['username'];
                $_SESSION['user_id'] = $data['id'];
                
                header("location: dashboard.php");
            } else
                header("location: login.php?error=1");
        }
        ?>
</body>
</html>