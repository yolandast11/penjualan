<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $kode   = $_POST['kode_barang'];
    $nama   = $_POST['nama_barang'];
    $harga  = $_POST['harga'];
    $kat    = $_POST['kategori'];
    $stok   = $_POST['stok'];
    $satuan = $_POST['satuan'];

    // Perhatikan: langsung panggil variabel koneksi tanpa label 'mysql:'
    $query = mysqli_query($koneksi, "INSERT INTO barang (kode_barang, nama_barang, harga, kategori, stok, satuan) 
                                     VALUES ('$kode', '$nama', '$harga', '$kat', '$stok', '$satuan')");

    if ($query) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location='dashboard.php?page=produk.php';</script>";
    } else {
        echo "Gagal simpan: " . mysqli_error($koneksi);
    }
}
?>
<style>
/* Card */
.card {
background: #ffffff;
padding: 30px;
border-radius: 10px;
max-width: 720px;
/* INI KUNCINYA */
margin-right: auto;
margin-left: 0;
box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
}
/* Judul */
.card h3 {
margin-bottom: 20px;
border-bottom: 1px solid #ddd;
padding-bottom: 10px;
}
/* Form */
.form-group {
margin-bottom: 15px;
}
label {
    display: block;
font-weight: bold;
margin-bottom: 6px;
}
select,input {
width: 100%;
background-color: white;
padding: 10px;
border-radius: 5px;
border: 1px solid #ccc;
}
input:focus {
outline: none;
border-color: #3498db;
}
/* Tombol */
.btn {
padding: 10px 16px;
border-radius: 5px;
text-decoration: none;
color: white;
border: none;
cursor: pointer;
font-size: 14px;
}
.btn-tambah {
background: #27ae60;
}
.btn-tambah:hover {
background: #219150;
}
.btn-hapus {
background: #c0392b;
}
.btn-hapus:hover {
background: #a93226;
}
</style>
<div class="card">
<h3>Tambah Produk</h3>
<form method="POST">
<label>No</label>
<input type="text" name="No" placeholder="" required>
<div class="form-group">
<label>Kode Barang</label>
<input type="text" name="kode_barang" placeholder="" required>
<label>Nama Barang</label>
<input type="text" name="nama_barang" placeholder="" required>
<label>Kategori</label>
<select name="kategori" required>
<option value="">-- Pilih Kategori --</option>
<option value="Elektronik">Elektronik</option>
<option value="Pakaian">Pakaian</option>
<option value="Makanan">Makanan</option>
<option value="Minuman">Minuman</option>
<option value="Alat Tulis">Alat Tulis</option>
</select>
<label>Harga</label>
<input type="number" name="harga" placeholder="" required>
<label>Stok</label>
<input type="number" name="stok" placeholder="" required>
<label>Satuan</label>
<select name="satuan" required>
<option value="">-- Pilih Satuan --</option>
<option value="pcs">pcs</option>
<option value="box">box</option>
<option value="kg">kg</option>
<option value="liter">liter</option>
</select>
</div>
    <button type="submit" name="simpan" class="btn btn-tambah">Simpan</button>
    <a href="dashboard.php?page=listproducts" class="btn btn-hapus">Batal</a>
</form>
</div>