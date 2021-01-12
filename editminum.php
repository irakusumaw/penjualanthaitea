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
      <ul class="button"><a href="login.php" style="text-decoration: none"><font color="orange">ADMIN</font></a></ul>
    </div>

    <div class="badan">     
      <div class="sidebar">
      <br>
      <nav>
        <center>
      <ul class="button"><a href="add.php">Kelola Data Minuman</a></ul></br>
      <br>
      <ul class="button"><a href="laporan.php">Kelalola Data Laporan</a></ul></br>
    </center>
    </nav>
      </div>
			<div class="content">
<?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("barang",$conn);
if($_POST){
	mysql_query("UPDATE minuman set kode_minuman ='{$_POST['kode_minuman']}', nama_minuman='{$_POST['nama_minuman']}',toping='{$_POST['toping']}', harga='{$_POST['harga']}' 
	where kode_minuman='{$_POST['kode_minuman']}'");
	echo "Data telah di edit";
	header("Location: dataminuman.php");
}
include 'koneksi.php';
$kode_minuman = $_GET['kode_minuman'];
$sql = "SELECT * from minuman where kode_minuman='$kode_minuman'";
$result = mysql_query($sql); 
$product = mysql_fetch_array($result);
?>

<h2>EDIT DATA</h2>
<form name="form1" action="editminum.php" method="post">
	<dl>
		<dt>Kode minuman</dt>
		<dd><input type="text" name="kode_minuman" value="<?php echo $product['kode_minuman'];?>"/></dd>
		<dt>Nama Minuman</dt>
		<dd><input type="text" name="nama_minuman" value="<?php echo $product['nama_minuman'];?>"/></dd>
		<dt>Toping</dt>
		<dd><input type="text" name="toping" value="<?php echo $product['toping'];?>"/></dd>
		<dt>Harga</dt>
		<dd><input type="text" name="harga" value="<?php echo $product['harga'];?>"/></dd>
		<br>
		<dd>
		<td><input type="submit" value="UPDATE"></td>
		<td>
		<button class="button"><a href="index.php">HOME</a></button></td>
	</dd>
	</dl>
	<input type="hidden" name="kode_minuman" value="<?php echo $product['kode_minuman'];?>"/>
</form>
