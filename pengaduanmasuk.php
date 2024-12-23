<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
		<div class="breadcrumb-title pr-3">Pengaduan</div>
		<div class="pl-3">
		    <nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Data Pengaduan Masuk</li>
				</ol>
			</nav>
		</div>
		<div class="ml-auto">
			
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="card radius-15">
		<div class="card-body">
			<div class="card-title">
				<h4 class="mb-0">Data Pengaduan Masuk</h4>
			</div>
			<hr/>
			<div class="table-responsive">
				<table class="table mb-0">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama Pengirim</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Foto</th>
							<!-- <th scope="col">Status</th> -->
                            <th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
                          
					    <?php 
						  
						 $pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE status = '0' ORDER BY tgl_pengaduan DESC") or die (mysqli_error($koneksi));

                         $no = 1;

						 while($data_pengaduan = $pengaduan->fetch_assoc()) {
							 
						?>
						<tr>
							<th scope="row"><?php echo $no++ ?></th>
							<td><?php echo $data_pengaduan['nama'] ?></td>
							<td><?php echo $data_pengaduan['tgl_pengaduan'] ?></td>
                            <td>
                                <img src="../foto/<?php echo $data_pengaduan['foto'] ?>" alt="Foto Pengaduan" class="img-fluid" style="max-width: 100px;">
                            </td>
							<!-- <td><?php echo strtoupper($data_pengaduan['status'])?></td> -->
							<td>
								<!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $data_pengaduan['id_pengaduan'] ?>">
                                Konfirmasi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $data_pengaduan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Laporan ini?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Jika Konfirmasi Laporan ini, maka laporan akan diproses oleh petugas.</p>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pengaduan" value="<?php echo $data_pengaduan['id_pengaduan'] ?>">
                                        <div class="form-group">
                                            <label for="">NIK:</label>
                                            <input type="" readonly class="form-control" value="<?php echo $data_pengaduan['nik'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Nama:</label>
                                            <input type="" readonly class="form-control" value="<?php echo $data_pengaduan['nama'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Foto:</label>
                                            <br>
                                            <img src="../foto/<?php echo $data_pengaduan['foto'] ?>" alt="Foto Pengaduan" class="img-fluid" style="max-width: 100px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Isi Laporan:</label>
                                            <textarea name="" id="" class="form-control" disabled><?php echo $data_pengaduan['isi_laporan'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="konfirmasi" class="btn btn-primary">Konfirmasi</button>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batallaporan<?php echo $data_pengaduan['id_pengaduan'] ?>">
                                Tolak
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="batallaporan<?php echo $data_pengaduan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Laporan ini?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Jika Tolak Laporan ini, maka laporan akan dianggap tidak valid.</p>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_pengaduan" value="<?php echo $data_pengaduan['id_pengaduan'] ?>">
                                        <div class="form-group">
                                            <label for="">NIK:</label>
                                            <input type="" readonly class="form-control" value="<?php echo $data_pengaduan['nik'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Nama:</label>
                                            <input type="" readonly class="form-control" value="<?php echo $data_pengaduan['nama'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Foto:</label>
                                            <br>
                                            <img src="../foto/<?php echo $data_pengaduan['foto'] ?>" alt="Foto Pengaduan" class="img-fluid" style="max-width: 100px;">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Isi Laporan:</label>
                                            <textarea name="" id="" class="form-control" disabled><?php echo $data_pengaduan['isi_laporan'] ?></textarea>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="">Alasan Penolakan:</label>
                                            <textarea name="alasan_tolak" id="" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="tolak" class="btn btn-primary">Kirim Alasan</button>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php 

if (isset($_POST['tolak'])) {
    $id_petugas = $_SESSION['admin']['id_petugas']; // Perbaikan case-sensitive
    $tgl_tanggapan = date('Y-m-d');
    $id_pengaduan = $_POST['id_pengaduan'];
    $tanggapan = $_POST['tanggapan']; // Perbaikan nama variabel

    // Query Update Status
    $query = mysqli_query($koneksi, "UPDATE pengaduan SET status = 'batal' WHERE id_pengaduan = '$id_pengaduan'") or die(mysqli_error($koneksi));
    if ($query) {
        // Query Insert Tanggapan
        $query_tanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan (id_tanggapan, id_pengaduan, id_petugas, tgl_tanggapan, tanggapan) VALUES ('', '$id_pengaduan', '$id_petugas', '$tgl_tanggapan', '$tanggapan')") or die(mysqli_error($koneksi));
        echo "<script>alert('Laporan Berhasil Ditolak'); window.location = '?halaman=pengaduanmasuk';</script>";
    } else {
        echo "<script>alert('Laporan Gagal Ditolak'); window.location = '?halaman=pengaduanmasuk';</script>";
    }
}

if (isset($_POST['konfirmasi'])) {
    $id_pengaduan = $_POST['id_pengaduan'];

    // Query Update Status
    $query = mysqli_query($koneksi, "UPDATE pengaduan SET status = 'proses' WHERE id_pengaduan = '$id_pengaduan'") or die(mysqli_error($koneksi));
    if ($query) {
        echo "<script>alert('Laporan Berhasil Dikonfirmasi'); window.location = '?halaman=pengaduanmasuk';</script>";
    } else {
        echo "<script>alert('Laporan Gagal Dikonfirmasi'); window.location = '?halaman=pengaduanmasuk';</script>";
    }
}
?>

