<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
		<div class="breadcrumb-title pr-3">Masyarakat</div>
		<div class="pl-3">
		    <nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page">Data Masyarakat</li>
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
				<h4 class="mb-0">Data Masyarakat</h4>
			</div>
			<hr/>
			<div class="table-responsive">
				<table class="table mb-0">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">NIK</th>
							<th scope="col">Nama</th>
							<th scope="col">Username</th>
							<th scope="col">Nomor Telepon</th>
						</tr>
					</thead>
					<tbody>
                          
					    <?php 
						  
						 $masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat") or die (mysqli_error($koneksi));

                         $no = 1;

						 while($data_masyarakat = $masyarakat->fetch_assoc()) {
							 
						 
						 
						?>
						<tr>
							<th scope="row"><?php echo $no++ ?></th>
							<td><?php echo $data_masyarakat['nik'] ?></td>
							<td><?php echo $data_masyarakat['nama'] ?></td>
                            <td><?php echo $data_masyarakat['username'] ?></td>
                            <td><?php echo $data_masyarakat['telp'] ?></td>
							<td>
								
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>