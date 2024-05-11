<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<h1>Data Pemesanan</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nomor HP</th>
        <th>Kendaraan</th>
        <th>Jenis Layanan</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Jumlah Kendaraan</th>
        <th>Bayar</th>
        <th>Kode Antrian</th>
        <th>Verifikasi</th>
        <th>Aksi</th>
    </tr>
    <?php
        
    include "koneksi.php";
    $no = 1;
    $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_pesanan LEFT JOIN tbl_bayar ON tb_pesanan.id_pesanan = tbl_bayar.id_pesanan ");

    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama]</td>
            <td>$tampil[no]</td>
            <td>$tampil[kendaraan]</td>
            <td>$tampil[layanan]</td>
            <td>$tampil[waktu]</td>
            <td>$tampil[jam]</td>
            <td>$tampil[jumlah]</td>
            <td>$tampil[profile]</td>
            <td>$tampil[verifikasi]</td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='id_pesanan' value='{$tampil["id_pesanan"]}'>
                    <input type='text' name='verifikasi' value='{$tampil["verifikasi"]}'>
                    <input type='submit' value='Submit' name='proses'>
                </form>
            </td>
            <td>
                <form method='post' action=''>
                    <input type='hidden' name='id_pesanan' value='{$tampil["id_pesanan"]}'>
                    <input type='submit' value='Delete' name='delete'>
                </form>
            </td>
        </tr>";
        $no++;
    }
    
    ?>
</table>
<?php
// Form pemrosesan di luar tabel
if (isset($_POST['proses'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $verifikasi = $_POST['verifikasi'];
    
    // Pastikan verifikasi tidak kosong sebelum menyimpan ke database
    if (!empty($verifikasi)) {
        // Lakukan pembaruan data verifikasi
        $update_query = "UPDATE tb_pesanan SET verifikasi='$verifikasi' WHERE id_pesanan='$id_pesanan'";
        if (mysqli_query($koneksi, $update_query)) {
            echo "<script>
            Swal.fire({
                title: 'Pesanan Berhasil dibuat!',
                text: 'Silakan cek pesanan Anda.',
                icon: 'success'
            }).then(function() {
                window.location='index_admin.php';
            });
            </script>";
        }
    }
} elseif (isset($_POST['delete'])) {
    // Proses penghapusan pesanan
    $id_pesanan = $_POST['id_pesanan'];
    $delete_query_tb_bayar = "DELETE FROM tbl_bayar WHERE id_pesanan='$id_pesanan'";
    $delete_query_tb_pesanan = "DELETE FROM tb_pesanan WHERE id_pesanan='$id_pesanan'";
    
    if (mysqli_query($koneksi, $delete_query_tb_bayar) && mysqli_query($koneksi, $delete_query_tb_pesanan)) {
        echo "<script>
            Swal.fire({
                title: 'Pesanan Berhasil dihapus!',
                text: 'Pesanan telah dihapus dari database.',
                icon: 'success'
            }).then(function() {
                window.location='index_admin.php';
            });
            </script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<a href="index_admin.php">Back</a>
