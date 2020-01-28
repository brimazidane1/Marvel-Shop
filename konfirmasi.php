<?php require_once('Connections/p.php'); ?>
<?php require_once('Connections/koneksi.php'); ?>
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

$colname_l = "-1";
if (isset($_GET['id_transaksi'])) {
  $colname_l = $_GET['id_transaksi'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_l = sprintf("SELECT * FROM transaksi WHERE id_transaksi = %s", GetSQLValueString($colname_l, "int"));
$l = mysql_query($query_l, $koneksi) or die(mysql_error());
$row_l = mysql_fetch_assoc($l);
$totalRows_l = mysql_num_rows($l);

$colname_pl = "-1";
if (isset($_GET['id_pelanggan'])) {
  $colname_pl = $_GET['id_pelanggan'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_pl = sprintf("SELECT * FROM pelanggan WHERE id_pelanggan = %s", GetSQLValueString($colname_pl, "int"));
$pl = mysql_query($query_pl, $koneksi) or die(mysql_error());
$row_pl = mysql_fetch_assoc($pl);
$totalRows_pl = mysql_num_rows($pl);
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
          <li><a href="index.php">Home</a></li>
          <li><a href="cara_pembayaran.php">How to Buy</a></li>
          <li><a class="active" href="konfirmasi.php">Confirm Order</a></li>
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
    padding-left: 350px;
    padding-top: 50px;
">
	    
	    <h1 class="Judul">&nbsp;</h1>
	    <h1 class="Judul">Cek Status  Pembayaran :</h1>
        <div align="center">
          <table width="551" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="547" align="center"><form name="form1" method="get" action="">
                  <label for="id_transaksi"></label>
                  <div align="center">
                    <p>
                      <input name="id_transaksi" type="text" id="id_transaksi" placeholder="Cek Info Transaksi" size="20">
                      <input type="submit" name="button" id="button" value="Cari">
                      <input name="id_pelanggan" type="text" id="id_pelanggan" placeholder="Cek Data Order" size="20">
                      <input type="submit" name="button2" id="button2" value="Cari">
                    </p>
                  </div>
              </form>
                <?php if ($totalRows_pl > 0) { // Show if recordset not empty ?>
  <table border="1">
    <tr>
      <td width="102" align="center"><strong>ID Pelanggan</strong></td>
      <td width="75" align="center"><strong>Nama</strong></td>
      <td width="83" align="center"><strong>Alamat</strong></td>
      <td width="95" align="center"><strong>Telepon</strong></td>
      <td width="149" align="center"><strong>Email</strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <td align="center"><?php echo $row_pl['id_pelanggan']; ?></td>
        <td align="center"><?php echo $row_pl['nama']; ?></td>
        <td align="center"><?php echo $row_pl['alamat']; ?></td>
        <td align="center"><?php echo $row_pl['telepon']; ?></td>
        <td align="center"><?php echo $row_pl['email']; ?></td>
      </tr>
      <?php } while ($row_pl = mysql_fetch_assoc($pl)); ?>
  </table>
  <?php } // Show if recordset not empty ?>
<?php if ($totalRows_l > 0) { // Show if recordset not empty ?>
                  <table width="531" border="1" cellspacing="0" cellpadding="0">
                    <tr>
      <td width="527"><table width="521" border="0" align="center">
        <?php do { ?>
            <tr>
              <td width="223" height="26" align="right">ID</td>
              <td width="14">:</td>
              <td width="247"><strong><?php echo $row_l['id_transaksi']; ?></strong></td>
              <td width="19">&nbsp;</td>
              </tr>
        <tr>
          <td height="27" align="right">Tanggal</td>
          <td>:</td>
          <td width="247"><strong><?php echo $row_l['tanggal']; ?></strong></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td align="right">Total</td>
          <td>:</td>
          <td><strong>Rp.<?php echo $row_l['total']; ?></strong></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td align="right">ID Pelanggan</td>
          <td>:</td>
          <td><strong><?php echo $row_l['id_pelanggan']; ?></strong></td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td height="34" align="right" valign="middle">Status</td>
          <td valign="middle">:</td>
          <td width="247" align="left" valign="top"><h2><strong><?php echo $row_l['status']; ?></strong></h2></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><hr></td>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" align="center"></td>
          <td align="center"><a href="bayar.php?id_transaksi=<?php echo $row_l['id_transaksi']; ?>"><img src="images/check1.png" width="100" height="40"></a></td>
          <td align="center">&nbsp;</td>
        </tr>
        <?php } while ($row_l = mysql_fetch_assoc($l)); ?>
      </table></td>
    </tr>
</table>
  <br>
  <br>
<?php } // Show if recordset not empty ?>
<p align="center"><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/belanja.png',1)"></a></p></td>
            </tr>
          </table>
        </div>
      </div>
	</div>
    
    
	<div id="footer" style="
    margin-top: 400px;
">
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

mysql_free_result($l);

mysql_free_result($pl);
?>
