<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
		<div class="breadcrumb-title pr-3">Petugas</div>
		<div class="pl-3">
		    <nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">+ Data Petugas</li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="card radius-15">
		<div class="card-body">
			<div class="card-title">
				<h4 class="mb-0">Tambah Data Petugas</h4>
			</div>
			<hr/>
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Petugas</label>
                    <input type="text" name="nama_petugas" class="form-control" placeholder="Masukkan Nama Petugas ">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <select name="level" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Telp</label>
                    <input type="text" maxlength="13" name="telp" class="form-control" placeholder="Masukkan Nomor Telepon">
                </div>
                <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
            </form>
		</div>
	</div>
</div>

<?php 
if (isset($_POST['add'])) {
    $nama_petugas = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $telp = $_POST['telp'];

    $query = mysqli_query($koneksi, "INSERT INTO petugas (nama_petugas,username,password,level,telp) 
                VALUES('$nama_petugas','$username','$password','$level','$telp')");

    if ($query) {
        echo "<script>alert('Tambah Data Petugas Berhasil'); window.location = '?halaman=petugas';</script>";
    } else {
        echo "<script>alert('Tambah Data Petugas Gagal: " . mysqli_error($koneksi) . "'); window.location = 'tambahpetugas.php';</script>";
    }
}
?>
