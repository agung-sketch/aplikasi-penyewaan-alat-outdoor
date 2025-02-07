<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>HERBAL OUTDOOR</title>
    
</head>


<body id="bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action=""method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-login">
            <input type="submit" name="submit" placeholder="Login" class="btn_login">
        </form>
        <?php
            if(isset($_POST['submit'])){
                include 'db_herbaloutdoor.php';

                $user = $_POST['user'];
                $pass = $_POST['pass'];

                $cek = mysqli_query($conn,"SELECT * FROM login_admin WHERE username ='".$user."' AND password = '".$pass."'");
                if (mysqli_num_rows($cek) > 0) {
                    // Login berhasil, simpan informasi login ke session atau cookie
                    session_start(); // Mulai session (pastikan Anda panggil ini sebelum menyimpan variabel session)
                
                    $_SESSION['username'] = $user; // Simpan username ke dalam session, Anda bisa menyimpan informasi login lainnya juga jika diperlukan
                
                    header("Location: index_admin.php"); // Arahkan pengguna ke halaman home.php
                    exit; // Pastikan keluar dari skrip untuk menghindari eksekusi selanjutnya
                } else {
                    echo 'Login Gagal';
                }
                
            }
        ?>
    </div>

        </body>
</body>