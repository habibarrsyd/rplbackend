<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>Formulir Rating dan Ulasan</title>
<style>
    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: center;
    }
    .rating input {
        display: none;
    }
    .rating label {
        display: inline-block;
        padding: 5px;
        font-size: 25px;
        color: #ccc;
        cursor: pointer;
    }
    .rating label:hover,
    .rating label:hover ~ label,
    .rating input:checked ~ label {
        color: #f90;
    }
    .review-input {
        display: block;
        margin-top: 10px;
        width: 100%;
        padding: 5px;
    }
    .submit-btn {
        margin-top: 10px;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #f90;
        color: #fff;
        border: none;
        cursor: pointer;
    }
</style>
</head>
<body>

<h2>Beri Rating dan Ulasan</h2>
<?php include "koneksi.php"; ?>
<form action="#" method="post">
    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5"><label for="star5">☆</label>
        <input type="radio" id="star4" name="rating" value="4"><label for="star4">☆</label>
        <input type="radio" id="star3" name="rating" value="3"><label for="star3">☆</label>
        <input type="radio" id="star2" name="rating" value="2"><label for="star2">☆</label>
        <input type="radio" id="star1" name="rating" value="1"><label for="star1">☆</label>
    </div>
    
    <input type="text" id="nama" name="nama" placeholder="Nama" required class="review-input"><br>
    <textarea id="ulasan" name="ulasan" placeholder="Ulasan" required class="review-input"></textarea><br>

    <button name="review" type="submit">Send</button>
</form>
<a href="index.php">Back</a>
<?php
if(isset($_POST['review'])){
    $rating=$_POST['rating'];
    $nama=$_POST['nama'];
    $ulasan=$_POST['ulasan'];

    $query = $koneksi->query("INSERT INTO tb_rating(rating, nama, ulasan)VALUES('$rating','$nama','$ulasan')");
    if($query){
        echo"<script>
        Swal.fire({
            title: 'Terimakasih atas Pendapat Anda!',
            text: 'Kami tunggu di-orderan berikutnya',
            icon: 'success'
        }).then(function() {
            window.location='index.php';
        });
    </script>";
        }else{
            echo "Gagal menyimpan data";
            

    }
}
?>


</body>
</html>
