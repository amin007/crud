<?php

class Index extends Kawal 
{
#--------------------------------------------------------------------------------------#
	function __construct() 
	{
		echo '<br>=> Ini class Index extends Kawal';
		parent::__construct();
        //Kebenaran::kawalMasuk();
	}
	
	public function index() 
	{
		echo '<br>class Index::index() extends Kawal';
		# Set pemboleubah utama
		$this->papar->Tajuk_Muka_Surat='Enjin Carian Ekonomi';
		# pergi papar kandungan
		//$this->papar->baca('index/index');
	}
#--------------------------------------------------------------------------------------#	
}