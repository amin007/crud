<?php namespace Foo\Bar;
 
class Baz
{	
	function __construct() 
	{
		echo '<br>namespace Foo\Bar | class Baz';
	}
	
	public function hasCheese($bool = true)
	{
		return $bool;
	}
}