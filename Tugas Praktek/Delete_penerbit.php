<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id = $_GET['id_penerbit'];
// query SQL untuk insert data
$query = "DELETE FROM penerbit WHERE id_penerbit='$id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:Penerbit.php");