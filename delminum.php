<?php
$kode_minuman = (int) $_GET['kode_minuman'];
if($kode_minuman){
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("barang",$conn);
	
	mysql_query("DELETE from minuman where kode_minuman='{$kode_minuman}'");
	
}

header("Location: dataminuman.php");
exit;
?>