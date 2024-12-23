<div class="col-12 col-lg-12 mx-auto">
    <div class="card radius-15">
        <div class="card-header text-center">
            <h4 class="mt-4 font-weight-bold">Laporan Akun Masyarakat</h4>
        </div>
        <div class="card-body p-md-5">
            <a href="?halaman=tambahpengaduan" class="btn btn-primary mb-3">+ Tambah Laporan</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $nik = $_SESSION['masyarakat']['nik']; // Ambil NIK dari sesi
                        
                        $query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE nik='$nik'") or die(mysqli_error($koneksi));

                        if($query->num_rows > 0) {
                            
                    
                        
                        while ($pengaduan = $query->fetch_assoc()) { // Loop data pengaduan
                    ?>
                    <tr>
                        <!-- Tanggal Pengaduan -->
                        <th scope="row"><?php echo htmlspecialchars($pengaduan['tgl_pengaduan']); ?></th>

                        <!-- Foto Pengaduan -->
                        <td>
                            <?php if (!empty($pengaduan['foto'])): ?>
                                <img src="foto/<?php echo htmlspecialchars($pengaduan['foto']); ?>" alt="Foto Pengaduan" class="img-fluid" style="max-width: 100px;">
                            <?php else: ?>
                                <p class="text-muted">Tidak ada foto</p>
                            <?php endif; ?>
                        </td>

                        <!-- Status Pengaduan -->
                        <td>
                            <button disabled class="btn btn-sm btn-<?php if ($pengaduan['status'] == '0') { 
                                        echo 'secondary'; 
                                    } elseif ($pengaduan['status'] == 'proses') { 
                                        echo 'warning'; 
                                    } elseif ($pengaduan['status'] == 'selesai') { 
                                        echo 'success'; 
                                    } elseif ($pengaduan['status'] == 'batal') { 
                                        echo 'danger';
                                    } else { 
                                        echo 'danger'; 
                                    } 
                                ?>">
                                <?php 
                                    if ($pengaduan['status'] == '0') { 
                                        echo 'Belum dikonfirmasi'; 
                                    } elseif ($pengaduan['status'] == 'proses') { 
                                        echo 'Sedang diproses'; 
                                    } elseif ($pengaduan['status'] == 'selesai') { 
                                        echo 'Selesai'; 
                                    } elseif ($pengaduan['status'] == 'batal') {
                                        echo 'Dibatalkan';
                                    } else { 
                                        echo 'Status tidak valid'; 
                                    } 
                                ?>
                            </button>
                        </td>

                        <!-- Aksi -->
                        <td>
                            <?php
                               if ($pengaduan['status'] == '0') {
                               
                            ?>
                            <a href="?halaman=editpengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a onclick="return confirm('Anda yakin ingin menghapus laporan ini?')"   href="?halaman=hapuspengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                            <?php
                               } else {
                            ?>
                            <a href="?halaman=detailpengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php 
                        } 
                        }
                        } else {
                    ?>
                </tbody>
            </table>
            <p class="text-center mt-5">Anda belum memiliki laporan pengaduan.</p>
            <?php } ?>
        </div>
    </div>
</div>
