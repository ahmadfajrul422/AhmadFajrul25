<?php 
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun Masyarakat</title>

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
                            <form method="post" action="lupa-password.php">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Masukkan Username Anda Kembali</label>
                                    <input type="text" class="form-control <?php if (isset($_GET['errorusername'])) { echo 'is-invalid'; } ?>" 
                                           name="Username" placeholder="Harus yang sesuai dengan akun Anda, cth: Ahmad">
                                    <?php if (isset($_GET['errorusername'])) { ?>
                                        <span class="invalid-feedback"><?php echo $_GET['errorusername']; ?></span>
                                    <?php } ?>
                                </div>

                                <button type="submit" name="verifikasi" class="btn btn-primary">Verifikasi</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="mb-0">Belum punya akun? <a href="register.php">Daftar dulu sini</a></p>
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
if (isset($_POST['verifikasi'])) {
    $username = $_POST['Username'];
    $query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username = '$username'") or die(mysqli_error($koneksi));

   
    $data = $query->fetch_assoc();
    if ($query->num_rows == 1) {
        
        echo '<script> location.href = "ubahpassword.php?username='.$username.'"; </script>';
    } else if (empty($_POST['Username']) || $username != $data['username']) {
        
        header('Location: lupa-password.php?errorusername=Username Tidak Sesuai');
        exit(); 
    }
}
?>

