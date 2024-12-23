<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
		<div class="breadcrumb-title pr-3">Pengaduan</div>
		<div class="pl-3">
		    <nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Data Pengaduan Selesai</li>
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
				<h4 class="mb-0">Data Pengaduan Selesai</h4>
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
						  
						 $pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE status = 'selesai' ORDER BY tgl_pengaduan DESC") or die (mysqli_error($koneksi));

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
								<a href="?halaman=pengaduandetail&id_pengaduan=<?php echo $data_pengaduan['id_pengaduan']; ?>" class="btn btn-primary">Lihat Detail</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>