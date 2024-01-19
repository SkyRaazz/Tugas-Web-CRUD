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
    <h1>"ENGKO BOOK STORE"</h1>
</center> 
<center>||<a href="Index.php">Home</a>||<a href="Penerbit.php">Pengadaan</a>||<a href="Admin.php">Admin</a>||</center> 
<br> 
<form method="GET" action="index.php" style="text-align: center;"> 
<label>Cari Penerbit : </label> 
<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo 
$_GET['kata_cari']; } ?>" /> 
<button type="submit">Cari</button> 

</form>
<br>

<table border="2" cellpadding="5" cellspacing="0" width="100%">
<thead> 
<tr> 
<th>ID Penerbit</th> 
<th>Nama</th> 
<th>Alamat</th> 
<th>Kota</th>
<th>Telepon</th>
<!--Tambahan untuk opsi Update & Delete-->
<th>OPSI</th> 
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

$query = "SELECT * FROM penerbit WHERE id_penerbit like '%".$kata_cari."%' OR 
nama like '%".$kata_cari."%' ORDER BY id_penerbit ASC"; 
} else { 

//jika tidak ada pencarian, default yang dijalankan query ini
$query = "SELECT * FROM penerbit ORDER BY id_penerbit ASC";
     }

$result = mysqli_query($koneksi, $query); 
if(!$result) { 
die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi)); 
                } 
//kalau ini melakukan foreach atau perulangan 
while ($row = mysqli_fetch_assoc($result)) { 
?> 

<tr> 
         <td><?php echo $row['id_penerbit']; ?></td> 
         <td><?php echo $row['nama']; ?></td> 
         <td><?php echo $row['alamat']; ?></td> 
         <td><?php echo $row['kota']; ?></td>
         <td><?php echo $row['telepon']; ?></td>

         <td>
         <a href="Edit_penerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">EDIT</a> 
         <a href="Delete_penerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>">HAPUS</a> 
         </td> 

</tr> 
 
<?php 
     } 
?> 

</tbody> 
</table> 
</body> 
</html> 