<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard POLGANMART</title>
<style>
body {
margin: 0;
font-family: Arial;
background: #f4f4f4;
}
/* Sidebar */
.sidebar {
width: 220px;
height: 100vh;
background: #2c3e50;
color: white;
position: fixed;
top: 0;
left: 0;
}
.sidebar h2 {
text-align: center;
padding: 20px 0;
border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}
.sidebar a {
display: block;
color: white;
padding: 12px 20px;
text-decoration: none;
}
.sidebar a:hover {
background: #34495e;
}
/* Header */
.header {
height: 60px;
background: white;
padding: 10px 20px;
margin-left: 220px;
display: flex;
justify-content: flex-end;
align-items: center;
border-bottom: 1px solid #ddd;
}
.profile-btn {
cursor: pointer;
padding: 8px 15px;
border-radius: 20px;
background: #3498db;
color: white;
}
/* Dropdown */
.dropdown {
position: relative;
display: inline-block;
}
.dropdown-content {
display: none;
position: absolute;
right: 0;
background: white;
min-width: 150px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
border-radius: 5px;
}
.dropdown-content a {
display: block;
padding: 10px;
text-decoration: none;
color: #333;
}
.dropdown-content a:hover {
background: #f0f0f0;
}
/* Content */
.content {
margin-left: 220px;
padding: 20px;
}
</style>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="sidebar">
<h2>Dashboard</h2>
<a href="dashboard.php">Home</a>
<a href="dashboard.php?page=product">List Produk</a>
<a href="dashboard.php?page=customer">Customer</a>
<a href="dashboard.php?page=transaksi">Transaksi</a>
<a href="dashboard.php?page=laporan">Laporan</a>
</div>
<div class="header">
<div class="dropdown">
<div class="profile-btn" onclick="toggleMenu()">Profile ▾</div>
<div class="dropdown-content" id="profileMenu">
<a href="dashboard.php?page=profile">My Profile</a>
<a href="dashboard.php?page=logout">Logout</a>
<a href="dashboard.php?page=tambahproduk.php" class="btn btn-success btn-sm">+ Tambah Produk</a>
</div>
</div>
</div>
<div class="content">
<?php
// Contoh di dalam dashboard.php
if(isset($_GET['page'])){
    $page = $_GET['page'];

    switch ($page) {
        case 'product':
            include "pages/produk.php"; // Tambahkan nama folder 'pages/'
            break;
            
        case 'tambahproduk.php': 
            include "pages/tambahproduk.php"; // Arahkan ke folder pages
            break;

            case 'editproduk.php': 
                include "pages/editproduk.php"; // Arahkan ke folder pages
                break;

                case 'hapusproduk.php': 
                    include "pages/hapusproduk.php"; // Arahkan ke folder pages
                    break;
                    
        default:
            include "pages/produk.php"; // Halaman awal dashboard
            break;
    }
} else {
    // Tampilan default jika variabel 'page' tidak ada di URL
    echo "<h3>Selamat Datang di Dashboard</h3>";
}
?>
</div>
<script>
function toggleMenu() {
var menu = document.getElementById("profileMenu");
menu.style.display = (menu.style.display === "block") ? "none" : "block";
}
// Menutup dropdown jika klik di luar
window.onclick = function(event) {
if (!event.target.matches('.profile-btn')) {
document.getElementById("profileMenu").style.display = "none";
}
}
</script>
</body>
</html>
