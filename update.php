<?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: login.php?error=2");
        exit;
    }

    include 'koneksi.php';
    $user_id = $_SESSION['user_id'];
    $film_id = $_POST['film_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jumlah = $_POST['jumlah'];
    $cara = $_POST['cara'];
    $kursi = $_POST['kursi'];

    $id = $_POST['id'];

    $query = mysqli_query($con, "UPDATE orders SET user_id = '$user_id', film_id = '$film_id', nama = '$nama', email = '$email',
    jumlah = '$jumlah', kursi = '$kursi', pembayaran = '$cara' WHERE id = '$id'");
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV - Update Order</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tengah">
    <div class="card">
        <h1 style="color: white; margin: 0px;">Update confirmed!</h1>
        <h4 style="color: white; font-weight: 200;">Thank you for using CGV and enjoy the movie</h4>
        <a href="invoice.php?id=<?=$id?>">
            <button type="submit" class="Btn" style="margin:0px">Order Details</button>
        </a>
    </div>
    </div>
</body>
</html>