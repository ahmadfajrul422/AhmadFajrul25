<?php 
$id = $_GET['id_pengaduan'];

$query_laporan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));

while ($laporan = $query_laporan->fetch_assoc()) {

?>
<div class="col-12 col-lg-12 mx-auto">
    <div class="card radius-15">
        <div class="card-header text-center">
            <h4 class="mt-4 font-weight-bold">Detail Laporan Akun Masyarakat</h4>
        </div>
        <div class="card-body p-md-5">
            <div class="form-group">
                <label for="">Tanggal</label>
                <p><?php echo $laporan['tgl_pengaduan']; ?></p>
            </div>

            <div class="form-group">
                <label for="">Foto</label>
                <br>
                <img src="foto/<?php echo $laporan['foto']; ?>" alt="" class="img-fluid" style="max-width: 100px;">
                <!-- <p><?php echo $laporan['foto']; ?></p> -->
            </div>

            <div class="form-group">
                <label for="">Isi Laporan</label>
                <p><?php echo $laporan['isi_laporan']; ?></p>
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <p><?php echo strtoupper($laporan['status']); ?></p>
            </div>
            <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary">Kembali</button>
        </div>
    </div>
</div>

<?php } ?>

<?php 
  $query_tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));
?>

<div class="col-12 col-lg-12 mx-auto">
    <div class="card radius-15">
        <div class="card-header text-center">
            <h4 class="mt-4 font-weight-bold">Tanggapan Laporan Dari Petugas</h4>
        </div>
        <div class="card-body p-md-5">
            <?php 
                if($query_tanggapan->num_rows > 0) {

                    while ($tanggapan = $query_tanggapan->fetch_assoc()) {
            ?>
            <div class="form-group">
                <label for="">Nama Petugas</label>
                <p><?php echo $tanggapan['nama_petugas']; ?> [<?php echo strtoupper($tanggapan['level']); ?>]</p>
            </div>

            <div class="form-group">
                <label for="">Tanggapan</label>
                <p><?php echo $tanggapan['tanggapan']; ?></p>
            </div>
            <?php } ?>
            <?php } else { echo "Belum ada tanggapan"; } ?>
        </div>
    </div>
</div>
