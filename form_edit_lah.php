<?php 
include "koneksi.php";
$no_transaksi=$_GET['no_transaksi'];
$query=mysql_query("select * from header_penjualan where kode='$no_transaksi'");
?>
<html><head><title>Halaman Edit Data Barang</title><head><body>
<form action="lihatlaporan.php" method="post">
<table border="0">
<?php
while($row=mysql_fetch_array($query)){
?>
<input type="Hidden" name="no" value="<?php echo $no;?>" />
<h2>Data Barang</h2>
<table><tr>
<td>No Transaksi</td>
<td>: <input type="text" name="no_transaksi" value="<?php echo $row['no_transaksi'];?>" size="10"></td>
</tr>
<tr>
<td>Tanggal</td>
<td>: <input type="date" name="tanggal" value="<?php echo $row['tanggal'];?>"size="30"></td>
</tr>
<tr>
<td>Pembeli</td>
<td>: <input type="text" name="pembeli" value="<?php echo $row['pembeli'];?>"size="20"></td>
</tr>
<tr>
<td>Kode Minuman</td>
<td>: <input type="text" name="kode_minuman" value="<?php echo $row['kode_minuman'];?>"size="20"></td>
</tr>
<tr>
<td>Jumlah</td>
<td>: <input type="text" name="jumlah" value="<?php echo $row['jumlah'];?>"size="20"></td>
</tr>
<tr>
<td>Harga Satuan</td>
<td>: <input type="text" name="harga_satuan" value="<?php echo $row['harga_satuan'];?>"size="20"></td>
</tr>
<tr>
<td>Sub Total</td>
<td>: <input type="text" name="sub_total" value="<?php echo $row['sub_total'];?>"size="20"></td>
</tr>
<tr>
<td colspan=2><input type="submit" value="Update"></td>
</tr>
<?php } ?>
</table></form>

</body></html>