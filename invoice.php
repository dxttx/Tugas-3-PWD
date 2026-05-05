<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV - Invoice</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
    session_start();
    include 'koneksi.php';

    if (!isset($_SESSION['email'])) {
        header("Location: login.php?error=2");
    }

    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT o.*, f.judul, f.harga FROM orders o JOIN films f ON o.film_id = f.id
    WHERE o.id = '$id' ");
    $data = mysqli_fetch_assoc($query);

    $harga = $data['harga'];
    $total = $harga * $data['jumlah'];

    $isi = [
        "Nama" => $data['nama'],
        "Email" => $data['email'],
        "Film" => $data['judul'],
        "Jumlah Tiket" => $data['jumlah'],
        "Kursi" => $data['kursi'],
        "Metode Pembayaran" => $data['pembayaran'],
        "Waktu Pembelian" => $data['waktu'],
        "Harga per Tiket" => "Rp " . $data['harga'],
        "Total Bayar" => "Rp " . $total
    ];
    ?>

    <div class="header">
        <a href="logout.php">
            <h2 style="color:white;">Logout</h2>
        </a>
    </div>

    <div class="tengah">
        <div class="cardInvo" style="color: white;">
            <h1>Movie Ticket Order Invoice</h1>

            <table class="invo">
                <?php foreach($isi as $nama => $isinya): ?>
                    <tr <?php if($nama == "Total Bayar") echo 'class="total"'; ?>>
                        <td><?php echo $nama; ?></td>
                        <td style="text-align:right;">:</td>
                        <td><?php echo $isinya; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <div class="editsmdelete">
            <a href="edit.php?id=<?=$id?>" style="margin: 1rem 0.5rem 0rem 1rem;">
                <button type="submit" class="editBtn">Edit Order</button>
            </a>
            <a href="delete.php?id=<?=$id?>" style="margin: 1rem 0.5rem 0rem 1rem;">
                <button type="submit" class="editBtn">Cancel Order</button>
            </a>
            </div>

            <form action="login.php">
                <button type="submit" class="Btn" style="width: 40rem;">Order Again</button>
            </form>
        </div>  
    </div>
</body>
</html>