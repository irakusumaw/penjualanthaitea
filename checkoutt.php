<?php 
session_start();
require 'koneksi.php';
require 'item.php';

// Save new orders
$sql1 = 'INSERT INTO header_penjualan (tanggal,pembeli) VALUES ("'.date('Y-m-d').'","'.date('Y-m-d').'")';
mysqli_query($koneksi, $sql1);
$id = mysqli_query($koneksi, "select no_transaksi from header_penjualan group by no_transaksi desc limit 1");
$id = mysqli_fetch_array($id);

$ordersid = mysqli_insert_id($koneksi); 
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));
// for($i=0; $i<count($cart);$i++) {
// $sql2 = 'INSERT INTO details_penjualan (kode_minuman,no_transaksi,harga,quantity, nama_minuman) VALUES ('.$cart[$i]->kode_minuman.', '.$ordersid.', '.$cart[$i]->harga.', '.$cart[$i]->quantity.', "'.$cart[$i]->nama_minuman.'")';
// mysqli_query($koneksi, $sql2);
// print_r($sql2);
// }

for($i=0; $i<count($cart);$i++) {
@$sql2 .= ' ('.$cart[$i]->kode_minuman.', '.$id['no_transaksi'].', '.$cart[$i]->harga.', '.$cart[$i]->quantity.', "'.$cart[$i]->nama_minuman.'"),';


}


$sql2 = 'INSERT INTO details_penjualan (kode_minuman,no_trans,harga,quantity, nama_minuman) VALUES'.$sql2;
//mysqli_query($koneksi, $sql2);
// Clear all product in cart
//unset($_SESSION['cart']);

$sql2 = substr($sql2, 0, strlen($sql2)-1);
//echo $sql2;
mysqli_query($koneksi, $sql2);
unset($_SESSION['cart']);
 ?>
 Thanks for buying products. Click <a href="index.php">here</a> to continue purchasing products.


