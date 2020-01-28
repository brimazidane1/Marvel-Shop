<?php
require_once("conn.php");
    session_start();
error_reporting(0);
include "inc/koneksi.php";
include "inc/tanggal.php";
	$_GET['add'];
	$id = mysql_real_escape_string((int)$_GET['add']);
	$qt = mysql_query("SELECT * FROM produk WHERE id_produk='$id'");
	$tian=mysql_fetch_array($qt);
	$stok    = $tian['stok'];
	if($stok<=0){
			echo '<script language="javascript">alert("Stok produk tidak mencukupi!"); document.location="index.php";</script>';
			
		} else {
			$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
			mysql_query("DELETE FROM keranjang WHERE tgl_keranjang < '$del'");
			header("Location: index.php");
		}	
		
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
	else  {
		mysql_query("UPDATE keranjang SET qty = qty + 1 WHERE id_session = '$sid' AND id_produk='$_GET[id]'");
		
		
		}
	
		deletecart();
		kurangi_stok();
	header('location:cart.php');
		
}
elseif ($input=='delete'){
	mysql_query("DELETE FROM keranjang WHERE id_keranjang='$_GET[id]'");
	header('location:cart.php');
	}
	
elseif ($input=='min'){
	mysql_query("UPDATE keranjang SET qty = qty - 1 WHERE id_session = '$sid' AND id_produk='$_GET[id]'");
	header('location:cart.php');
	}
	
	
$input=='inputform';
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
    $telepon = $_POST['telp'];
    $email = $_POST['email'];

    // masukkan dalam table pelanggan
    mysql_select_db($database_conn);
    $query = mysql_query("INSERT INTO `pelanggan` (`nama`, `alamat`, `telepon`, `email`) VALUES ('$nama', '$alamat', '$telepon', '$email')", $conn) or die(mysql_error());
    if ($query) {
        $id_pelanggan = mysql_insert_id($conn);
		$status = 'Belum dibayar';
        // masukkan dalam tabel transaksi

        $query = mysql_query("INSERT INTO `transaksi` (`tanggal`, `id_pelanggan`, `total`,`status`,`pengiriman`) VALUES (CURRENT_DATE, '$id_pelanggan', 0, 'Belum dibayar','Belum dikirim')", $conn) or die(mysql_error());
	
	
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
		echo "<script>window.alert('Terima Kasih Pesanan Anda Sedang Kami Proses');
       </script>";
	   
	//pesanan	
	
	
	
	$sql = mysql_query("SELECT * FROM keranjang, produk WHERE id_session='$sid' AND keranjang.id_produk=produk.id_produk");
	while($tian=mysql_fetch_array($sql)){
	$subtotal    = $tian['harga']*$tian['qty'];
   $total       +=$subtotal;
	$no++;
}								
	echo "No. Transaksi : <b>$transaksi_id</b><br /><br/> ";	
											
	echo '<p>Nama : '.$_POST['name'].'<br>';
				echo 'Alamat Lengkap : '.$_POST['address'].'</p>';
				echo 'Email : '.$_POST['email'].'</p>';
				echo 'No. Telpon: '.$_POST['telp'].'</p>';
				echo number_format($total).'</p>';
				echo "<a  href='cara_pembayaran.php'>Lansung Ke Pembayaran</a>";									

function deletecart(){
	$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM keranjang WHERE tgl_keranjang < '$del'");
	
	}
	
function kurangi_stok(){
	$prod = $_GET['id'];
		$qt = mysql_query("SELECT id_produk, stok FROM produk WHERE id_produk='$prod'");
		mysql_query("UPDATE produk SET stok = stok - 1 WHERE id_produk='$prod'");
		
			}
	