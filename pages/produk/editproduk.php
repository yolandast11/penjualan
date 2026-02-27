<?php
include "koneksi.php";

// 1. Tambahkan pengecekan isset agar tidak error jika ID belum ada di URL
$id = isset($_GET['id']) ? $_GET['id'] : ''; 

// 2. Lakukan query hanya jika ID tidak kosong
$data = null;
if (!empty($id)) {
    $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang = '$id'");
    $data = mysqli_fetch_array($query);
    // ... kode yang tadi (fetch data) ada di sini ...

// Cek apakah tombol Update Data sudah diklik
if (isset($_POST['update'])) {
    // Ambil data dari inputan form
    $kode_baru = $_POST['kode_barang'];
    $nama_baru = $_POST['nama_barang'];
    $kat_baru  = $_POST['kategori'];
    $hrg_baru  = $_POST['harga'];
    $stok_baru = $_POST['stok'];
    $sat_baru  = $_POST['satuan'];

    // Lakukan perintah UPDATE ke database
    // Kita pakai $id (dari $_GET) sebagai kunci barang mana yang diupdate
    $update = mysqli_query($koneksi, "UPDATE barang SET 
                kode_barang = '$kode_baru',
                nama_barang = '$nama_baru',
                kategori    = '$kat_baru',
                harga       = '$hrg_baru',
                stok        = '$stok_baru',
                satuan      = '$sat_baru'
                WHERE kode_barang = '$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='dashboard.php?page=product';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
}

// 3. Jika data tetap tidak ditemukan, beri pesan sederhana agar tidak pusing
if (!$data) {
    echo "<div style='padding:20px; background:#ffcccc; color:red; border-radius:5px;'>
            <b>Error:</b> Data barang dengan ID ($id) tidak ditemukan. 
            Pastikan kamu masuk ke halaman ini melalui tombol 'Edit' di daftar produk.
          </div>";
    exit; // Berhenti di sini agar form di bawah tidak muncul dan bikin error
}
?>

<style>
    /* Style kamu sudah bagus, saya rapikan sedikit agar lebih bersih */
    .card {
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        max-width: 720px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        margin: 20px auto;
        font-family: sans-serif;
    }
    .form-group { margin-bottom: 16px; }
    label { font-weight: bold; display: block; margin-bottom: 6px; }
    input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    .btn-edit { background: rgb(19, 130, 203); color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
    .btn-hapus { background: rgb(226, 29, 7); color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; }
</style>

<div class="card">
    <h3>Edit Produk</h3>
    <form method="post">
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" value="<?= $data['kode_barang'] ?? ''; ?>" required>
            
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?? ''; ?>" required>
            
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= $data['kategori'] ?? ''; ?>">
            
            <label>Harga</label>
            <input type="number" name="harga" value="<?= $data['harga'] ?? 0; ?>" required>
            
            <label>Stok</label>
            <input type="number" name="stok" value="<?= $data['stok'] ?? 0; ?>" required>
            
            <label>Satuan</label>
            <input type="text" name="satuan" value="<?= $data['satuan'] ?? ''; ?>">
        </div>
        
        <button type="submit" name="update" class="btn-edit">Update Data</button>
        <a href="dashboard.php?page=listproducts" class="btn-hapus">Batal</a>
    </form>
</div>