<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon-32x32.png">

    <!-- Loader -->
    <link rel="stylesheet" href="assets/css/pace.min.css">
    <script src="assets/js/pace.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Icons CSS -->
    <link rel="stylesheet" href="assets/css/icons.css">

    <!-- App CSS -->
    <link rel="stylesheet" href="assets/css/app.css">

</head>
<body>
    <div class="wrapper">
        <div class="container align-items-center justify-content-center mt-5">
            <div class="row">
                <div class="col-8 col-lg-10 mx-auto">
                    <div class="card radius-15">
                        <div class="card-header text-center">
                            <h4 class="mt-4 font-weight-bold">Reset Lupa Password</h4>
                        </div>
                        <div class="card-body p-md-5">
                            <form method="post">

                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="password" class="form-control <?php if (isset($_GET['errorpassword'])) { echo 'is-invalid'; } ?>" 
                                           name="password_baru" placeholder="Ketikkan Password Baru">
                                    <?php if (isset($_GET['errorpassword'])) { ?>
                                        <span class="invalid-feedback"><?php echo $_GET['errorpassword']; ?></span>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password</label>
                                    <input type="password" class="form-control <?php if (isset($_GET['errorkonfirmasipassword'])) { echo 'is-invalid'; } ?>" 
                                           name="konfirmasi_password" placeholder="Ketikkan Konfirmasi Password">
                                    <?php if (isset($_GET['errorkonfirmasipassword'])) { ?>
                                        <span class="invalid-feedback"><?php echo $_GET['errorkonfirmasipassword']; ?></span>
                                    <?php } ?>
                                </div>

                                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p>Belum punya akun? <a href="register.php">Daftar dulu sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

    <!-- jQuery, Popper -->
    <script src="assets/js/jquery-min.js"></script>
</body>
</html>

<?php
if (isset($_POST['ubah'])) {
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    $username = $_GET['username'];

    if (empty($password_baru) || empty($konfirmasi_password)) {
        echo "<script> location.href='ubahpassword.php?username=".$username."&errorkonfirmasipassword=Kolom ini wajib diisi!'; </script>";
    } elseif ($password_baru != $konfirmasi_password) {
        echo "<script> location.href='ubahpassword.php?username=".$username."&errorkonfirmasipassword=Password anda harus sama!'; </script>";
    } else {
        $query = mysqli_query($koneksi, "UPDATE masyarakat SET password = '$password_baru' WHERE username = '$username'");

        if ($query) {
            echo "<script> alert('Password Anda berhasil diubah!'); </script>";
            echo "<script> location.href='login.php'; </script>";
        } else {
            echo "<script> alert('Gagal merubah password.'); </script>";
        }
    }
}
?>


