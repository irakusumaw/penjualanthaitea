<!DOCTYPE html>
<html>
<head>
  <title>Thai Tone's Cafe</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="wrap">
    <div class="header">      
      <h1><font color="orange" align="center" face="Curlz MT" size="20">THAI TONE'S CAFE</font></h1>
      <p><font color="orange">Tempat Nongkrong Paling Hitz</font></p>
    </div>
    <div class="badan">     
      <div class="sidebar">
      <br>
      </div>
      <div class="content">
        <center>
<?php
include_once'koneksi.php';
?>
<table border="1">
<h2>DATA LAPORAN</h2>
<tr align="center">
    <td>No_transaksi</td>
    <td>Tanggal</td>
    <td>Kode_minuman</td>
    <td>nama_minuman</td>
    <td>Jumlah</td>
    <td>Harga_satuan</td>
</tr>
<?php
$result = mysqli_query($koneksi,"SELECT * FROM header_penjualan INNER JOIN details_penjualan ON header_penjualan.no_transaksi=details_penjualan.no_trans ");
while($data = mysqli_fetch_array($result))
{
?>
  <tr>
<td align="center"><?php echo $data['no_trans']; ?></td>
      <td align="center"><?php echo $data['tanggal']; ?></td>
      <td align="center"><?php echo $data['kode_minuman']; ?></td>
      <td align="center"><?php echo $data['nama_minuman']; ?></td>
      <td align="center"><?php echo $data['quantity']; ?></td>
      <td align="center"><?php echo $data['harga']; ?></td>
      <td>
    </tr>

<?php
}
?>
</table>
</center>
<center>
  <br><br>
    <td>
      <button class="button"><a href="index.php">HOME</a></button></td>
      <td>
      <button class="button"><a href="logout.php">LOGOUT</a></button></td>
      <td>
        <button class="button"><a href="fil_ter.php">FILTER</a></button></td>
      <td>

</center>
      </div>
    </div>
    <div class="clear"></div>
    <div class="footer">
      <font>Created By. Funny F Tampubolon & Ira K Wardani</font>
    </div>
  </div>
</body>
</html>