<?php
# 4 folder utama dalam crud
define('KAWAL', 'aplikasi/kawal/');
define('PAPAR', 'aplikasi/papar/');
define('TANYA', 'aplikasi/tanya/');
define('PUSTAKA', 'aplikasi/pustaka/');

# Fungsi Global
require PUSTAKA . '/Fungsi.php';

# Sentiasa menyediakan garis condong di belakang (/) pada hujung jalan
define('URL', dirname('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/');

# setkan jquery sama ada local atau cdn
$jquery_cdn = 'http://code.jquery.com/jquery-1.8.3.min.js';
$jquery_local = 'http://' . $_SERVER['SERVER_NAME'] . '/private_html/js/jquery/jquery-1.8.3.min.js';
############################################################################################
## isytihar konsan MYSQL & JQUERY ikut lokasi $server
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$server = $_SERVER['SERVER_NAME'];

/*
echo "<br>Alamat IP : <font color='red'>" . $ip . "</font> |
\r<br>Nama PC : <font color='red'>" . $hostname . "</font> | 
\r<br>Server : <font color='red'>" . $server . "</font>\r";
//*/

if ($server == '***')
{	# isytihar tatarajah mysql
	define('DB_TYPE', 'mysql');
	define('DB_HOST', '***');
	define('DB_NAME', '***');
	define('DB_USER', '***');
	define('DB_PASS', '***');
	# isytihar lokasi folder jquery ikut lokasi $server
	define('JQUERY', $jquery_cdn);
}
else 
{	# isytihar tatarajah mysql
	define('DB_TYPE', 'mysql');
	define('DB_HOST', '***');
	define('DB_NAME', '***');
	define('DB_USER', '***');
	define('DB_PASS', '***');
	# isytihar lokasi folder jquery ikut lokasi $server
	define('JQUERY', $jquery_local);
}
//echo DB_HOST . "," . DB_USER . "," . DB_PASS . ",," . DB_NAME . "<br>";
############################################################################################