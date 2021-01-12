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
      <ul class="button"><a href="add.php">Kelola Data Minuman</a></ul></br>
      <ul class="button"><a href="laporan.php">Kelola Data Laporan</a></ul></br>
      </div>
      <div class="content">
        <center>
<?php
include_once'koneksi.php';
?>
<table border="1">
<h2>DATA MINUMAN</h2>
<tr align="center">
    <td>Kode Minuman</td>
    <td>Nama Minuman</td>
    <td>Toping</td>
    <td>Harga</td>
</tr>
<?php
$result = mysqli_query($koneksi,"SELECT * FROM minuman");
while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
?>
	<tr>
      <td align="center"><?php echo $data['kode_minuman']; ?></td>
      <td><?php echo $data['nama_minuman']; ?></td>
      <td align="center"><?php echo $data['toping']; ?></td>
      <td align="center"><?php echo $data['harga']; ?></td>
      <td><a href="editminum.php?kode_minuman=<?php echo $data['kode_minuman'];?>">Edit</a> 
        <a href="delminum.php?kode_minuman=<?php echo $data['kode_minuman'];?>">Delete</a></td>
    </tr>
<?php
}
?>
</table>
</center>
    <br>
      <button class="button"><a href="index.php">Home</a></button></br>

      </div>
    </div>
    <div class="clear"></div>
    <div class="footer">
      <font>Created By. Funny F Tampubolon & Ira K Wardani</font>
    </div>
  </div>
</body>
</html>