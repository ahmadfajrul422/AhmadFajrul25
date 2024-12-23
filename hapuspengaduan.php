<?php 


$id = $_GET['id_pengaduan'];

$query_show = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));

$query_hapus = mysqli_query($koneksi, "DELETE FROM pengaduan WHERE id_pengaduan = '$id'") or die (mysqli_error($koneksi));

$data_lama = $query_show->fetch_assoc();
unlink("foto/".$data_lama['foto']);

if ($query_hapus) {
    echo "<script>alert('Laporan berhasil dihapus!'); window.location = 'index.php';</script>";
} else {
    echo "<script>alert('Laporan gagal dihapus!'); window.location = 'index.php';</script>";
}



?>