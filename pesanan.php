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
<h2>DATA PESANAN</h2>
<tr align="center">
    <td>No_transaksi</td>
    <td>Tanggal</td>
    <td>Pembeli</td>
    <td>Kode_minuman</td>
    <td>Jumlah</td>
    <td>Harga_satuan</td>
    <td>Sub_total</td>
    <td>Level_gula</td>
    <td>Level_es</td>
    <td>Toping</td>
</tr>
<?php
$result = mysqli_query($koneksi,"SELECT * FROM header_penjualan INNER JOIN detail_penjualann ON header_penjualan.no_transaksi=detail_penjualann.no_transaksi ORDER BY header_penjualan.no_transaksi DESC LIMIT 1");
while($data = mysqli_fetch_array($result))
{
?>
  <tr>
<td align="center"><?php echo $data['no_transaksi']; ?></td>
      <td align="center"><?php echo $data['tanggal']; ?></td>
      <td align="center"><?php echo $data['pembeli']; ?></td>
      <td align="center"><?php echo $data['kode_minuman']; ?></td>
      <td align="center"><?php echo $data['jumlah']; ?></td>
      <td align="center"><?php echo $data['harga_satuan']; ?></td>
      <td align="center"><?php echo $data['sub_total']; ?></td>
      <td align="center"><?php echo $data['level_gula']; ?></td>
      <td align="center"><?php echo $data['level_es']; ?></td>
      <td align="center"><?php echo $data['toping']; ?></td>
      <td>
        <a href="ganti_lah.php?no_transaksi=<?php echo $data['no_transaksi'];?>">Ganti Pesanan</a>
    </tr>

<?php
}
?>
</table>
</center>
    <br>
      <button class="button"><a href="index.php">HOME</a></button></br>
      </div>
    </div>
    <div class="clear"></div>
    <div class="footer">
      <font>Created By. Funny F Tampubolon & Ira K Wardani</font>
    </div>
  </div>
</body>
</html>