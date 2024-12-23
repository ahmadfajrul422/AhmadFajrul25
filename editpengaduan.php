<?php 

include 'koneksi.php';

$id = $_GET['id_pengaduan'];

$data_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));

while ($data = $data_pengaduan->fetch_assoc()) {

?>

<div class="col-12 col-lg-12 mx-auto">
    <div class="card radius-15">
        <div class="card-header text-center">
            <h4 class="mt-4 font-weight-bold">Edit Laporan Akun Masyarakat</h4>
        </div>
        <div class="card-body p-md-5">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tgl_pengaduan" id="" value="<?php echo $data['tgl_pengaduan'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Foto</label>
                    <input type="file" name="foto" id="" value="<?php echo $data['foto'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Isi Laporan</label>
                    <textarea name="isi_laporan" id="" cols="30" rows="10" value="<?php echo $data['isi_laporan'];?>" class="form-control"></textarea>
                </div>
                <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary">Kembali</button>
                <button type="submit" name="submit" class="btn btn-sm btn-info">Simpan</button>
            </form>
        
        </div>
</div>  


<?php 

    if(isset($_POST['submit'])){
        $tgl_pengaduan = $_POST['tgl_pengaduan'];
        $isi_laporan = $_POST['isi_laporan'];

        $query_show = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));

        $data_lama = $query_show->fetch_assoc();

        if($_FILES['foto']['name'] == "") {
            $foto = $data_lama['foto'];
        } else {
            $foto = $_FILES['foto']['name'];
            unlink("foto/".$data_lama['foto']);

            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi, "foto/".$foto);
        }
       

        $query = mysqli_query($koneksi, "UPDATE pengaduan SET tgl_pengaduan = '$tgl_pengaduan', foto = '$foto', isi_laporan = '$isi_laporan'
                 WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));

        if ($query) {
            echo "<script>alert('Laporan berhasil diubah!'); window.location = 'index.php';</script>";
        } else {
            echo "<script>alert('Laporan gagal diubah!'); window.location = 'tambahpengaduan.php';</script>";
        }

    }

}



?>