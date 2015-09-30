<?php

class Index extends Kawal 
{
#--------------------------------------------------------------------------------------#
	function __construct() 
	{
		echo '<br>class Index extends Kawal';
		parent::__construct();
        //Kebenaran::kawalMasuk();
	}
	
	function index() 
	{
		echo '<br>class Index::index() extends Kawal';
		# Set pemboleubah utama
		$this->papar->Tajuk_Muka_Surat='Enjin Carian Ekonomi';
		# pergi papar kandungan
		//$this->papar->baca('index/index');
	}
#--------------------------------------------------------------------------------------#	
}