<?php require_once('Connections/p.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_p, $p);
$query_p = "SELECT * FROM produk";
$p = mysql_query($query_p, $p) or die(mysql_error());
$row_p = mysql_fetch_assoc($p);
$totalRows_p = mysql_num_rows($p);
?>

<html lang="en" class="no-js">

<head>
<title>MARVEL'SHOP</title>
<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple Multi-Item Slider with CSS Animations and jQuery</title>
		<meta name="description" content="Simple Multi-Item Slider: Category slider with CSS animations" />
		<meta name="keywords" content="jquery plugin, item slider, categories, apple slider, css animation" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script src="js/modernizr.custom.63321.js"></script>
<LINK REL=StyleSheet HREF="style4.css" TYPE="text/css" MEDIA=screen>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<body onLoad="MM_preloadImages('images/shopping-cart-icon.png')">

<div id="top">
<div id="header" style="
    padding-left: 100px;
    padding-right: 100px;
    padding-bottom: 150px;
">
      <h1 id="logo"><a href="#">MARVEL'SHOP</a></h1>
      <div id="menulinks">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="cara_pembayaran.php">How to Buy</a></li>
          <li><a href="konfirmasi.php">Confirm Order</a></li>
          <li><a href="testi.php">Testimonials</a></li>
          <li class="last"> <a href="contact.html">Contact</a></li>
        </ul>
      </div>
    </div>
	
	<center><div id="page" style="
    padding-top: 20px;
">
	    <div id="cart">
		<h2>
	    Your List Cart :</h2>
	  
	  <p><br class="clearfloat" />
	    <a href="cart.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/shopping-cart-icon.png',1)"><img src="images/Cart-icon.png" alt="Cek Keranjang" width="48" height="48" id="Image6"></a></p>
		<p style="
    padding-bottom: 30px;
">
  <?php include "cart2.php"; ?>
	    </p>
    </div></center>
	
	<div id="mainarea">
<div id="produk" style="
    padding-left: 365px;
    padding-top: 100px;
">
	
	    <?php

					$sql = mysql_query("SELECT * FROM produk WHERE id_produk='$prod'");
					$d = mysql_fetch_array($sql);
					?>
        <div align="center">
          <table width="551" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="547" height="248" align="center">
              
              <h1 class="Judul">Your List Cart :</h1>
		<div class="KetProd">
						<table class="TableCart" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px dotted #0; border-bottom: 1px dotted #0;">
							<tr><th width="4%" height="35" align="center">No</th>
								<th width="12%" align="center">Gambar</th>
								<th width="24%" align="center">Nama Produk</th>
								<th width="15%" align="center">Harga (Rp.)</th>
                                <th width="10%" align="center">Jumlah</th>
                                <th width="16%" align="center">Subtotal (Rp.)</th>
								<th width="18%" align="center">Aksi
							    <?php
$total = 0;
$sid = session_id();
$no = 1;


	
$sql = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");
							
$hitung = mysql_num_rows($sql);
if ($hitung < 1){
echo"<script>window.alert('Your cart is empty!');
										window.location=('index.php')</script>";
}
else {
while($tian=mysql_fetch_array($sql)){
	
	$subtotal    = $tian['harga']*$tian['qty'];
   $total       +=$subtotal;
echo"<tr><td align='center'>$no</td>
<td align='center'><img width=50 src=foto/$tian[gambar]></td>
					<td align='center'>$tian[nama_produk]</td>
					<td align='center'>$tian[harga]</td>
					<td align='center'>$tian[qty]</td>
					<td align='center'>$subtotal</td>
					<td align='center'>
					<a href= 'input.php?input=add&id=$tian[id_produk]'><img src='images/plus3.png' width='24' height='24'></a>
					||
					<a href= 'input.php?input=delete&id=$tian[id_keranjang]' onclick='return confirm(\'Anda Yakin?\');'><img src='images/delete3.png' width='24' height='24'></a>
					</td></tr>";
$no++;
}
}
?></th>
							<td width="1%"></th>
						  </table>
						
						<table class="TableCart" width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top: 1px dotted #0; border-bottom: 1px dotted #0;">
						  <tr>
			      </table>


<h2>Total = Rp. <?php echo number_format($total); ?> </h2>
<p><a class="tombol2" href="order.php"><img src="images/checkouttt.png" width="200" height="72" alt="Checkout"></a>
  <a class="tombol" href="index.php"><font color="white">&lt;&lt; Beli Lagi</font><img src="images/belanjalagiii.png" width="80" height="72" alt="Belanja Lagi"></a></p>
		</div>
		<p>&nbsp;</p>
              </td>
            </tr>
            
          </table>
        </div>
      </div>
	</div>
    
    <div id="kategori">
      <div id="navigation">
        <?php 
							$kat = mysql_query("SELECT nama_merk, merk.id_merk from merk join produk on produk.id_merk=merk.id_merk group by nama_merk");
							while($list=mysql_fetch_array($kat)){
								echo"<li><a href='product.php?cat=$list[id_merk]'>$list[nama_merk]</a></li>";
							}
						?>
      </div>
    </div>
   
	  
	 



</div>
	<div id="footer" style="
    margin-top: 500px;
">
		 Copyright © 2017 Politeknik Caltex Riau |<a href="https://www.facebook.com/zidane.hitsugaya"> Desain by : Brima Zidane Ferdiyan</a>
	</div></div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>

</html>

