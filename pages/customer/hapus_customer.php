<?php
include "koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM customer WHERE id_customer = '$id'");

if ($query) {
    echo "<script>alert('Data Berhasil Dihapus'); window.location='dashboard.php?page=customer.php';</script>";
}
?>