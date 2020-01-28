<?php
error_reporting(E_ALL ^ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_koneksi = "localhost";
$database_koneksi = "marvelshopp";
$username_koneksi = "root";
$password_koneksi = "";
$koneksi = mysql_pconnect($hostname_koneksi, $username_koneksi, $password_koneksi) or trigger_error(mysql_error(),E_USER_ERROR); 
?>