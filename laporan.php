<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
		<div class="breadcrumb-title pr-3">Laporan</div>
		<div class="pl-3">
		    <nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Data Laporan</li>
				</ol>
			</nav>
		</div>
		<div class="ml-auto">
			<div class="btn-group">
                
			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="card radius-15">
		<div class="card-body">
			<div class="card-title">
				<h4 class="mb-0">Data Laporan</h4>
			</div>
			<hr/>
			<div class="table-responsive">
				<table class="table mb-0" id="example2">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tanggal Pengaduan</th>
							<th scope="col">NIK</th>
							<th scope="col">Nama Pengirim</th>
							<th scope="col">No Telepon</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Status</th>
						</tr>
					</thead>
					<tbody>
                          
					    <?php 
						  
						 $laporan = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik ORDER BY tgl_pengaduan DESC") or die (mysqli_error($koneksi));

                         $no = 1;

						 while($data_laporan = $laporan->fetch_assoc()) {
							 
						 
						 
						?>
						<tr>
							<th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $data_laporan['tgl_pengaduan']; ?></td>
                            <td><?php echo $data_laporan['nik']; ?></td>
                            <td><?php echo $data_laporan['nama']; ?></td>
                            <td><?php echo $data_laporan['telp']; ?></td>
                            <td><?php echo $data_laporan['isi_laporan']; ?></td>
                            <td><?php echo strtoupper($data_laporan['status'])?></td>						
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>