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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE transaksi SET status=%s WHERE id_transaksi=%s",
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id_transaksi'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());
	if($updateSQL)
  {
	  echo"<script type='text/javascript'>
	  alert ('Konfirmasi Berhasil. ');
	  document.location ='konfirmasi.php';
	  </script>";
  }
  $updateGoTo = "konfirmasi.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Update Konfirmasi Pembayaran</title>
<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
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

<body>

<div id="page"><div id="page2">
	<div id="header">
	</div>
	
	<div id="menulinks">
		<a  href="index.php"><span>Home</span></a>
		<a href="cara_pembayaran.php"><span>Cara Pembayaran</span></a>
        <a class="active"href="konfirmasi.php"><span>Konfirmasi</span></a>
		<a href="testi.php"><span>Testimoni</span></a>
        <a href="..\Project\index.html"><span>MARVELPEDIA.COM</span></a>
        
	</div>
	
	
	<div id="mainarea">
	  <div id="produk">

	    <h1 class="Judul">&nbsp;</h1>
	    <h1 class="Judul">Konfirmasi Pembayaran :</h1>
        <div align="center">
          <table width="551" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="547" align="center"><p>&nbsp;</p>
                <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
                  <table width="440" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="440"><table border="0" align="center">
                        <tr valign="baseline">
                          <td width="71" height="34" align="right" nowrap>&nbsp;</td>
                          <td width="125" height="34" align="right" nowrap><h4>ID Transaksi Anda:</h4></td>
                          <td width="214" align="center" nowrap><h4><?php echo $row_l['id_transaksi']; ?></h4></td>
                          <td width="12" align="center" nowrap>&nbsp;</td>
                        </tr>
                        <tr valign="baseline">
                          <td height="31" colspan="2" align="right" nowrap><label for="status">Pilih Status Pembayaran :</label></td>
                          <td align="center"><select name="status"   id="status">
                            <option selected="selected">Belum Bayar</option>
                            <option>SUDAH BAYAR</option>
                          </select></td>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr valign="baseline">
                          <td colspan="4" align="center" nowrap></td>
                        </tr>
                        <tr valign="baseline">
                          <td height="10" colspan="4" align="center" nowrap>
                            <hr>
                           
                            
                            </td>
                          </tr>
                        <tr valign="baseline">
                          <td height="61" colspan="3" align="center" nowrap><input type="submit" value="                          KONFIRMASI                         "></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table>
                  <input type="hidden" name="MM_update" value="form1">
                  <input type="hidden" name="id_transaksi" value="<?php echo $row_l['id_transaksi']; ?>">
                </form>
                
<p></p></td>
            </tr>
          </table>
        </div>
      </div>
	</div>
    
    <div id="kanan">
    <div id="cart">
	  <h2>
	    Your List Cart :</h2>
	  <p>
  <?php include "cart2.php"; ?>
	    </p>
	  <p><br class="clearfloat" />
	    <a href="cart.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/shopping-cart-icon.png',1)"><img src="images/Cart-icon.png" alt="Cek Keranjang" width="48" height="48" id="Image6"></a></p>
    </div>
    <table width="215" border="0" cellspacing="0" cellpadding="0">
  </table>
  
    <div id="kategori">
      <div id="navigation">

      </div>
	</div>
    
    
    <div id="info">
	  <table width="210" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td><hr></td>
	      </tr>
	    </table>
	  <h2>&nbsp;</h2>
	</div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
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
