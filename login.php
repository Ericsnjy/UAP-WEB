<?php
@ob_start();
session_start();
if (isset($_POST['proses'])) {
    require 'config.php';

    $user = strip_tags($_POST['user']);
    $pass = strip_tags($_POST['pass']);

    $sql = 'select member.*, login.user, login.pass
                from member inner join login on member.id_member = login.id_member
                where user =? and pass = md5(?)';
    $row = $config->prepare($sql);
    $row->execute(array($user, $pass));
    $jum = $row->rowCount();
    if ($jum > 0) {
        $hasil = $row->fetch();
        $_SESSION['admin'] = $hasil;
        echo '<script>alert("Login Sukses");window.location="index.php"</script>';
    } else {
        echo '<script>alert("Login Gagal");history.go(-1);</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login - Toko AHAY</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #007bff; /* Warna latar belakang biru untuk seluruh halaman */
            color: white; /* Warna tulisan putih untuk seluruh halaman */
            display: flex; /* Mengatur layout flexbox */
            align-items: center; /* Memusatkan secara vertikal */
            justify-content: center; /* Memusatkan secara horizontal */
            height: 100vh; /* Membuat tinggi halaman penuh */
            margin: 0; /* Menghapus margin default */
        }

        .container {
            display: flex; /* Mengatur layout flexbox untuk container */
            width: 100%; /* Mengatur lebar penuh */
            max-width: 1200px; /* Mengatur lebar maksimal */
            height: 100%; /* Mengatur tinggi penuh */
        }

        .welcome-section {
            flex: 1; /* Mengatur bagian kiri untuk mengambil ruang yang tersedia */
            display: flex; /* Mengatur layout flexbox untuk welcome section */
            flex-direction: column; /* Mengatur arah flex ke kolom */
            align-items: center; /* Memusatkan secara horizontal */
            justify-content: center; /* Memusatkan secara vertikal */
            text-align: center; /* Mengatur teks di tengah */
            padding: 20px;
        }

        .welcome-section h1 {
            font-size: 36px; /* Ukuran tulisan besar */
            font-weight: bold; /* Mengatur tulisan tebal */
            margin-bottom: 20px; /* Mengatur jarak bawah tulisan */
        }

        .welcome-section img {
            max-width: 80%; /* Mengatur lebar gambar maksimal */
            height: auto; /* Mengatur tinggi gambar otomatis */
        }

        .login-section {
            flex: 1; /* Mengatur bagian kanan untuk mengambil ruang yang tersedia */
            display: flex; /* Mengatur layout flexbox untuk login section */
            align-items: center; /* Memusatkan secara vertikal */
            justify-content: center; /* Memusatkan secara horizontal */
            padding: 25px;
        }

        .card {
            background-color: white; /* Warna latar belakang putih untuk kartu login */
            color: #333; /* Warna teks hitam untuk kartu login */
            width: 100%; /* Membuat kartu memenuhi lebar kolom */
            height: 100%; /* Membuat kartu memenuhi tinggi kolom */
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .btn-primary {
            background-color: #0056b3; /* Warna tombol biru lebih gelap */
            border: none; /* Menghilangkan border tombol */
        }

        .form-control-user {
            border-radius: 10px; /* Mengatur radius border input form */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Selamat Datang, Toko AHAY</h1>
            <img src="foto.png" alt="Welcome Image"> <!-- Ganti path_to_image.jpg dengan path gambar yang diinginkan -->
        </div>

        <!-- Login Section -->
        <div class="login-section">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h4 class="h4 text-gray-900 mb-4"><b>Login Toko AHAY</b></h4>
                        </div>
                        <form class="form-login" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="user" placeholder="User ID" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="pass" placeholder="Password">
                            </div>
                            <button class="btn btn-primary btn-block" name="proses" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sb-admin/js/sb-admin-2.min.js"></script>
</body>

</html>
