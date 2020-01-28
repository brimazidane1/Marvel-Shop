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

mysql_select_db($database_koneksi, $koneksi);
$query_testimoni = "SELECT * FROM testimoni";
$testimoni = mysql_query($query_testimoni, $koneksi) or die(mysql_error());
$row_testimoni = mysql_fetch_assoc($testimoni);
$totalRows_testimoni = mysql_num_rows($testimoni);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO testimoni (nama, e_mail, kota, pesan) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['e_mail'], "text"),
                       GetSQLValueString($_POST['kota'], "text"),
                       GetSQLValueString($_POST['pesan'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());
  {
  echo"<script type='text/javascript'>
  alert('Thanks Buat Commentnya!');
  document.location='testi.php';
   </script>";
  }
}
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
          <li><a href="index.php">Home</a></li>
          <li><a href="cara_pembayaran.php">How to Buy</a></li>
          <li><a href="konfirmasi.php">Confirm Order</a></li>
          <li><a class="active" href="testi.php">Testimonials</a></li>
          <li class="last"> <a href="contact.html">Contact</a></li>
        </ul>
      </div>
    </div>
	
	
		<div id="mainarea">
	  <div id="produk" style="
    margin-top: 50px;
">
	   
	    
        <div align="center"><table>
		<tr><td style="
    padding-left: 80px;
">
          <table width="511" border="1" cellspacing="0" cellpadding="0">
		  <h1 class="Judul">Comment		</h1>
	        <tr>
	          <td width="507" height="101"><div align="center">
	            <table width="501" border="0">
	              <?php do { ?>
	                <tr>
	                  <td width="29">Dari </td>
	                  <td width="16">:</td>
	                  <td width="442"><?php echo $row_testimoni['nama']; ?>.| <?php echo $row_testimoni['kota']; ?>. | <?php echo $row_testimoni['e_mail']; ?>.</td>
	                  </tr>
	                <tr>
	                  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
	                  <td rowspan="2" align="left" valign="top"><?php echo $row_testimoni['pesan']; ?></td>
	                  </tr>
	                <tr>
	                  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
	                  </tr>
	                <tr>
	                  <td colspan="3"><hr></td>
	                  </tr>
	                <?php } while ($row_testimoni = mysql_fetch_assoc($testimoni)); ?>
	              </table>
	          </div></td>
			  <td>

			  </td>
            </tr>
          </table>
		  </td>
					<td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td><td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
	                  <td>&nbsp;</td><td>&nbsp;</td>
	                  <td>&nbsp;</td>
					  <td>&nbsp;</td>



		  <td>
		  			  <div id="comment">
      <h2 align="center"><a href="testi.php"><img src="images/comment1.png" width="162" height="122"></a></h2>
	  <h2>&gt;&gt; Comment below . .	  </h2>
	  <form method="post" name="form2" action="<?php echo $editFormAction; ?>">
	    <table align="center">
          <tr valign="baseline">
            <td align="right" nowrap><div align="left">Nama:</div></td>
          </tr>
          <tr valign="baseline">
            <td height="29" align="right" nowrap><div align="left">
              <input type="text" name="nama" value="" size="25">
            </div></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap><div align="left">E_mail:</div></td>
          </tr>
          <tr valign="baseline">
            <td height="31" align="right" nowrap><div align="left">
              <input type="text" name="e_mail" value="" size="25">
            </div></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap><div align="left">Kota:</div></td>
          </tr>
          <tr valign="baseline">
            <td height="27" align="right" nowrap><div align="left">
              <input type="text" name="kota" value="" size="25">
            </div></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap><div align="left">Pesan:</div></td>
          </tr>
          <tr valign="baseline">
            <td height="91" align="right" nowrap><label for="pesan"></label>
              <div align="left">
                <textarea name="pesan" id="pesan" cols="27" rows="5"></textarea>
              </div></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap><div align="left">
              <input name="Submit" type="submit" value="      INPUT     ">
              <input name="Reset" type="reset" value="      BATAL     ">
            </div></td>
          </tr>
        </table>
        <p>
          <input type="hidden" name="MM_insert" value="form2">
        </p>
	  </form>
      	</p>
    
	</div>
	</td>
	</tr>
	</table>

	    </div>
              
        
		  
	
    
        </div>
      </div>
	</div>
	
		


	<div id="footer" style="
    margin-top: 500px;
">
		 Copyright © 2017 Politeknik Caltex Riau |<a href="https://www.facebook.com/zidane.hitsugaya"> Desain by : Brima Zidane Ferdiyan</a>
	</div>


</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>

</html>
