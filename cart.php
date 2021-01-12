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
			<!DOCTYPE html>
<head>
	<title>Thai Tone's Cafe</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
// Start the session
session_start();
require 'koneksi.php';
require 'item.php';

if(isset($_GET['id']) && !isset($_POST['update']))  { 
	$sql = "SELECT * FROM minuman WHERE kode_minuman=".$_GET['id'];
	$result = mysqli_query($koneksi, $sql);
	$product = mysqli_fetch_object($result); 
	$item = new Item();
	$item->kode_minuman = $product->kode_minuman;
	$item->nama_minuman = $product->nama_minuman;
	$item->harga = $product->harga;
    $iteminstock = $product->quantity;
	$item->quantity = 1;
	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;
}
// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>
<center>
<h2> Data Pesanan Anda: </h2> 
<form method="POST">
<table id="t01">
<tr>
	<th>Option</th>
	<th>Kode minuman</th>
	<th>Nama minuman</th>
	<th>Harga</th>

	 
	<th>Total</th>
</tr>
<?php 
     $cart = unserialize(serialize($_SESSION['cart']));
 	 $s = 0;
 	 $index = 0;
 	for($i=0; $i<count($cart); $i++){
 		$s += $cart[$i]->harga*$cart[$i]->quantity;
 ?>	
   <tr>
    	<td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
   		<td> <?php echo $cart[$i]->kode_minuman; ?> </td>
   		<td> <?php echo $cart[$i]->nama_minuman; ?> </td>
   		<td>Rp. <?php echo $cart[$i]->harga; ?> </td>
   
        <td> Rp.<?php echo $cart[$i]->harga*$cart[$i]->quantity; ?> </td> 
   </tr>
 	<?php 
	 	$index++;
 	} ?>
 	<tr>
 		<td colspan="4" style="text-align:right; font-weight:bold">Total Bayar 
         <input type="hidden" name="update">
 		</td>
 		<td> Rp.<?php echo $s; ?> </td>
 	</tr>
</table>
</center>
</form>
<br>
<a href="pesanminum.php">Continue Shopping</a> | <a href="checkoutt.php">Checkout</a>
<?php 
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: cart.php');
} 
?>


</center>
			</div>
		</div>
		<div class="clear"></div>
		<div class="footer">
			<font >Created By . Funny F Tampubolon & Ira K Wardani</font>
		</div>
	</div>
</body>
</html>
