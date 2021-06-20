<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$nis = $_POST['nama_produk'];
$nama = $_POST['keterangan'];
$telp = $_POST['harga'];
$alamat = $_POST['jumlah'];
// Proses ubah data ke Database
$sql = $pdo->prepare("UPDATE produk SET nama_produk=:np, keterangan=:keterangan, harga=:harga, jumlah=:jumlah WHERE id=:id");
$sql->bindParam(':np', $nama_produk);
$sql->bindParam(':keterangan', $keterangan);
$sql->bindParam(':harga', $harga);
$sql->bindParam(':jumlah', $jumlah);
$sql->bindParam(':id', $id);
$execute = $sql->execute(); // Eksekusi / Jalankan query
if($execute){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: index.php"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
}
?>