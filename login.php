<html>
<head>
	<title>Thai Tone's Cafe</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="wrap">
		<div class="header">			
			<h1><font color="orange" align="center" face="Curlz MT" size="20" stye="bold">THAI TONE'S CAFE</font></h1>
			<p><font color="orange">Tempat Nongkrong Paling Hitz</font></p>
			
		</div>
		<div class="badan">			
			<div class="sidebar">
			</div>
			<div class="content">
				<center>
				<br></br><br></br>
				<table border="10" bordercolor="orange" bgcolor="white">
				<th width = "500" height = "215"><br>
				<font face="Broadway" size="10" color="black">LOGIN</font>
				<br></br>
				<form action="login.php" method="post" name="backend" onSubmit="return cekform()">
					<input class="search" name="user" type="text" placeholder="nama" required><br>
					<input class="search" name="pass" type="password" placeholder="masukan password" required><br>
				<br>
					<input class="button" name="login" type="submit" id="login" value="LOGIN">
					<button class="button"><a href="index.php">HOME</a></button></td>
</form>
<?php
				include_once 'koneksi.php';

	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$cek = mysqli_query($koneksi, "SELECT * FROM login WHERE nama = '$user' AND password = '$pass'");
		$hasil = mysqli_fetch_array($cek);
		$level = $hasil['level'];
		$row = mysqli_num_rows($cek);
		if ($row > 0) {
			if($level == 'Kasir'){
				header('location: utamakm.php');
			}else if($level == 'Manager'){
				header('location: manager.php');
			}else{
				echo 'login gagal';
			}
		}
	}
?>

</th>
</table>
</center>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<font >Created By. Funny F Tampubolon & Ira K Wardani</font>
		</div>
	</div>
</body>
</html>

