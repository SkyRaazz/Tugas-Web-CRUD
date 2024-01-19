<!DOCTYPE html> 
<html> 
 <head> 
 <title>Edit Data</title> 
 <style> 
 fieldset { 
 width: 400px; 
 margin:auto; 
 } 
 </style> 
 </head> 
 <body> 
 <fieldset > 
 <!--Judul pada fieldset--> 
 <legend align="center">Edit Data Buku</legend> 
 <h3>Edit Data</h3> 
 <?php 
 include "koneksi.php"; 
 $id = $_GET['id_buku']; 
 $edit = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'");
 while ($row = mysqli_fetch_array($edit)) { 
 ?>
 <form method="post" action="Edit_proses.php"> 
 <table>
     
 <tr> 
 <td>ID Buku</td> 
 <td>
 <input type="text" name="id_buku" value="<?php echo $row['id_buku']; ?>"> 
 </td> 
 </tr>

 <tr> 
 <td>Kategori</td> 
 <td> 
 <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>"> 
 </td> 
 </tr>

 <tr> 
 <td>Nama Buku</td> 
 <td> 
 <input type="text" name="nama_buku" value="<?php echo $row['nama_buku']; ?>"> 
 </td> 
 </tr>

 <tr>
 <td>Harga</td> 
 <td> 
 <input type="text" name="harga" value="<?php echo $row['harga']; ?>"> 
 </td> 
 </tr>

 <tr>
 <td>Stok</td> 
 <td> 
 <input type="text" name="stok" value="<?php echo $row['stok']; ?>"> 
 </td> 
 </tr>

 <tr>
 <td>Penerbit</td> 
 <td> 
 <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>"> 
 </td> 
 </tr>

 <tr>
 <td><input type="submit" value="SIMPAN"></td> 
 </tr> 
 </table> 
 </form> 
 <?php 
 } 
 ?> 
 </fieldset> 
 </body> 
</html>
