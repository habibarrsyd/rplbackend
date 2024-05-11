<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php 
    include "koneksi.php";
    session_start();
    ?>
    <form method="post">
        <label for="">Username</label>
        <input type="text" name="username"><br>
        
        <label for="">Password</label>
        <input type="password" name="password"><br>

        <button name="login" type="submit">Login</button>
        Belum Memiliki Akun? <a href="register.php">Register!</a><br>
</form>
    <?php
    if(isset($_POST['login'])){
        $uname=$_POST['username'];
        $pwd=$_POST[ 'password']; 

        $qry = $koneksi->query("SELECT * FROM tb_users WHERE username='$uname' AND password='$pwd'");
        $result = mysqli_num_rows($qry);

        if($result == 1){
            $data = $qry->fetch_assoc();
            $_SESSION['id_user'] = $data['id_user'];
            // echo "<script>alert('Registrasi Berhasil');window.location = 'index.php'; </script>";
            // Check if username contains the word "admin"
            if ($data['posisi']== 'admin') {
                // Redirect to index_admin.php
                echo "<script>
                    Swal.fire({
                        title: 'Login Berhasil!',
                        text: 'Silakan Masuk!',
                        icon: 'success'
                    }).then(function() {
                        window.location='index_admin.php';
                    });
                </script>";
            } else {
                // Redirect to index.php
                echo "<script>
                    Swal.fire({
                        title: 'Login Berhasil!',
                        text: 'Silakan Masuk!',
                        icon: 'success'
                    }).then(function() {
                        window.location='index.php';
                    });
                </script>";
            }
        }
        else{
            echo "<script>
                Swal.fire({
                    title: 'Login Gagal!',
                    text: 'Coba login kembali!',
                    icon: 'error'
                }).then(function() {
                    window.location='login.php';
                });
            </script>";
        }
    }
    ?>
</body>
</html>