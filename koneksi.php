<?php
    $con = mysqli_connect("localhost", "root", "", "login");
    if(!$con) {
        die("Koneksi gagal".mysqli_error($con));
    }
?>