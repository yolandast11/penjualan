<?php
include "koneksi.php";

// Ambil ID dari URL
$id = $_GET['id'];

// Query JOIN untuk mengambil data lengkap dari 3 tabel (transaksi, customer, barang)
$sql = "SELECT transaksi.*, customer.nama_customer, customer.alamat, customer.no_hp, barang.nama_barang, barang.harga 
        FROM transaksi 
        JOIN customer ON transaksi.id_customer = customer.id_customer 
        JOIN barang ON transaksi.id_barang = barang.id_barang
        WHERE transaksi.id_transaksi = '$id'";

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Detail Transaksi - <?php echo $data['no_nota']; ?></h4>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Informasi Customer:</h5>
                    <p>
                        <strong>Nama:</strong> <?php echo $data['nama_customer']; ?><br>
                        <strong>No_hp:</strong> <?php echo $data['no_hp']; ?><br>
                        <strong>Alamat:</strong> <?php echo $data['alamat']; ?>
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Waktu Transaksi:</h5>
                    <p><?php echo date('d F Y', strtotime($data['tgl_transaksi'])); ?></p>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nama Barang</th>
                        <th class="text-center">Harga Satuan</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $data['nama_produk']; ?></td>
                        <td class="text-center">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                        <td class="text-center"><?php echo $data['qty']; ?></td>
                        <td class="text-end">Rp <?php echo number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total Bayar</th>
                        <th class="text-end text-primary">Rp <?php echo number_format($data['total_bayar'], 0, ',', '.'); ?></th>
                    </tr>
                </tfoot>
            </table>

            <div class="mt-4">
                <a href="dashboard.php?page=transaksi.php" class="btn btn-secondary">Kembali ke Daftar</a>
                <button onclick="window.print()" class="btn btn-info text-white">Cetak Nota</button>
            </div>
        </div>
    </div>
</div>