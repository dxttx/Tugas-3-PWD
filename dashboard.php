<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV – Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    include 'koneksi.php';

    if (!isset($_SESSION['email'])) {
        header("Location: login.php?error=2");
    }

    $email = $_SESSION['email'];
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($query);
    ?>

    <div class="header">
        <h2>Welcome <?php echo $data['username'] ?> to CGV</h2>
    </div>

    <div class="grid">

    <?php
    $query = mysqli_query($con, "SELECT * FROM films");
    while($data = mysqli_fetch_assoc($query)){
    ?>
        <div class="cardDshbrd">
            <img src="<?=$data['poster']?>" class="poster">
            <div class="deskripsi">
                <h3><?=$data['judul']?></h3>
                <h6><?=$data['genre']?> | <?=$data['durasi']?></h6>
                <p><?=$data['deskripsi']?></p>
                <a href="<?=$data['link']?>" target="_blank"> Search on Google</a>
             </div>
             <div class="harga">
                <h2><?=$data['harga']?></h2>
            </div>
        </div>
    <?php } ?>
        
        <form action="pesan.php">
            <button type="submit" class="Btn">Order Now!</button>
        </form>
    </div>
</body>
</html>