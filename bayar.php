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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO konfirmasi (id_transaksi, tanggal, nama, bank, no_rekening, jumlah) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_transaksi'], "int"),
                       GetSQLValueString($_POST['tanggal'], "date"),
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['bank'], "text"),
					   GetSQLValueString($_POST['rekening'], "text"),
                       GetSQLValueString($_POST['jumlah'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
	if (mysql_query($insertSQL))
  {
    echo"<script>window.alert('Data Berhasil Ditambahkan !.');
										window.location=('password.php')</script>";
  }
  $insertGoTo = "konfirmasi2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
	
	
	<div id="mainarea">
	 <div id="produk" style="
    padding-left: 350px;
    padding-top: 100px;
">
	    
	    <h1 class="Judul">&nbsp;</h1>
	    <h1 class="Judul">Form Konfirmasi Pembayaran :</h1>
        <div align="center">
          <table width="551" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="547" align="center"><form method="post" name="form2">
                  <p>&nbsp;</p>
                  <table width="418" border="1" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="414"><table align="center">
                        <tr valign="baseline">
                          <td width="125" align="right" nowrap>&nbsp;</td>
                        </tr>
                        <tr valign="baseline">
                          <td height="27" align="right" nowrap>Tanggal :</td>
                          <td width="243"><input type="date" name="tanggal" value="" placeholder="Format : yyyy-mm-dd."  required size="15"></td>
                        </tr>
                        <tr valign="baseline">
                          <td height="29" align="right" nowrap>Atas Nama :</td>
                          <td><input type="text" name="nama" placeholder="Masukkan Nama Anda..." value=""  required size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td height="29" align="right" nowrap>No. Rekening Marvel Syariah:</td>
                          <td><input name="rekening" type="number"  required id="rekening" placeholder="Masukkan Rekening Anda..." value="" size="32"></td>
                        </tr>
                        <tr valign="baseline">
                          <td height="29" align="right" nowrap>Ke Bank :</td>
                          <td><label for="bank"></label>
                            <select name="bank" id="bank">
                              <option>MARVEL SYARIAH</option>
                            </select></td>
                        </tr>
                        <tr valign="baseline">
                          <td height="32" align="right" nowrap>Jumlah (Rp.) :</td>
                          <td><input type="number" name="jumlah" placeholder="Masukkan Jumlah Tagihan..."  value=""  required size="20"></td>
                        </tr>
                        <tr valign="baseline">
                          <td colspan="2" align="right" nowrap><hr></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap align="center"><a href="javascript:history.go(-1)"><strong><img src="images/back1.png" width="48" height="48"></strong></a></td>
                          <td valign="middle"><a href="javascript:history.go(-1)"><strong><img src="images/confirm.png" width="120" height="48"></strong></a></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <input type="hidden" name="id_transaksi" value="<?php echo $row_l['id_transaksi']; ?>" size="32">
                  <input type="hidden" name="MM_insert" value="form2">
</form>


<p></p></td>
            </tr>
          </table>
		  <h2 align="center" style="
    padding-bottom: 100px;
">&nbsp;</h2>
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

mysql_free_result($l);
?>
