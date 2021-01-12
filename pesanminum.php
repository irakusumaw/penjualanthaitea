<!DOCTYPE html>
<html>
<head>
	<title>Thai Tone's Cafe</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="style1.css">
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
			
				<center>
			<ul class="button"><a href="pesanminum.php">DAFTAR MENU</a></ul></br>
			<br>
		</center>
		
			</div>
			<div class="content">
			<?php 
require 'koneksi.php';
$sql = 'SELECT * FROM minuman';
$result = mysqli_query($koneksi, $sql);
 ?>
 <center>
<h2> Silahkan Pilih Pesanan Anda: </h2>
 <table id="t01">
 <tr>
 	<th>Id</th>
 	<th>Name</th>
 	<th>Harga</th>
 	<th>Toping</th>
 	<th>Beli</th>
 </tr>
 	<?php while($product = mysqli_fetch_object($result)) { ?> 
	<tr>
		<td> <?php echo $product->kode_minuman; ?> </td>
		<td> <?php echo $product->nama_minuman; ?> </td>
		<td> Rp.<?php echo $product->harga; ?> </td>
		<td> <?php echo $product->toping; ?> </td>
		<td> <a href="cart.php?id= <?php echo $product->kode_minuman; ?> &action=add">Order Now</a> </td>
	</tr>
	<?php } ?>
 </table>
</center>
