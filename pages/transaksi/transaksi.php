<?php
include "koneksi.php";

// Query JOIN untuk mengambil nama customer dari tabel customer
$sql = "SELECT transaksi.*, customer.nama_customer
        FROM transaksi 
        JOIN customer ON transaksi.id_customer = customer.id_customer 
        ORDER BY id_transaksi DESC";
$query = mysqli_query($koneksi, $sql);
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Transaksi</h3>
        <a href="dashboard.php?page=tambahtransaksi.php" class="btn btn-success">+ Tambah Transaksi</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Nota</th>
                <th>Tanggal</th>
                <th>Customer</th>
                <th>Qty</th>
                <th>Total Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_array($query)) { 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['no_nota']; ?></td>
                <td><?php echo $row['tgl_transaksi']; ?></td>
                <td><?php echo $row['nama_customer']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td>Rp <?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>
                <td>
    <a href="dashboard.php?page=detail_transaksi.php&id=<?php echo $row['id_transaksi']; ?>" class="btn btn-dark btn-sm">Detail</a>
    <a href="hapus_transaksi.php?id=<?php echo $row['id_transaksi']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>