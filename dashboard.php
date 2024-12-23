<div class="row">
   <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-voilet">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <?php 
                    $query_masyarakat = mysqli_query($koneksi, "SELECT * FROM masyarakat") or die (mysqli_error($koneksi));
                    $jumlah_masyarakat = $query_masyarakat->num_rows;
                    ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_masyarakat; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Jumlah Masyarakat</p>
                    </div>
                   
                </div>
            </div>
        </div>
     </div>

     <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-primary-blue">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <?php 
                    $query_petugas = mysqli_query($koneksi, "SELECT * FROM petugas") or die (mysqli_error($koneksi));
                    $jumlah_petugas = $query_petugas->num_rows;
                    ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_petugas; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Jumlah Petugas</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-rose">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <?php 
                    $query_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan") or die (mysqli_error($koneksi));
                    $jumlah_pengaduan = $query_pengaduan->num_rows;
                    ?>
                    <div>
                        <h2 class="mb-0 text-white"><?php echo $jumlah_pengaduan; ?></h2>
                    </div>
                    <div class="ml-auto font-35 text-white"><i class="bx bx-repeat"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-white">Jumlah Pengaduan</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!--breadcrumb-->
    <!--end breadcrumb-->
    <div class="card radius-15">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Selamat Datang, <?php echo $_SESSION['admin']['nama_petugas']; ?></h4>
            </div>
            <hr/>
            <p>Nama : <?php echo $_SESSION['admin']['nama_petugas']; ?></p>
            <p>Username : <?php echo $_SESSION['admin']['username']; ?></p>
            <p>Level : <?php echo strtoupper($_SESSION['admin']['level']); ?></p>

        </div>
    </div>
</div>