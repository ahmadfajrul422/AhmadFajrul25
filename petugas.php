<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
		<div class="breadcrumb-title pr-3">Petugas</div>
		<div class="pl-3">
		    <nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Data Petugas</li>
				</ol>
			</nav>
		</div>
		<div class="ml-auto">
			<div class="btn-group">
                <a href="?halaman=tambahpetugas" class="btn btn-primary">+ Tambah Petugas</a>
			</div>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="card radius-15">
		<div class="card-body">
			<div class="card-title">
				<h4 class="mb-0">Data Petugas</h4>
			</div>
			<hr/>
			<div class="table-responsive">
				<table class="table mb-0">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nama</th>
							<th scope="col">Username</th>
							<th scope="col">Level</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
                          
					    <?php 
						  
						 $petugas = mysqli_query($koneksi, "SELECT * FROM petugas") or die (mysqli_error($koneksi));

                         $no = 1;

						 while($data_petugas = $petugas->fetch_assoc()) {
							 
						 
						 
						?>
						<tr>
							<th scope="row"><?php echo $no++ ?></th>
							<td><?php echo $data_petugas['nama_petugas'] ?></td>
							<td><?php echo $data_petugas['username'] ?></td>
							<td><?php echo strtoupper($data_petugas['level'])?></td>
							<td>
								<a onclick="return confirm('Anda yakin ingin menghapus petugas ini?')" href="?halaman=hapuspetugas&id_petugas=<?php echo $data_petugas['id_petugas']; ?>" class="btn btn-primary btn-danger">Hapus</a>
								<a href="?halaman=editpetugas&id_petugas=<?php echo $data_petugas['id_petugas']; ?>" class="btn btn-primary btn-success">Edit</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>