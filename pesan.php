<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV – Order</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php?error=2");
    exit;
}
?>

<body>
    <div class="tengah">
        <div class="cardPesan">
            <form action="berhasil.php" method="POST">
                <table>
                    <tr>
                        <td><label for="nama">Name</label></td>
                        <td><input type="text" class="inputPesan" id="nama" name="nama" required placeholder="Enter your name"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" class="inputPesan" id="email" name="email" value= <?php echo $_SESSION['email']; ?> readonly></td>
                    </tr>
                    <tr>
                        <td><label for="judul">Movie Title</label></td>
                        <td>
                            <?php
                            include 'koneksi.php';
                            $query = mysqli_query($con, "SELECT id, judul FROM films");
                            ?>
                            <select class="inputPesan" id="film_id" name="film_id" required style="width: 26.5rem; margin-left: 7px;">
                                <option disabled selected>Movie Title</option>
                                <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['judul'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="jumlah">Ticket</label></td>
                        <td><input type="number" class="inputPesan" id="jumlah" name="jumlah" required
                                placeholder="Number of ticket"></td>
                    </tr>
                    <tr>
                        <td><label>Seat Number</label></td>
                        <td>
                            <select class="inputPesan" name="huruf" style="width:13rem; margin-left: 7px" required>
                                <option disabled selected>Row (A-P)</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>F</option>
                                <option>G</option>
                                <option>H</option>
                                <option>I</option>
                                <option>J</option>
                                <option>K</option>
                                <option>L</option>
                                <option>M</option>
                                <option>N</option>
                                <option>O</option>
                                <option>P</option>
                            </select>
                            <select class="inputPesan" name="angka" style="width:13rem;" required>
                                <option disabled selected>Column (1-16)</option>
                                 <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Payment</label></td>
                        <td class="payment">
                            <label><input type="radio" name="cara" value="CASH" required> Cash</label>
                            <label><input type="radio" name="cara" value="QRIS" required> QRIS</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="Btn" style="margin-bottom: 0px">Order</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="reset" class="Btn reset"
                                style="margin: 0px 0px; background: rgba(0, 0, 0, 0.5);">Reset</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</body>
</html>