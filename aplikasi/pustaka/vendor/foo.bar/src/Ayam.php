<?php namespace Foo\Bar;
 
class Ayam
{
	function __construct() 
	{
		echo '<br>namespace Foo\Bar | class Ayam';
	}
	
	public function hasCheese($bool = true)
	{
		return $bool;
	}
}