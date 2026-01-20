<?php
include "koneksi.php"; // Pastikan file koneksi sudah benar
$no = 1; 
$query = mysqli_query($koneksi, "SELECT * FROM barang"); 
?>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">List Produk</h5>
            <a href="tambah_produk.php" class="btn btn-success btn-sm">+ Tambah Produk</a>
        </div>
        
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kode_barang']; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td>Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td><?php echo $data['satuan']; ?></td>
                    <td class="text-center">
                        <a href="edit.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="hapus.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                 </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>