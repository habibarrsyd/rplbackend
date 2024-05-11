<h1>Data Pemesanan</h1>
<a href="cobapesan.php">Back</a>
<table border="1">
    <?php
    session_start();
    include "koneksi.php";
    $id_user = $_SESSION['id_user'];
    
    // Mengambil id_pesanan dari parameter URL
    $id_pesanan = $_GET['id_pesanan'];

    // Ubah query untuk melakukan JOIN dengan menggunakan id_pesanan sebagai kunci relasi
    $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_pesanan LEFT JOIN tbl_bayar ON tb_pesanan.id_pesanan = tbl_bayar.id_pesanan WHERE tb_pesanan.id_user='$id_user' AND tb_pesanan.id_pesanan='$id_pesanan'");
    $tampil = mysqli_fetch_array($ambildata); // Ambil satu baris data saja
    if ($tampil) {
        echo "
        
        <tr>
            <td><strong>Nama</strong>:</td>
            <td>$tampil[nama]</td>
        </tr>
        <tr>
            <td><strong>Nomor HP</strong>:</td>
            <td>$tampil[no]</td>
        </tr>
        <tr>
            <td><strong>Kendaraan</strong>:</td>
            <td>$tampil[kendaraan]</td>
        </tr>
        <tr>
            <td><strong>Jumlah Kendaraan</strong>:</td>
            <td>$tampil[jumlah]</td>
        </tr>
        <tr>
            <td><strong>Jenis Layanan</strong>:</td>
            <td>$tampil[layanan]</td>
        </tr>
        <tr>
            <td><strong>Price</strong>:</td>
            <td>";
        $layanan = $tampil['layanan']; // Simpan layanan ke dalam variabel $layanan
        if ($layanan == 'Layanan A') {
            echo '15.000IDR';
        } elseif ($layanan == 'Layanan B') {
            echo '30.000IDR';
        } else {
            echo '45.000IDR';
        }
        echo "</td>
        <tr>
            <td><strong>Day/Time</strong>:</td>
            <td>$tampil[waktu]<br>$tampil[jam]</td>
        </tr>
        
        <tr>
            <td><strong>Bayar</strong>:</td>
            <td>$tampil[profile]</td>
        </tr>
        <tr>
            <td><strong>Verifikasi</strong>:</td>
            <td>$tampil[verifikasi]</td>
        </tr>";
    } else {
        echo "<tr><td colspan='2'>Tidak ada pesanan untuk ditampilkan.</td></tr>";
    }
    
    ?>
</table>
