<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV – Edit Order</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
    include 'koneksi.php';
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: login.php?error=2");
    }

    $id1 = $_GET['id'];

    $query1 = mysqli_query($con, "SELECT o.*, f.judul, f.harga
    FROM orders o
    JOIN films f ON o.film_id = f.id
    WHERE o.id = '$id1'
    ");
    $data1 = mysqli_fetch_assoc($query1);
?>

<body>
    <div class="tengah">
        <div class="cardPesan">
            <form action="update.php" method="POST">
                <table>
                    <input type="hidden" name="id" value="<?=$id1?>">
                    <tr>
                        <td><label for="nama">Name</label></td>
                        <td><input type="text" class="inputPesan" id="nama" name="nama" required placeholder="Enter your name" value="<?php echo $data1['nama']?>"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" class="inputPesan" id="email" name="email" value="<?= $data1['email']; ?>" readonly></td>
                    </tr>
                    <tr>    
                        <td><label for="judul">Movie Title</label></td>
                        <td>
                            <?php
                            include 'koneksi.php';
                            $query = mysqli_query($con, "SELECT id, judul FROM films");
                            ?>
                            <select class="inputPesan" id="film_id" name="film_id" required style="width: 26.5rem; margin-left: 7px;">
                                <option value="<?= $data1['film_id']?>" selected> <?= $data1['judul']?> </option>
                                <?php while ($data = mysqli_fetch_assoc($query)) { 
                                    if($data['id'] == $data1['film_id']) continue; ?>
                                    <option value="<?= $data['id'] ?>"> <?= $data['judul'] ?> </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="jumlah">Ticket</label></td>
                        <td><input type="number" class="inputPesan" id="jumlah" name="jumlah" required
                                placeholder="Number of ticket" value="<?php echo $data1['jumlah']?>"></td>
                    </tr>
                    <tr>
                        <td><label>Seat Number</label></td>
                        <td>
                            <input type="text" class="inputPesan" id="kursi" name="kursi" required value="<?php echo $data1['kursi']?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Payment</label></td>
                        <td class="payment">
                            <?php
                                if($data1['pembayaran'] == "CASH") { ?>
                                    <label><input type="radio" name="cara" value="CASH" checked required> Cash</label>
                                    <label><input type="radio" name="cara" value="QRIS" required> QRIS</label>
                            <?php
                                } else {?>
                                    <label><input type="radio" name="cara" value="CASH" required> Cash</label>
                                    <label><input type="radio" name="cara" value="QRIS" checked required> QRIS</label>
                            <?php } ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="Btn" style="margin-bottom: 0px">Order</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</body>
</html>