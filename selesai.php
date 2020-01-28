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
	    <h1 class="Judul"><center style="width: 600px;">Bukti Pemesanan Barang  :</center></h1>
        <div align="center">
          <table width="551" border="1" cellspacing="0" cellpadding="0">
            
                  <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="15" height="20">&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="13">&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="56">&nbsp;</td>
                      <td colspan="2" align="center"><?php
require_once("conn.php");
   
error_reporting(0);
include "inc/koneksi.php";
include "inc/tanggal.php";

$input=$_GET[input];
$sid = session_id();
$inputform=$_GET[inputform];

if($input=='add'){
	
	
	$sql = mysql_query("SELECT id_produk FROM keranjang WHERE id_produk='$_GET[id]' AND id_session='$sid'");
	$num = mysql_num_rows($sql);
	if ($num==0){
		mysql_query("INSERT INTO keranjang(id_produk,
											id_session,
											qty)
									VALUES	('$_GET[id]',
											'$sid',
											'1')");
	}
	else {
		mysql_query("UPDATE keranjang SET qty = qty + 1 WHERE id_session = '$sid' AND id_produk='$_GET[id]'");
		
	}
	deletecart();
	
	header('location:cart.php');
	}
				
elseif ($input=='delete'){
	mysql_query("DELETE FROM keranjang WHERE id_keranjang='$_GET[id]'");
	header('location:cart.php');
	}
	
	
elseif ($input=='inputform'){
	function cart_content(){
	$ct_content = array();
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM keranjang WHERE id_session='$sid'");
	
	while ($r=mysql_fetch_array($sql)) {
		$ct_content[] = $r;
	}
	return $ct_content;
}



	if (isset($_POST['submit'])) {

    $nama = $_POST['name'];
    $alamat = $_POST['address'];
	$detail = $_POST['detail'];
    $telepon = $_POST['telp'];
    $email = $_POST['email'];

    // masukkan dalam table pelanggan
    mysql_select_db($database_conn);
    $query = mysql_query("INSERT INTO `pelanggan` (`nama`, `alamat`, `telepon`, `email`) VALUES ('$nama', '$alamat', '$telepon', '$email')", $conn) or die(mysql_error());
    if ($query) {
        $id_pelanggan = mysql_insert_id($conn);
		$status = 'Belum Bayar';
		$pengiriman = 'Belum dikirim';
        // masukkan dalam tabel transaksi

        $query = mysql_query("INSERT INTO `transaksi` (`tanggal`, `id_pelanggan`,`detail`, `total`,`status`,`pengiriman`) VALUES (CURRENT_DATE, '$id_pelanggan','$detail', 0,'$status','$pengiriman')", $conn) or die(mysql_error());
	
	
	$transaksi_id = mysql_insert_id($conn);
	$total = 0;
    $ct_content = cart_content();
	$jml = count($ct_content);
	
	$sql = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");
	while($tian=mysql_fetch_array($sql)){
	   
		$subtotal    = $tian['harga']*$tian['qty'];	
		$total       +=$subtotal;
	mysql_query("INSERT INTO detail_transaksi(id_transaksi,
											id_produk,
											qty,
											subtotal) 
									VALUES ('$transaksi_id',
											{$tian['id_produk']},
											{$tian['qty']},								
											'$subtotal')");
	
	
	}
$jumlah_total = $total + $biaya_pengiriman;
 $query = mysql_query("UPDATE `transaksi` SET `total` = '$total' WHERE `id_transaksi` = '$transaksi_id'");
 
	}
	}
	
	for($i=0; $i<$jml; $i++){
		mysql_query("DELETE FROM keranjang WHERE id_keranjang = {$ct_content[$i]['id_keranjang']}");
		
	
		}
		

		echo "<script>window.alert('Terima Kasih !, Barang yang anda pesan akan segera diproses, THANKS!');
      </script>";
	}
	
	
	
	$sql = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");
	while($tian=mysql_fetch_array($sql)){
	$subtotal    = $tian['harga']*$tian['qty'];
   $total       +=$subtotal;
	$no++;
}	
				echo'* Jangan Lupa Ingat No. Transaksi Anda!';
				echo'<hr>';
				"<br>";
				echo " No. Transaksi : <b><h2>$transaksi_id</h2></b>";	
				echo '<p>Total biaya untuk pembelian Produk adalah <h2>Rp.'.number_format($total).'</h2> </p>';
				
				echo '<p>Nama : '.$_POST['name'].'<br>';
				echo 'Alamat Lengkap : '.$_POST['address'].'</p>';
				echo 'Detail Pesanan : '.$_POST['detail'].'</p>';
				echo 'Email : '.$_POST['email'].'</p>';
				echo 'No. HP: '.$_POST['telp'].'</p>';
				echo'<hr>';

		$prod = $_GET['id'];
		$qt = mysql_query("SELECT id_produk, stok FROM produk WHERE id_produk='$prod'");
		
				
function deletecart(){
	$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM keranjang WHERE tgl_keranjang < '$del'");
	}
	
?></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td height="70">&nbsp;</td>
                      <td width="218" align="center"><div align="center">
                        <h2><a href="cara_pembayaran.php"><img src="images/paymenticon.png" width="50" height="50"><strong><font color="black"> Cara Pembayaran</font></strong></a></td></a></h2>
                      </div></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
                <h2 align="center" style="
    padding-bottom: 100px;
">&nbsp;</h2>
              
              </td>
            </tr>
          
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
