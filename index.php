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
<h1>HAI <?= $nama_pengguna;?> Selamat Datang </h1>
<a href="logout.php">logout</a>
<a href="layanan.php">layanan</a>
<a href="pesanan.php">pesanan</a>
<a href="rating.php">rating</a>

<a href="cobapesan.php">Lacak Pesanan</a>

<h2> APA KATA MEREKA?</h2>

<form method="post" action=""> <!-- Form di sekitar tabel -->
    <table border="0.2">
        <tr>
            <th>User</th>
            <th>Rating</th>
            <th>Ulasan</th>
        
        </tr>
        <!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styleindex.css">

</head>
<body>
    <div class="review">
        <div class="rating">⭐⭐⭐⭐⭐</div>
        <div class="user">E**a</div>
        <p>pesanan sesuai 🔥</p>
        
        
</body>
</html>
<?php
include "koneksi.php";
$takedata = mysqli_query($koneksi, "SELECT * FROM tb_rating");
while ($tampil = mysqli_fetch_array($takedata)) {
    echo "<tr>";
    echo "<td>$tampil[nama]</td>";
    echo "<td>";
    // Menampilkan logo bintang sesuai dengan rating
    $rating = intval($tampil['rating']); // Konversi rating ke tipe integer
    for ($i = 0; $i < $rating; $i++) {
        echo "⭐"; // Menampilkan bintang sesuai rating
    }
    echo "</td>";
    echo "<td>$tampil[ulasan]</td>";
    echo "</tr>";
}
?>

