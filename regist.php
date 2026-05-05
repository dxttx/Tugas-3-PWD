<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV - Regist</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="tengah">
        <div class="cardd">
            <div>
                <?php if($_GET['ket'] == 0) { ?>
                    <h1>Isi email dengan benar!</h1>
                <?php } else { ?>
                    <h1>Fill the field</h1> <?php } ?>
            </div>
            <div>
                <form method="POST">
                    <div>
                        <label for="email1" style="color: #ffffff;">E-mail</label>
                        <input type="text" class="input" id="email1" name="email1" required
                            placeholder="Enter your e-mail">
                    </div>
                    <div>
                        <label for="username1" style="color: #ffffff;">Username</label>
                        <input type="text" class="input" id="username1" name="username1" required
                            placeholder="Enter your username">
                    </div>
                    <div>
                        <label for="password1" style="color: #ffffff;">Password</label>
                        <input type="password" class="input" id="password1" name="password1" required
                            placeholder="Enter your password"> <br>
                    </div>
                    <button type="submit" name="submit" class="Btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php

    if(isset($_POST['submit'])){
    include 'koneksi.php';

    $email = $_POST['email1'];
    $username = $_POST['username1'];
    $password = $_POST['password1'];

    $cekEmail = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($cekEmail) > 0) {
        header("location: regist.php?ket=0");
    } else {
        $query = mysqli_query($con,  "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
        header("location: login.php?error=0");
    }
    }
?>

</html>