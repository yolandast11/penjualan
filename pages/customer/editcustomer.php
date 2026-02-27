<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer='$id'");
$d = mysqli_fetch_array($data);
?>

<div class="container-fluid p-4">
    <h3>Edit Data Customer</h3>
    <form action="" method="POST">
        <input type="hidden" name="id_customer" value="<?php echo $d['id_customer']; ?>">
        <div class="mb-3">
            <label>Nama Customer</label>
            <input type="text" name="nama_customer" class="form-control" value="<?php echo $d['nama_customer']; ?>">
        </div>
        <div class="mb-3">
            <label>No. Telp</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo $d['no_hp']; ?>">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?php echo $d['alamat']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Data</button>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $id_p   = $_POST['id_customer'];
    $nama   = $_POST['nama_customer'];
    $telp   = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $query = mysqli_query($koneksi, "UPDATE customer SET nama_customer='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id_customer='$id_p'");

    if ($query) {
        echo "<script>alert('Data Berhasil Diupdate'); window.location='dashboard.php?page=customer.php';</script>";
    }
}
?>