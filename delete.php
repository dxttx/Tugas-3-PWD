<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CGV - Cancel Order</title>
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

    mysqli_query($con, "DELETE FROM orders WHERE id='$id'");
    ?>

    <div class="tengah">
        <div class="cardInvo" style="color: white;">
            <h1>Order Canceled Successfully</h1>
            <form action="dashboard.php">
                <button type="submit" class="Btn" style="width: 40rem;">Back to Dashboard</button>
            </form>
        </div>  
    </div>
</body>
</html>