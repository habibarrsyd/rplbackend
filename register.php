<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include "koneksi.php"; ?>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"><br>
        
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br>

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama"><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>

        <button name="register" type="submit">Register</button>
        Sudah Memiliki Akun? <a href="login.php">Login!</a><br>
    </form>

    <?php
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];

        // Perbaikan pada query SQL
        $query = $koneksi->query("INSERT INTO tb_users (username, email, nama, password) VALUES ('$username', '$email', '$nama', '$password')");
        if($query){
            // Check if username and password contain the word "admin"
            if (strpos($username, 'admin') !== false && strpos($password, 'admin') !== false) {
                // Set 'posisi' column in the database to "admin"
                $koneksi->query("UPDATE tb_users SET posisi='admin' WHERE username='$username'");
            }
            
            echo "<script>
            Swal.fire({
                title: 'Registrasi Berhasil!',
                text: 'Silakan Login!',
                icon: 'success'
            }).then(function() {
                window.location='login.php';
            });
        </script>";
        }
        else{
            echo "<script>alert('Registrasi Gagal');window.location = 'login.php'; </script>";
        }
    }
    ?>
</body>
</html>
