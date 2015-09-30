<?php

class Sesat extends Kawal 
{
#--------------------------------------------------------------------------------------#
	function __construct() 
	{
		parent::__construct();
	}
	
	function index() 
	{
		echo '<br>class Sesat::index() extends Kawal';
		$this->papar->mesej = 'Halaman ini tidak wujud';
		//$this->papar->baca('sesat/index');
	}

	function parameter() 
	{
		echo '<br>class Sesat::parameter() extends Kawal';
		$this->papar->mesej = 'Class wujud tapi parameter/method/fungsi tidak wujud';
		//$this->papar->baca('sesat/index');
	}
	
	function paramPanjangSangat($bilParam)
	{
		echo '<br>class Sesat::paramPanjangSangat($bilParam = ' . $bilParam . ') extends Kawal';
		$this->papar->mesej = 'Class wujud tapi parameter/method/fungsi tidak wujud';
		//$this->papar->baca('sesat/index');
	}
#--------------------------------------------------------------------------------------#
}