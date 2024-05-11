<?php
session_start();

// Pastikan sesi id_user telah diset sebelum melanjutkan
if (!isset($_SESSION['id_user']) || empty($_SESSION['id_user'])) {
    echo "<script>alert('Silakan Login!');window.location='login.php'</script>";
    exit; // Hentikan eksekusi skrip jika sesi id_user tidak tersedia
}

// Simpan id_user dari sesi dalam variabel
$id_user = $_SESSION['id_user'];

include "koneksi.php";

// Variabel untuk menyimpan harga berdasarkan layanan
$harga = "";

// Ambil layanan dari tabel tb_pesanan
$result_layanan = $koneksi->query("SELECT layanan FROM tb_pesanan WHERE id_user = '$id_user' ORDER BY id_pesanan DESC LIMIT 1");

if ($result_layanan->num_rows > 0) {
    $row_layanan = $result_layanan->fetch_assoc();
    $layanan = $row_layanan['layanan'];
    
    // Tentukan harga berdasarkan layanan
    if ($layanan == "Layanan A") {
        $harga = "15.000IDR";
    } elseif ($layanan == "Layanan B") {
        $harga = "30.000IDR";
    } elseif ($layanan == "Layanan C") {
        $harga = "45.000IDR";
    } else {
        // Jika layanan tidak dikenali, atur harga menjadi default atau sesuai kebutuhan
        $harga = "0IDR";
    }
} else {
    // Jika tidak ada layanan yang ditemukan, atur harga menjadi default atau sesuai kebutuhan
    $harga = "0IDR";
}
?>

<title>Upload Bukti</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container">
    <h1>Upload Bukti</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="forms">
            <label for="price">Price</label>
            <input type="text" name="price" value="<?php echo $harga; ?>" readonly>
        </div>
        <div class="forms">
            <label for="images">Payment</label>
            <input type="file" name="images">
        </div>
        <div class="buttons">
            <button class="btn_tambah" type="submit" name="submit">Upload</button>
            <a href="index.php" class="btn_kembali">Kembali</a>
        </div>
    </form>
</div>

<?php
if(isset($_POST['submit'])){
    $image = $_FILES['images']['name'];
    $tmp = $_FILES['images']['tmp_name'];

    // Ambil id_pesanan dari tb_pesanan yang belum memiliki data pembayaran di tbl_bayar
    $result = $koneksi->query("SELECT tb.id_pesanan 
                               FROM tb_pesanan tb 
                               LEFT JOIN tbl_bayar tbay ON tb.id_pesanan = tbay.id_pesanan 
                               WHERE tb.id_user = '$id_user' AND tbay.id_pesanan IS NULL 
                               ORDER BY tb.id_pesanan DESC LIMIT 1");
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_pesanan = $row['id_pesanan'];

        // Simpan data ke tbl_bayar beserta id_pesanan
        $koneksi->query("INSERT INTO tbl_bayar(profile, id_pesanan) VALUES('$image', '$id_pesanan')");

        $location = 'bukti/' . $image;
        move_uploaded_file($tmp, $location);

        echo "<script>
        Swal.fire({
            title: 'Bukti berhasil diunggah!',
            text: 'Silakan tunggu verifikasi admin!',
            icon: 'success'
        }).then(function() {
            window.location='index.php';
        });
        </script>";
    } else {
        echo "<script>alert('Tidak ada pesanan yang perlu dibayar');window.location='index.php'</script>";
    }
}
?>
