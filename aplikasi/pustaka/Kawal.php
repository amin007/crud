<?php

class Kawal 
{
#--------------------------------------------------------------------------------------#
	function __construct() 
	{
		//echo '=>class Kawal';
		$this->papar = new Papar();
	}
	
	public function muatTanya($nama) 
	{
        /* 1. dapatkan fail dalam folder TANYA yang serupa dengan $nama
         * dan masukkan dalam $failTanya
         */
 
		$failTanya = GetMatchingFiles(GetContents(TANYA),$nama . '_tanya.php');
        //echo '<hr>$fail ' . TANYA . '->' . $failTanya[0] . '<br>';
         
        /* 2. semak sama ada dalam folder TANYA $fail benar2 wujud
         * jika ya : masukkan $fail dan isytihar class tersebut
         * jika tak : cari fungsi sesat()
         */

		if (file_exists($failTanya[0])) 
		{
			$tanyaNama = ucfirst($nama) . '_Tanya';
			$this->tanya = new $tanyaNama();
		}//*/
	
	}
#--------------------------------------------------------------------------------------#
}