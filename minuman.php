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
			<nav>
				<center>
<?php
					include_once'koneksi.php';
$result = mysqli_query($koneksi,"SELECT * FROM minuman");
while($data = mysqli_fetch_array($result))
{
?>
			<ul class="button"><a href="minuman.php?kode=<?php echo $data['kode_minuman'];?>"><?php echo $data['nama_minuman'];?></a></ul>
			<br>

<?php
}
?>
		</center>
		</nav>
	</div>
			<div class="content">
				<img align="left" src="thaido.jpeg" style="width:300px; height:350px; padding-left=10px;"></img>
				<script>
				function startCalc(){
						interval = setInterval("calc()", 1);
					}
					function calc(){
						a = document.doremi.jumlah.value;
						b = document.doremi.harga_satuan.value;
						document.doremi.sub_total.value = ((a*1)*(b*1));
					}
					function stopCalc(){
						clearInterval(interval);
					}
				</script>
				<form action="doremi.php" method="post" name="doremi">
		<table border="0">
					<?php
					if(isset($_GET['kode'])){
						$kode = $_GET['kode'];
						$result = mysqli_query($koneksi,"SELECT * FROM minuman where kode_minuman= $kode ");
while($data = mysqli_fetch_array($result))
{
	?>
			<tr>
				<td>Tanggal</td>
				<td><input type="date" name="tanggal" value="<?=date('Y-m-d')?>"></td>
			</tr>
			<tr>
				<td>Pembeli</td>
				<td><input type="text" name="pembeli"></td>
			</tr>
			<tr>
		
	
				<td>Kode Minuman</td>
				<td><input type="text" name="kode_minuman" value="<?php echo $data['kode_minuman']?>"></td>
				</select>
			</tr>
            <tr>
				<td>Jumlah</td>
				<td><input type="text" name="jumlah" onfocus="startCalc();" onblur="stopCalc();"></td>
			</tr>
			<tr>
				<td>Harga Satuan</td>
				<td><input type="text" name="harga_satuan" value="<?php echo $data['harga']?>" onfocus ="startCalc();" onblur="stopCalc();"></td>
			</tr>
			<tr>
				<td>Subtotal</td>
				<td><input type="text" name="sub_total" onfocus="startCalc();" onblur="stopCalc();"></td>
			</tr>
            <tr>
				<td>Level Gula</td>
				<td><input type="text" name="level_gula"></td>
			</tr>
			<tr>
				<td>Level Es</td>
				<td><input type="text" name="level_es"></td>
			</tr>
			<tr>
        		<td>Toping</td>
        		<td>
        		<select name="toping" onchange="cek_database()" id="toping">
        		<option value='' selected>- Pilih -</option>
        		<?php
    			include "koneksi.php";
    			$minuman = mysqli_query($koneksi,"SELECT * FROM minuman");
    			while ($row = mysqli_fetch_array($minuman)) {
      			echo "<option value='$row[toping]'>$row[toping]</option>";
    			}
  				?>
      			</td>
        		</select>
     		 </tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Submit">
					<input type="reset" name="hapus" value="Hapus"></td>
			</tr>
			<?php

}
					}
				?>
		</table>
	</form>
<br>
			<button class="button"><a href="index.php">HOME</a></button></br>
	<br><br>
	<?php
include_once 'koneksi.php';
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['submit'])) {
		$tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tanggal']));
		$pembeli = trim(mysqli_real_escape_string($koneksi, $_POST['pembeli']));
		$kode_minuman = trim(mysqli_real_escape_string($koneksi, $_POST['kode_minuman']));
		$jumlah = trim(mysqli_real_escape_string($koneksi, $_POST['jumlah']));
		$harga_satuan = trim(mysqli_real_escape_string($koneksi, $_POST['harga_satuan']));
		$sub_total = trim(mysqli_real_escape_string($koneksi, $_POST['sub_total']));
		$level_gula= trim(mysqli_real_escape_string($koneksi, $_POST['level_gula']));
		$level_es = trim(mysqli_real_escape_string($koneksi, $_POST['level_es']));
		$toping = trim(mysqli_real_escape_string($koneksi, $_POST['toping']));
		

		// Insert user data into table
		$sql1 = "INSERT INTO header_penjualan VALUES ('','$tanggal', '$pembeli')";
		$sql2 = "INSERT INTO detail_penjualann VALUES ('','$kode_minuman','$jumlah', '$harga_satuan', '$sub_total', '$level_gula', '$level_es', '$toping')";
		mysqli_query($koneksi,$sql1);
		mysqli_query($koneksi,$sql2);

		// Show message when user added
		
		header("Location: pesanan.php");
	}
	?>	
			

			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<font>Created By. Funny F Tampubolon & Ira K Wardani</font>
		</div>
	</div>
</body>
</html>