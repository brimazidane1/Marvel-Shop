<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$hostname_conn = "localhost";
$database_conn = "marvelshopp";
$username_conn = "root";
$password_conn = "";
$conn = mysql_connect($hostname_conn, $username_conn, $password_conn) or die(mysql_error());
?>