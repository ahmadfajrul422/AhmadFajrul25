<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
        <div class="card-header text-center">
            <h4 class="mt-4 font-weight-bold">Tambah Laporan Akun Masyarakat</h4>
        </div>
        <div class="card-body p-md-5">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tgl_pengaduan" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Isi Laporan</label>
                    <textarea name="isi_laporan" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary">Kembali</button>
                <button type="submit" name="submit" class="btn btn-sm btn-info">Simpan</button>
            </form>
        
        </div>
</div>  


<?php 

    if(isset($_POST['submit'])){
        $nik = $_SESSION['masyarakat']['nik'];
        $tgl_pengaduan = $_POST['tgl_pengaduan'];
        $isi_laporan = $_POST['isi_laporan'];
        $status = 0;

        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "foto/".$foto);

        $query = mysqli_query($koneksi, "INSERT INTO pengaduan (nik, tgl_pengaduan, foto, isi_laporan, status) 
                VALUES ('$nik', '$tgl_pengaduan', '$foto', '$isi_laporan', '$status')") or die (mysqli_error($koneksi));

        if ($query) {
            echo "<script>alert('Laporan berhasil ditambahkan!'); window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('Laporan gagal ditambahkan!'); window.location = 'tambahpengaduan.php';</script>";
        }

    }



?>