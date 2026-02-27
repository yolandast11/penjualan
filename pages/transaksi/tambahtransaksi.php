<?php
// Pastikan koneksi terhubung karena file ini ada di dalam folder pages/transaksi/
include "koneksi.php"; 
?>

<style>
    /* CSS untuk membuat tampilan kartu di tengah */
    .form-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .form-title {
        font-weight: bold;
        color: #333;
        margin-bottom: 25px;
        font-size: 24px;
    }
    .btn-proses {
        width: 100%;
        padding: 12px;
        font-weight: bold;
        background-color: #007bff;
        border: none;
        border-radius: 8px;
        margin-top: 10px;
    }
    .btn-proses:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="form-container">
        <h2 class="form-title text-center">Input Transaksi</h2>
        
        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label text-muted">No. Nota</label>
                <input type="text" name="no_nota" class="form-control bg-light" value="TRX-<?php echo date('YmdHis'); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilih Customer</label>
                <select name="id_customer" class="form-select form-control" required>
                    <option value="">-- Pilih Customer --</option>
                    <?php
                    $p = mysqli_query($koneksi, "SELECT * FROM customer");
                    while($dp = mysqli_fetch_array($p)) {
                        echo "<option value='$dp[id_customer]'>$dp[nama_customer]</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Pilih Barang</label>
                <select name="id_barang" class="form-select form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    <?php
                    $b = mysqli_query($koneksi, "SELECT * FROM barang"); 
                    while($db = mysqli_fetch_array($b)) {
                        echo "<option value='$db[id_barang]'>$db[nama_barang] - Rp " . number_format($db['harga'], 0, ',', '.') . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Jumlah Beli</label>
                <input type="number" name="qty" class="form-control" placeholder="Masukkan jumlah..." required min="1" value="1">
            </div>

            <button type="submit" name="simpan_trx" class="btn btn-primary btn-proses text-white">Proses Transaksi</button>
            <div class="text-center mt-3">
                <a href="dashboard.php?page=transaksi.php" class="text-decoration-none text-muted small">Kembali ke Daftar</a>
            </div>
        </form>
    </div>
</div>

<?php
// --- PROSES SIMPAN KE DATABASE ---
if (isset($_POST['simpan_trx'])) {
    $nota = $_POST['no_nota'];
    $tgl  = date('Y-m-d');
    $id_c = $_POST['id_customer'];
    $id_b = $_POST['id_barang'];
    $qty  = $_POST['qty'];

    // Ambil harga dari database
    $cari_harga = mysqli_query($koneksi, "SELECT harga FROM barang WHERE id_barang='$id_b'");
    $h = mysqli_fetch_array($cari_harga);
    $total = $h['harga'] * $qty;

    $input = mysqli_query($koneksi, "INSERT INTO transaksi (no_nota, tgl_transaksi, id_customer, id_barang, qty, total_bayar) 
             VALUES ('$nota', '$tgl', '$id_c', '$id_b', '$qty', '$total')");

    if ($input) {
        echo "<script>alert('Transaksi Berhasil!'); window.location='dashboard.php?page=transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>