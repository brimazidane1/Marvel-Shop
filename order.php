<?php require_once('Connections/p.php'); ?>
<?php
$total = 0;
$sid = session_id();
$no = 1;
$sql = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");
							
$hitung = mysql_num_rows($sql);
if ($hitung < 1){
echo"<script>window.alert('Keranjang Belanja Anda Kosong!');
										window.location=('index.php')</script>";
}
else {
while($tian=mysql_fetch_array($sql)){
	$subtotal    = $tian['harga']*$tian['qty'];
   $total       +=$subtotal;
$no++;
}
}
?> 
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
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.63321.js"></script>
<LINK REL=StyleSheet HREF="style4.css" TYPE="text/css" MEDIA=screen>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

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
    padding-left: 380px;
    padding-top: 100px;
    padding-bottom: 100px;
">
	    
        <div align="center">
          <table width="551" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="547" height="248" align="center">
              
              <h1 class="Judul">Form Pemesanan Produk :</h1>
<h2 align="center">Total Belanja Anda = Rp. <?php echo number_format($total); ?> </h2>		
                <form action="selesai.php?input=inputform" method="post">
                
				  <hr>
				  <div align="left">
				    <table>
				      <tr>
				        <td width="41">Nama</td>
				        <td width="4">:</td>
				        <td colspan="2"><div align="left">
				          <input name="name" type="text" required class="form" placeholder="Masukkan nama .." size="40">
			            </div></td>
				        
				        </tr>
				      <tr>
				        <td>Email</td>
				        <td>:</td>
				        <td colspan="2"><div align="left">
				          <input name="email" type="email" required class="form" placeholder="Masukkan E-mail .." size="40">
			            </div></td>
				        </tr>
				      <tr>
				        <td align="left" valign="center">Alamat</td>
				        <td valign="center">:</td>
				        <td colspan="2"><div align="left">
				          <textarea class="form" name="address" required placeholder="Masukkan Alamat .." cols="42" rows="7"></textarea >
			            </div></td>
				        </tr>
                      <tr>
				        <td align="left" valign="center">Detail</td>
				        <td valign="center">:</td>
				        <td colspan="2"><div align="left">
				          <textarea class="form" name="detail" required placeholder="Detail barang, Contoh : Ukuran .." cols="42" rows="7"></textarea >
			            </div></td>
				        </tr>
				      <tr>
				        <td>No HP</td>
				        <td>:</td>
				        <td colspan="2"><div align="left">
				          <input name="telp" type="number" required class="form" placeholder="Masukkan No. Telpon .." size="40">
			            </div></td>
				        </tr>
				      <tr>
				        <td></td>
				        <td>&nbsp;</td>
				        <td colspan="2">&nbsp;</td>
			          </tr>
				      <tr>
				        <td></td>
				        <td>&nbsp;</td>
				        <td colspan="2">&nbsp;</td>
			          </tr>
				      <tr>
				        <td></td>
				        <td>&nbsp;</td>
				        <td width="170"><input name="submit" type="submit" value="      ORDER     "></td>
				        
				        <td width="142" align="center">&nbsp;</td>
			          </tr>
				      <tr>
				        <td></td>
				        <td>&nbsp;</td>
				        <td colspan="2"><div align="left"></div></td>
				        <td width="142" align="center">&nbsp;</td>
				        </tr>
				      </table>
			      </div>
              </form></td>
            </tr>
            
          </table>
        </div>
      </div>
	</div>
	
    
	<div id="footer">
		 Copyright © 2017 Politeknik Caltex Riau |<a href="https://www.facebook.com/zidane.hitsugaya"> Desain by : Brima Zidane Ferdiyan</a>
	</div>


</div></div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>

</html>
<?php
mysql_free_result($p);
?>
