<?php
include "koneksi.php"; // Pastikan file koneksi sudah benar

$query = mysqli_query($koneksi, "SELECT * FROM customer ORDER BY id_customer DESC");
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Customer</h3>
        <a href="dashboard.php?page=tambahcustomer.php&group=customer.php" class="btn btn-success">+ Tambah Customer</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>No_hp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($data = mysqli_fetch_array($query)) { 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_customer']; ?></td>
                <td><?php echo $data['no_hp']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                <a href="dashboard.php?page=editcustomer.php&id=<?php echo $d['id_customer']; ?>" class="btn btn-primary">Edit</a>
                    <a href="hapus_customer.php?id=<?php echo $d['id_customer']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>