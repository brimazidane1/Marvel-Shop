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
	
	<div class="main">
				<div id="mi-slider" class="mi-slider">
					<ul>
						<li><a href="#"><img src="images/1a.jpg" alt="img01"><h4>Marvel Comics Classic Tee</h4></a></li>
						<li><a href="#"><img src="images/2a.jpg" alt="img02"><h4>Spider-Man School Logo Ringer Tee</h4></a></li>
						<li><a href="#"><img src="images/3a.jpg" alt="img03"><h4>Guardians of the Galaxy Vol. 2 Raglan Cast Tee</h4></a></li>
						<li><a href="#"><img src="images/4a.jpg" alt="img04"><h4>Groot Heathered Tank Tee</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/5b.jpg" alt="img05"><h4>Guardians of the Galaxy Vol. 2 Wallet</h4></a></li>
						<li><a href="#"><img src="images/6b.jpg" alt="img06"><h4>Marvel Comics Messenger Bag</h4></a></li>
						<li><a href="#"><img src="images/7b.jpg" alt="img07"><h4>Captain America Backpacks</h4></a></li>
						<li><a href="#"><img src="images/8b.jpg" alt="img08"><h4>Captain America Flip Flops</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/9c.jpg" alt="img09"><h4>Groot Dancing Figure</h4></a></li>
						<li><a href="#"><img src="images/10c.jpg" alt="img10"><h4>Iron Man Repulsor Gloves</h4></a></li>
						<li><a href="#"><img src="images/11c.jpg" alt="img11"><h4>Spider-Man App-Enabled Super Hero Figure</h4></a></li>
						<li><a href="#"><img src="images/12c.jpg" alt="img12"><h4>CIron Man Hulkbuster Action Figure</h4></a></li>
					</ul>
					<ul>
						<li><a href="#"><img src="images/13d.jpg" alt="img13"><h4>Guardians of the Galaxy Blu-ray 3-D Combo Pack</h4></a></li>
						<li><a href="#"><img src="images/14d.jpg" alt="img14"><h4>aptain America: Civil War 3D Blu-ray Collector's Edition</h4></a></li>
						<li><a href="#"><img src="images/15d.jpg" alt="img15"><h4>Age of Ultron - Hardcover Book</h4></a></li>
						<li><a href="#"><img src="images/16d.jpg" alt="img16"><h4>The Amazing Spider-Man: Behind Scenes and Beyond the Web Book</h4></a></li>
					</ul>
					<nav>
						<a href="#">Clothes</a>
						<a href="#">Accessories</a>
						<a href="#">Toys</a>
						<a href="#">Entertainment</a>
					</nav>
				</div>
			</div>
		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
	

	<br><br><br><br><br>
	<center><div id="page" style="
    padding-top: 130px;
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
	  <div id="produk">
	   
	  
      <!-- Tabs -->
      <!-- Container -->
      <div id="container" style="width: 1270px;">
          
            <div class="items">
              <div class="cl">&nbsp;</div>
              <ul>
			  <li>
                <?php
						$sql = mysql_query("SELECT * FROM produk ORDER BY id_produk DESC") or die ("Query gagal dengan error: ".mysql_error());
						while($data=mysql_fetch_array($sql)){ ?>
                
                <div class="produk">
                  <a href="product.php?id=<?php echo $data['id_produk']; ?>">
                    <img title="<?php echo $data['nama_produk']; ?>" class="FotoProduk" src="foto/<?php echo $data['gambar']; ?>" width="200px" height="180px" />
                  </a>
                  <br class="clearfloat" />
				 
                  <div class="KotakKet" style="padding-left: 50px;">
                       <a class="pesanprod" href="input.php?input=add&id=<?php echo $data['id_produk']; ?>"><img src="images/cart2.png" width="100" height="50"></a>
                 </li></ul>    
                    </div>
                  </div>
				  <div class="cl">&nbsp;</div>
                <?php } 
				?>

        </div>
      
	</div>
	            </div>
          </div>

	   

    
	
</div>
	<div id="footer">
		 Copyright © 2017 Politeknik Caltex Riau |<a href="https://www.facebook.com/zidane.hitsugaya"> Desain by : Brima Zidane Ferdiyan & Rachmad Adi Putra</a>
	</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>

</html>
<?php
mysql_free_result($p);
?>
