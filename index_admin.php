<?php
session_start();
if(!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])){
    echo"<script>alert('Silahkan Login!');window.location='login.php'</script>";
}
?>

<body>
<?php
include "koneksi.php"; //koneksi ke database
$id_user = $_SESSION['id_user']; //ambil ID pengguna dari sesi

// Query untuk mengambil data pengguna berdasarkan ID pengguna
$query = $koneksi->query("SELECT * FROM tb_users WHERE id_user='$id_user'");
$data_user = $query->fetch_assoc(); //ambil data pengguna dari hasil query

// Mengakses data nama pengguna
$nama_pengguna = $data_user['nama'];

// Sekarang Anda bisa menggunakan $nama_pengguna dalam halaman HTML
?>
<body>
<h1>HAI <?= $nama_pengguna;?> Selamat Datang </h1>
<a href="logout.php">logout</a>
<a href="list_pesanan.php">cek pesanan</a>
