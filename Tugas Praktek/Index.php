<!DOCTYPE html> 
<html> 
<head> 
    <title>Tampil Data</title>

    <style> 
        fieldset { 
            width: 400px; 
            margin:auto; 
        } 
    </style> 

</head> 
<body> 
 

<center>
    <h1>SELAMAT DATANG DI <br>"ENGKO BOOK STORE"</h1>
</center> 
<center>||<a href="Index.php">Home</a>||<a href="Penerbit.php">Pengadaan</a>||<a href="Admin.php">Admin</a>||</center> 
<br> 
<form method="GET" action="index.php" style="text-align: center;"> 
<label>Cari Buku : </label> 
<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo 
$_GET['kata_cari']; } ?>" /> 
<button type="submit">Cari</button> 

</form>
<br>

<table border="2" cellpadding="5" cellspacing="0" width="100%">
<thead> 
<tr> 
<th>ID Buku</th> 
<th>Kategori</th> 
<th>Nama Buku</th> 
<th>Harga</th>
<th>Stok</th>
<th>Penerbit</th>
<!--Tambahan untuk opsi Update & Delete--> 
</tr> 
</thead> 
<tbody> 

<?php 
//untuk meinclude kan koneksi 
include 'koneksi.php'; 

//jika kita klik cari, maka yang tampil query cari ini 
if(isset($_GET['kata_cari'])) { 

//menampung variabel kata_cari dari form pencarian 
$kata_cari = $_GET['kata_cari'];

$query = "SELECT * FROM buku WHERE id_buku like '%".$kata_cari."%' OR 
nama_buku like '%".$kata_cari."%' ORDER BY id_buku ASC"; 
} else { 

//jika tidak ada pencarian, default yang dijalankan query ini 
$query = "SELECT * FROM buku ORDER BY id_buku ASC"; 
     }

$result = mysqli_query($koneksi, $query); 
if(!$result) { 
die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
                } 
//kalau ini melakukan foreach atau perulangan 
while ($row = mysqli_fetch_assoc($result)) { 
?> 

<tr> 
         <td><?php echo $row['id_buku']; ?></td> 
         <td><?php echo $row['kategori']; ?></td> 
         <td><?php echo $row['nama_buku']; ?></td> 
         <td><?php echo $row['harga']; ?></td>
         <td><?php echo $row['stok']; ?></td>
         <td><?php echo $row['penerbit']; ?></td>

</tr> 
 
<?php 
     } 
?> 

</tbody> 
</table> 
</body> 
</html> 