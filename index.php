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
error_reporting(E_ALL);
 
# 2. isytiharkan zon masa => Asia/Kuala Lumpur
date_default_timezone_set('Asia/Kuala_Lumpur');
 
# 3. setkan tatarajah sistem
require 'tatarajah2.php';

/** 4. masukkan semua fail class dari folder PUSTAKA
 * URL : http://www.php-fig.org/psr/psr-4/examples/
 * An example of a project-specific implementation.
 * 
 * After registering this autoload function with SPL, the following line
 * would cause the function to attempt to load the \Foo\Bar\Baz\Qux class
 * from /path/to/project/src/Baz/Qux.php:
 * 
 *      new \Foo\Bar\Baz\Qux;
 *      
 * @param string $class The fully-qualified class name.
 * @return void
 */
spl_autoload_register(function ($class) 
{
    # project-specific namespace prefix
    $prefix = 'Foo\\Bar\\'; //echo '<br>' . $prefix;

    # base directory for the namespace prefix
    $base_dir = __DIR__ . '/' . PUSTAKA . 'vendor/foo.bar/src/'; echo '<br>' . $base_dir;

    # does the class use the namespace prefix?
    $len = strlen($prefix); //echo '<br>' . $len;
    if (strncmp($prefix, $class, $len) !== 0) 
        # no, move to the next registered autoloader
        return;

    # get the relative class name
    $relative_class = substr($class, $len); echo '<br>' . $relative_class;

    # replace the namespace prefix with the base directory, replace namespace
    # separators with directory separators in the relative class name, append
    # with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
	echo '<br>' . $file;
    # if the file exists, require it
    if (file_exists($file)) require $file;
    
});

# 5. istihar class 
new \Foo\Bar\Ayam;
new \Foo\Bar\Baz;
new \Foo\Bar\Qux\Quux;