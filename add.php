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

				<table border="10" bordercolor="orange" bgcolor="white">
<th width = "500" height = "215"><br>
	<form action="add.php" method="post" name="file1">
		<table border="0">
			<tr>
				<td>Nama Minuman</td>
				<td><input type="text" name="nama_minuman"></td>
			</tr>
			<tr>
				<td>Toping</td>
				<td><input type="text" name="toping"></td>
			</tr>
			<tr>
				<td>Harga Satuan</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit">
				<input type="reset" name="hapus" value="Hapus"></td>

			</tr>
			<br>
			<tr>
				<td><button class="button"><a href="index.php">Home</a></button>
			<button class="button"><a href="logout.php">Logout</a></button>
			<button class="button"><a href="dataminuman.php">LIHAT DATA</a></button>
		</td>
		</tr>
		</table>
	</form>
			
	<?php
include_once 'koneksi.php';
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['submit'])) {
		$nama_minuman = $_POST['nama_minuman'];
		$toping = $_POST['toping'];
		$harga = $_POST['harga'];
		


		// Insert user data into table
		$result = mysqli_query($koneksi, "INSERT INTO minuman (nama_minuman, toping, harga) VALUES ('$nama_minuman', '$toping', '$harga')")or die(mysqli_error());

		// Show message when user added
		echo "Data Baru Telah Ditambahkan <a href='dataminuman.php'>Lihat Data</a>";
	}
	?>


		</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<font color="white">Created By. Funny F Tampubolon & Ira K Wardani</font>
		</div>
	</div>
</body>
</html>
