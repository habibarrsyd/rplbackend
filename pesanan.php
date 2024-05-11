<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulir Pemesanan</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include "koneksi.php"; ?>

<h2>Formulir Pemesanan</h2>

<form action="#" method="post">
  <label for="nama">Nama:</label><br>
  <input type="text" id="nama" name="nama"><br><br>

  <label for="no_hp">No HP:</label><br>
  <input type="text" id="no_hp" name="no_hp"><br><br>

  <label for="jenis_kendaraan">Jenis Kendaraan:</label><br>
  <select id="jenis_kendaraan" name="jenis_kendaraan">
    <option value="Mobil">Mobil</option>
    <option value="Motor">Motor</option>
  </select><br><br>

  <label for="jenis_layanan">Jenis Layanan:</label><br>
  <select id="jenis_layanan" name="jenis_layanan">
    <option value="Layanan A">Servis</option>
    <option value="Layanan B">Cuci</option>
    <option value="Layanan C">Servis dan Cuci</option>
  </select><br><br>

  <label for="waktu">Pilih Tanggal:</label><br>
  <input type="date" id="waktu" name="waktu"><br><br>

  <label for="waktu">Pilih Waktu:</label><br>
    <input type="time" id="waktu" name="jam"><br><br>

  <label for="jumlah_kendaraan">Jumlah Kendaraan:</label><br>
  <select id="jumlah_kendaraan" name="jumlah_kendaraan">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select><br><br>

  <button name="buat_pesanan" type="submit">Buat Pesanan</button>
  <a href="index.php">Back</a>
</form>
<?php
session_start();

// Pastikan sesi id_user telah diset sebelum melanjutkan
if (!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])) {
    echo "<script>alert('Silakan Login!');window.location='login.php'</script>";
    exit; // Hentikan eksekusi skrip jika sesi id_user tidak tersedia
}

// Simpan id_user dari sesi dalam variabel
$id_user = $_SESSION['id_user'];

// Lanjutkan dengan koneksi ke database
include "koneksi.php";

if (isset($_POST['buat_pesanan'])) {
    $nama = $_POST['nama'];
    $no = $_POST['no_hp'];
    $kendaraan = $_POST['jenis_kendaraan'];
    $layanan = $_POST['jenis_layanan'];
    $waktu = $_POST['waktu'];
    $jam = $_POST['jam'];
    $jumlah = $_POST['jumlah_kendaraan'];
    

    // Proses database
    $query = $koneksi->query("INSERT INTO tb_pesanan (id_user, nama, no, kendaraan, layanan, waktu, jam, jumlah) VALUES ('$id_user', '$nama', '$no', '$kendaraan', '$layanan', '$waktu', '$jam', '$jumlah')");
if ($query) {
    echo "<script>
        Swal.fire({
            title: 'Pesanan Berhasil dibuat!',
            text: 'Silakan cek pesanan Anda.',
            icon: 'success'
        }).then(function() {
            window.location='barubayar.php';
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Maaf, Pesanan Gagal dibuat!',
            text: 'Silakan coba lagi.',
            icon: 'error'
        }).then(function() {
            window.location='pesanan.php';
        });
    </script>";
}
}
?>

