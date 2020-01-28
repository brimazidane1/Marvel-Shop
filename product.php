<?php require_once('Connections/p.php'); ?>

<?php
ini_set("display_errors","off");
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

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
    padding-left: 350px;
    padding-top: 100px;
    padding-bottom: 100px;
">
	    
	    <h2 align="center" class="Judul" style="
    padding-top: 0px;
    width: 550px;
">Data Produk</h2>
	    <hr>
	    <div align="center">
	      <table width="551" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="547">
               <?php
				
					$prod = $_GET['id'];
					$cat = $_GET['cat'];
					if($cat){
					$sql = mysql_query("SELECT * FROM merk WHERE id_merk = '$cat'");
					$jdl = mysql_fetch_array($sql);
					echo "<h1 class='Judul'>Sepatu Merk $jdl[nama_merk]</h1>";
					
					$sql2 = mysql_query("SELECT * FROM produk WHERE id_merk='$cat'");
					while($t = mysql_fetch_array($sql2)){ ?>
                <div class="produk">
						<p><a href="product.php?id=<?php echo $t['id_produk']; ?>">
				  <img title="<?php echo $t['nama_produk']; ?>" class="FotoProduk" src="foto/<?php echo $t['gambar']; ?>" height="110px" /></a><br class="clearfloat" />
				  </p>
						<div class="KotakKet">
						<a class="pesanprod" href="input.php?input=add&id=<?php echo $t['id_produk']; ?>"><strong><img src="images/Shopping-cart-add-icon.png" width="32" height="32"></strong></a>
						<a href="product.php?id=<?php echo $t['id_produk']; ?>"><strong><img src="images/detail2.png" width="32" height="32"></strong></a>
						</div>
				</div>
															
						<?php	}
							}
					elseif($prod){ ?>
				<?php

					$sql = mysql_query("SELECT * FROM produk WHERE id_produk='$prod'");
					$d = mysql_fetch_array($sql);
$stok = mysql_query("SELECT * FROM produk WHERE stok='$stok'");					
if($stok <= 0){
		$stok = 0;
}
					?>
					<h1 class="Judul">&gt;&gt; Detail  <?php echo $d['nama_produk']; ?></h1>
				<div class="KetProd">
						<img class="GambarKetProd" src="foto/<?php echo $d['gambar']; ?>">
						
                        
                        
                        
		          <table width="300" border="0" cellspacing="0" cellpadding="0">
				          <tr>
				            <td width="46" align="left" valign="top">ID</td>
				            <td width="9" align="left" valign="top">:</td>
				            <td width="214" align="left" valign="top"><?php echo $d['id_produk']; ?></td>
		            </tr>
				          <tr>
				            <td height="23" align="left" valign="top">Nama </td>
				            <td align="left" valign="top">:</td>
				            <td align="left" valign="top"><?php echo $d['nama_produk']; ?></td>
		            </tr>
				          <tr>
				            <td height="23" align="left" valign="top">Ukuran </td>
				            <td align="left" valign="top">:</td>
				            <td align="left" valign="top"><?php echo $d['ukuran']; ?></td>
		            </tr>
				          <tr>
				            <td height="24" align="left" valign="top">Harga</td>
				            <td align="left" valign="top">:</td>
				            <td align="left" valign="top">Rp. <?php echo $d['harga']; ?></td>
		            </tr>
				          <tr>
				            <td height="23" align="left" valign="top">Detail</td>
				            <td align="left" valign="top">:</td>
				            <td align="left" valign="top"><?php echo $d['keterangan']; ?></td>
		            </tr>
                     <tr>
				            <td height="23" align="left" valign="top">Stok</td>
				            <td align="left" valign="top">:</td>
				            <td align="left" valign="top"><?php echo $d['stok']; ?></td>
		            </tr>
		          </table>
				</div>
					<div align="center">
					  <table width="301" border="0" cellspacing="0" cellpadding="0">
					    <tr>
					      <td width="128"><a  href="javascript:history.go(-1)"><strong><img src="images/back1.png" width="60" height="60" style="
    padding-top: 10px;
"></strong></a></td>
					      <td width="39">&nbsp;</td>
					      <td width="134" align="right"><a  href="input.php?input=add&id=<?php echo $d['id_produk']; ?>"><strong><img src="images/cart2.png" width="100" height="48"></strong></a></td>
				        </tr>
				      </table>
					  <p>
					    <?php } ?>
					  </p>
				</div></td>
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
