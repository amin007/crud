<?php namespace Foo\Bar\Qux;
 
class Quux 
{	
	function __construct() 
	{
		echo '<br>namespace Foo\Bar | class Quux';
	}
	
	public function hasCheese($bool = true)
	{
		return $bool;
	}
}