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
	$sql = "update header_penjualan set no_transaksi='{$_POST['no_transaksi']}', tanggal='{$_POST['tanggal']}',pembeli='{$_POST['pembeli']}' 
	where no_transaksi='{$_POST['no_transaksi']}'";
	mysql_query($sql);
	
	$sql = "update detail_penjualann set kode_minuman='{$_POST['kode_minuman']}',jumlah='{$_POST['jumlah']}',
	harga_satuan='{$_POST['harga_satuan']}',sub_total='{$_POST['sub_total']}' where no_transaksi='{$_POST['no_transaksi']}'";
	mysql_query($sql);
	echo "Data telah di edit";
	header("Location: laporan.php");
}
include 'koneksi.php';
$no_transaksi = $_GET['no_transaksi'];
$sql = "select * from header_penjualan p inner join detail_penjualann b on p.no_transaksi=b.no_transaksi where p.no_transaksi='$no_transaksi'";
$result = mysql_query($sql); 
$product = mysql_fetch_array($result);
?>

<h2>EDIT DATA</h2>
<form name="form1" action="edit_lah.php" method="post">
	<dl>
		<dt>No Transaksi</dt>
		<dd><input type="text" name="no_transaksi" value="<?php echo $product['no_transaksi'];?>"/></dd>
		<dt>Tanggal</dt>
		<dd><input type="date" name="tanggal" value="<?php echo $product['tanggal'];?>"/></dd>
		<dt>Pembeli</dt>
		<dd><input type="text" name="pembeli" value="<?php echo $product['pembeli'];?>"/></dd>
		<dt>Kode Minuman</dt>
		<dd><input type="text" name="kode_minuman" value="<?php echo $product['kode_minuman'];?>"/></dd>
		<dt>Jumlah</dt>
		<dd><input type="text" name="jumlah" value="<?php echo $product['jumlah'];?>"/></dd>
		<dt>Harga Satuan</dt>
		<dd><input type="text" name="harga_satuan" value="<?php echo $product['harga_satuan'];?>"/></dd>
		<dt>Sub Total</dt>
		<dd><input type="text" name="sub_total" value="<?php echo $product['sub_total'];?>"/></dd>
		<br>
		<dd>
		<td><input type="submit" value="UPDATE"></td>
		<td>
		<button class="button"><a href="index.php">HOME</a></button></td>
	</dd>
	</dl>
	<input type="hidden" name="no_transaksi" value="<?php echo $product['no_transaksi'];?>"/>
</form>
