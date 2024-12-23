<?php 

$id_pengaduan = $_GET['id_pengaduan'];

// Query pengaduan
$query_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE id_pengaduan = '$id_pengaduan'") or die (mysqli_error($koneksi));

// Query tanggapan
$query_tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas WHERE id_pengaduan = '$id_pengaduan'") or die (mysqli_error($koneksi));

?>
<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="breadcrumb-title pr-3">Pengaduan</div>
    <div class="pl-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Pengaduan Selesai</li>
            </ol>
        </nav>
    </div>
    <div class="ml-auto"></div>
</div>

<?php 
while ($data_pengaduan = $query_pengaduan->fetch_assoc()) {
?>
<!-- Data Pengaduan -->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Data Pengaduan Selesai</h4>
        </div>
        <hr/>
        <div class="form-group">
            <label for="">Status :</label>
            <p><?php echo strtoupper($data_pengaduan['status']); ?></p>
        </div>
        <div class="form-group">
            <label for="">Tanggal Pengaduan :</label>
            <input type="text" name="" class="form-control" value="<?php echo $data_pengaduan['tgl_pengaduan']; ?>" >
        </div>
        <div class="form-group">
            <label for="">NIK :</label>
            <input type="text" name="" class="form-control" value="<?php echo $data_pengaduan['nik']; ?>" >
        </div>
        <div class="form-group">
            <label for="">Nama Pengirim :</label>
            <input type="text" name="" class="form-control" value="<?php echo $data_pengaduan['nama']; ?>" >
        </div>
        <div class="form-group">
            <label for="">Foto :</label>
            <br>
            <img src="../foto/<?php echo $data_pengaduan['foto']; ?>" alt="Foto Pengaduan" class="img-fluid" style="max-width: 100px;">
        </div>
        <div class="form-group">
            <label for="">Isi Laporan :</label>
            <!-- <input type="text" name="" class="form-control" value="<?php echo $data_pengaduan['isi_laporan']; ?>" > -->
            <textarea name="" id="" class="form-control"><?php echo $data_pengaduan['isi_laporan']; ?></textarea>
        </div>
        <button type="button" onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
    </div>
</div>
<?php } ?>

<?php 
while ($data_tanggapan = $query_tanggapan->fetch_assoc()) {
?>

<!-- Tanggapan Petugas -->
<div class="card radius-15">
    <div class="card-body">
        <div class="card-title">
            <h4 class="mb-0">Tanggapan Petugas</h4>
        </div>
        <hr/>
        <div class="form-group">
            <label for="">Tanggal Tanggapan:</label>
            <input type="text" value="<?php echo $data_tanggapan['tgl_tanggapan']; ?>" class="form-control" > 
        </div>
        <div class="form-group">
            <label for="">Nama Petugas :</label>
            <input type="text" value="<?php echo $data_tanggapan['nama_petugas']; ?> [<?php echo strtoupper($data_tanggapan['level']); ?>]" class="form-control" > 
        </div>
        <div class="form-group">
            <label for="">Isi Tanggapan :</label>
            <!-- <input type="text" value="<?php echo $data_tanggapan['tanggapan']; ?>" class="form-control" >  -->
            <textarea name="" id="" class="form-control"><?php echo $data_tanggapan['tanggapan']; ?></textarea>
        </div>
    </div>
</div>
<?php } ?>
