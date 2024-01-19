<?php 
// koneksi database 
include 'koneksi.php'; 
// menangkap data yang di kirim dari form 
$id = $_POST["id_penerbit"]; 
$nama = $_POST["nama"]; 
$alamat = $_POST["alamat"]; 
$kota = $_POST["kota"];
$telepon = $_POST["telepon"];
// update data ke database 
mysqli_query($koneksi,"update penerbit set nama='$nama', alamat='$alamat', kota='$kota', 
telepon='$telepon' where id_penerbit='$id'"); 
 
// mengalihkan halaman kembali ke index.php 
header("location:Penerbit.php");
 
?>