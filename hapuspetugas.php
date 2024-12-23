<?php 

$id = $_GET['id_petugas'];
// Hapus data petugas
$query_hapus = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$id'") or die (mysqli_error($koneksi));

if ($query_hapus) {
    echo "<script>alert('Data petugas berhasil dihapus!'); window.location = 'index.php?halaman=petugas';</script>";
} else {
    echo "<script>alert('Data petugas gagal dihapus!'); window.location = 'index.php?halaman=petugas';</script>";
}
?>