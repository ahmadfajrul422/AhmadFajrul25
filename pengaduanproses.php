<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
	<div class="breadcrumb-title pr-3">Pengaduan</div>
	<div class="pl-3">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb mb-0 p-0">
				<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Data Pengaduan Proses</li>
			</ol>
		</nav>
	</div>
	<div class="ml-auto"></div>
</div>
<!--end breadcrumb-->
<div class="card radius-15">
	<div class="card-body">
		<div class="card-title">
			<h4 class="mb-0">Data Pengaduan Proses</h4>
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
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE status = 'proses' ORDER BY tgl_pengaduan DESC") or die(mysqli_error($koneksi));
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
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tanggapanpetugas<?php echo $data_pengaduan['id_pengaduan'] ?>">
								Beri Tanggapan
							</button>

							<!-- Modal Tanggapan -->
							<div class="modal fade" id="tanggapanpetugas<?php echo $data_pengaduan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Tanggapi Laporan ini?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Jika Tanggapi Laporan ini, maka laporan akan dianggap selesai.</p>
											<form action="" method="post">
												<input type="hidden" name="id_pengaduan" value="<?php echo $data_pengaduan['id_pengaduan'] ?>">
												<input type="hidden" name="id_petugas" value="<?php echo $_SESSION['admin']['id_petugas'] ?>">
												<div class="form-group">
													<label for="">NIK:</label>
													<input type="text" readonly class="form-control" value="<?php echo $data_pengaduan['nik'] ?>">
												</div>
												<div class="form-group">
													<label for="">Nama:</label>
													<input type="text" readonly class="form-control" value="<?php echo $data_pengaduan['nama'] ?>">
												</div>
												<div class="form-group">
													<label for="">Isi Laporan:</label>
													<textarea name="" id="" class="form-control" disabled><?php echo $data_pengaduan['isi_laporan'] ?></textarea>
												</div>
												<div class="form-group">
													<label for="">Tanggapan Anda:</label>
													<textarea name="tanggapan" id="" class="form-control"></textarea>
												</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
											<button type="submit" name="tanggapi" class="btn btn-primary">Tanggapi</button>
											</form>
										</div>
									</div>
								</div>
							</div>

							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batallaporan<?php echo $data_pengaduan['id_pengaduan'] ?>">
								Batalkan
							</button>

							<!-- Modal Pembatalan -->
							<div class="modal fade" id="batallaporan<?php echo $data_pengaduan['id_pengaduan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Batalkan Laporan ini?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Jika Batalkan Laporan ini, maka laporan akan dianggap tidak valid.</p>
											<form action="" method="post">
												<input type="hidden" name="id_pengaduan" value="<?php echo $data_pengaduan['id_pengaduan'] ?>">
												<div class="form-group">
													<label for="">Alasan Pembatalan:</label>
													<textarea name="alasan_batal" id="" class="form-control"></textarea>
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

<?php 
if (isset($_POST['tolak'])) {
	$id_petugas = $_SESSION['admin']['id_petugas'];
	$tgl_tanggapan = date('Y-m-d');
	$id_pengaduan = $_POST['id_pengaduan'];
	$tanggapan = $_POST['alasan_batal']; // Menggunakan alasan_batal, bukan tanggapan

	$query = mysqli_query($koneksi, "UPDATE pengaduan SET status = 'batal' WHERE id_pengaduan = '$id_pengaduan'") or die(mysqli_error($koneksi));
	if ($query) {
		$query_tanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, id_petugas, tgl_tanggapan, tanggapan) VALUES ('$id_pengaduan', '$id_petugas', '$tgl_tanggapan', '$tanggapan')") or die(mysqli_error($koneksi));
		echo "<script>alert('Laporan Berhasil Ditolak'); window.location = '?halaman=pengaduanproses';</script>";
	} else {
		echo "<script>alert('Laporan Gagal Ditolak'); window.location = '?halaman=pengaduanproses';</script>";
	}
}

if (isset($_POST['tanggapi'])) {
	$tgl_tanggapan = date('Y-m-d');
	$id_pengaduan = $_POST['id_pengaduan'];
	$id_petugas = $_SESSION['admin']['id_petugas'];
	$tanggapan = $_POST['tanggapan'];

	// Insert tanggapan untuk pengaduan
	$query_tanggapan = mysqli_query($koneksi, "INSERT INTO tanggapan (id_pengaduan, id_petugas, tgl_tanggapan, tanggapan) VALUES ('$id_pengaduan', '$id_petugas', '$tgl_tanggapan', '$tanggapan')") or die(mysqli_error($koneksi));
	if ($query_tanggapan) {
		// Update status pengaduan menjadi "selesai"
		$query_update = mysqli_query($koneksi, "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'") or die(mysqli_error($koneksi));
		if ($query_update) {
			echo "<script>alert('Laporan Berhasil Ditanggapi'); window.location = '?halaman=pengaduanproses';</script>";
		} else {
			echo "<script>alert('Gagal memperbarui status pengaduan'); window.location = '?halaman=pengaduanproses';</script>";
		}
	} else {
		echo "<script>alert('Gagal menyimpan tanggapan'); window.location = '?halaman=pengaduanproses';</script>";
	}
}
?>
