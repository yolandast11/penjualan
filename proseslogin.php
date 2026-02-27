<?php
session_start();
include "koneksi.php"; // Menggunakan koneksi.php yang kamu punya

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Sesuaikan nama tabel 'user' dan kolomnya dengan database kamu
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = "login";
        
        // Jika berhasil, lempar ke dashboard.php
        header("location:dashboard.php");
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
    }
}
?>