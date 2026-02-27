<div class="container-fluid p-4">
    <h3>Tambah Data Customer</h3>
    <hr>
    <form action="" method="POST">
        <div class="mb-3">
            <label>Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. hp</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
        <a href="dashboard.php?page=customer.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php
if (isset($_POST['simpan'])) {
    include "koneksi.php";
    $nama   = $_POST['nama_customer'];
    $telp   = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO customer (nama_customer, no_hp, alamat) VALUES ('$nama', '$no_hp', '$alamat')");

    if ($query) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location='dashboard.php?page=customer.php';</script>";
    }
}
?>