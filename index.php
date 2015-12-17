<?php
/*
 * Ini fail index.php
 * Dalam ini kita isytiharkan
 * 1. laporan tahap kesilapan kod PHP
 * 2. zon masa kita pada Asia/Kuala Lumpur
 * 3. setkan tatarajah sistem
 * 4. masukkan semua fail class dari folder PUSTAKA
 * 5. istihar class Mulakan
 */
 
# 1. laporan tahap kesilapan kod PHP
error_reporting(E_ALL); # Turn on error reporting 
//error_reporting(0); # Turn off error reporting 
 
# 2. isytiharkan zon masa => Asia/Kuala Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');
 
# 3. setkan tatarajah sistem
require 'tatarajah2.php';

# 4. masukkan semua fail class dari folder PUSTAKA
#    Also spl_autoload_register (Take a look at it if you like)
function __autoload($class)
{
	$cariFail = GetMatchingFiles(GetContents('aplikasi'),$class . '.php');
	echo '<br>Utama :: $class->' . $class . ' || $fail->' . $cariFail[0];
	if (isset($cariFail[0])) 
	{	require $cariFail[0];
		if (!class_exists($class)): 
			echo '<br>class ' . $class . ' tak wujud<br>';
		endif;
	}
	else echo '<br>fail class ' . $class . ' tidak wujud <br>';
	
}

# 5. istihar class Mulakan
$aplikasi = new Mulakan();
//require('aplikasi/pustaka/Mulakan.php'); 
//use aplikasi\pustaka\Mulakan;
//$aplikasi = new Mulakan('index');
