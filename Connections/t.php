<?php
error_reporting(E_ALL ^ E_DEPRECATED);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_t = "localhost";
$database_t = "marvelshopp";
$username_t = "root";
$password_t = "";
$t = mysql_pconnect($hostname_t, $username_t, $password_t) or trigger_error(mysql_error(),E_USER_ERROR); 
?>