<!DOCTYPE html>
<html>
<head>
	<title>Thai Tone's Cafe</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<div class="header">			
			<h1><font color="pink" align="center" face="Curlz MT" size="20">THAI TONE'S CAFE</font></h1>
			<p><font color="white">Tempat Nongkrong Paling Hitz</font></p>
			<div class="sidebar">
			<button class="button"><a href="login.php">LOGIN</button>
			</div>
		</div>
		<div class="badan">			
			<div class="sidebar">
			<br>
			<button class="button">DOREMI</button></br>
			<br>
			<button class="button">REMIFA</button></br>
			<br>
			<button class="button">MIFASOL</button></br>
			<br>
			<button class="button">LAFARE</button></br>
			</div>
			<div class="content">
			<?php
				include_once 'koneksi.php';

	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE nama = '$user' AND password = '$pass'");
		$hasil = mysqli_fetch_array($cek);
		$level = $hasil['level'];
		$row = mysqli_num_rows($cek);
		if ($row > 0) {
			if($level == 'Kasir'){
				header('location: laporan.php');
			}else if($level == 'Manager'){
				header('location: utamakm.php');
			}else{
				echo 'login gagal';
			}
		}
	}
?>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<font color="white">Funny F Tampubolon & Ira K Wardani</font>
		</div>
	</div>
</body>
</html>

