<?php
$no_transaksi = (int) $_GET['no_transaksi'];
if($no_transaksi){
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("barang",$conn);
	
	mysql_query("DELETE from header_penjualan where no_transaksi='{$no_transaksi}'");
	
	mysql_query("DELETE from detail_penjualann where no_transaksi='{$no_transaksi}'");
}

header("Location: index.php");
exit;
?>