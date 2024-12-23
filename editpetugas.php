<?php 
if (!isset($_GET['id_petugas']) || empty($_GET['id_petugas'])) {
    die("ID Petugas tidak ditemukan.");
}
$id = $_GET['id_petugas'];

// Ambil data petugas
$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id'") or die(mysqli_error($koneksi));
while ($petugas = $query->fetch_assoc()) {
?>
<!-- Form HTML -->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Petugas</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Petugas</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title"><h4 class="mb-0">Edit Data Petugas</h4></div>
        <hr/>
        <form method="POST">
            <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" value="<?php echo $petugas['nama_petugas']; ?>" name="nama_petugas" class="form-control" placeholder="Masukkan Nama Petugas">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" value="<?php echo $petugas['username']; ?>" name="username" class="form-control" placeholder="Masukkan Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Ketikkan Jika Ingin Diubah">
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option value="admin" <?php if ($petugas['level'] == 'admin') { echo 'selected'; } ?>>Admin</option>
                    <option value="petugas" <?php if ($petugas['level'] == 'petugas') { echo 'selected'; } ?>>Petugas</option>
                </select>
            </div>
            <div class="form-group">
                <label>Telp</label>
                <input type="text" value="<?php echo $petugas['telp']; ?>" maxlength="13" name="telp" class="form-control" placeholder="Masukkan Nomor Telepon">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
        </form>
    </div>
</div>

<?php 
}

if (isset($_POST['add'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $telp = $_POST['telp'];

    if ($password != '') { 
        $query = mysqli_query($koneksi, "UPDATE petugas SET 
            nama_petugas='$nama_petugas', 
            username='$username', 
            password='$password', 
            level='$level', 
            telp='$telp' 
            WHERE id_petugas='$id'") or die(mysqli_error($koneksi));
    } else {
        $query = mysqli_query($koneksi, "UPDATE petugas SET 
            nama_petugas='$nama_petugas', 
            username='$username', 
            level='$level', 
            telp='$telp' 
            WHERE id_petugas='$id'") or die(mysqli_error($koneksi));
    }

    if ($query) {
        echo "<script>alert('Edit Data Petugas Berhasil'); window.location = '?halaman=petugas';</script>";
    } else {
        echo "<script>alert('Edit Data Petugas Gagal: " . mysqli_error($koneksi) . "'); window.location = 'editpetugas.php?id_petugas=$id';</script>";
    }
} 
?>
