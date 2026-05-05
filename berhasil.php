<?php
    include 'koneksi.php';
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: login.php?error=2");
    }
    
    $user_id = $_SESSION['user_id'];
    $film_id = $_POST['film_id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $jumlah = $_POST['jumlah'];
    $huruf = $_POST['huruf'];
    $angka = $_POST['angka'];
    $cara = $_POST['cara'];
    $kursi = $huruf.$angka;

    mysqli_query($con, "INSERT INTO orders (user_id, film_id, nama, email, jumlah, kursi, pembayaran)
                        VALUES      ('$user_id', '$film_id', '$nama', '$email', '$jumlah', '$kursi', '$cara')");
    $id = mysqli_insert_id($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV - Completed</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tengah">
    <div class="card">
        <h1 style="color: white; margin: 0px;">Order confirmed!</h1>
        <h4 style="color: white; font-weight: 200;">Thank you for using CGV and enjoy the movie</h4>
        <a href="invoice.php?id=<?=$id?>">
            <button type="submit" class="Btn" style="margin:0px">Order Details</button>
        </a>
    </div>
    </div>
</body>
</html>