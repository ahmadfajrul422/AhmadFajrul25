<?php 

include'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun Masyarakats</title>


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
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15">
                        <div class="card-header text-center">
                            <h4 class="mt-4 font-weight-bold">Registrasi Akun Masyarakat</h4>
                        </div>
                        <div class="card-body p-md-5">
                            <form method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIK</label>
                                    <input type="text" class="form-control" <?php if(isset($_GET['error'])) {echo 'is-invalid';} ?> name="NIK" placeholder="cth: 123456789">
                                    <?php 
                                    if(isset($_GET['error'])) {


                                    ?>

                                    <span class="text-danger"><?php echo $_GET['error']; ?></span>
                                    <?php
                                    }
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Lengkap</label>
                                    <input type="text" class="form-control" <?php if(isset($_GET['error'])) {echo 'is-invalid';} ?> name="Nama" placeholder="cth: Ahmad">
                                    <?php 
                                    if(isset($_GET['error'])) {


                                    ?>

                                    <span class="text-danger"><?php echo $_GET['error']; ?></span>
                                    <?php
                                    }
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Telepon</label>
                                    <input type="text" class="form-control" <?php if(isset($_GET['error'])) {echo 'is-invalid';} ?> name="telp" placeholder="cth: 081xxxxx">
                                    <?php 
                                    if(isset($_GET['error'])) {


                                    ?>

                                    <span class="text-danger"><?php echo $_GET['error']; ?></span>
                                    <?php
                                    }
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input type="text" class="form-control" <?php if(isset($_GET['error'])) {echo 'is-invalid';} ?> name="Username" placeholder="cth: Ahmad">
                                    <?php 
                                    if(isset($_GET['error'])) {


                                    ?>

                                    <span class="text-danger"><?php echo $_GET['error']; ?></span>
                                    <?php
                                    }
                                    
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" <?php if(isset($_GET['error'])) {echo 'is-invalid';} ?> name="Password" placeholder="cth: 123456">
                                    <?php 
                                    if(isset($_GET['error'])) {


                                    ?>

                                    <span class="text-danger"><?php echo $_GET['error']; ?></span>
                                    <?php
                                    }
                                    
                                    ?>
                                </div>
                            <button type="submit" name="submit" class="btn btn-primary">Registrasi</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="mb-0">Sudah punya akun? <a href="login.php">Login</a></p>
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


    if(isset($_POST['submit'])){
        $nik = $_POST['NIK'];
        $nama = $_POST['Nama'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];
        $telp = $_POST['telp'];

        if(empty($_POST['NIK'])  || empty($_POST['Nama'])  || empty($_POST['Username'])  || empty($_POST['Password'])  || empty($_POST['telp'])) {
            echo header('location: register.php?error=Data ini wajib diisi!');
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO masyarakat (nik,nama,username,password,telp) 
                        VALUES('$nik','$nama','$username','$password','$telp')") or die (mysqli_error($koneksi));

            if ($query) {
                echo "<script>alert('Registrasi Berhasil'); window.location = 'login.php';</script>";
            } else {
                echo "<script>alert('Registrasi Gagal'); window.location = 'register.php';</script>";
            }

        }

    }



?>