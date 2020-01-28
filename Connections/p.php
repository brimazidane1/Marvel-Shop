<?php
error_reporting(E_ALL ^ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_p = "localhost";
$database_p = "marvelshopp";
$username_p = "root";
$password_p = "";
$p = mysql_pconnect($hostname_p, $username_p, $password_p) or trigger_error(mysql_error(),E_USER_ERROR); 
error_reporting(0);
session_start();
?>