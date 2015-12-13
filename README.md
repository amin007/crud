## Synopsis / Penerangan
Langkah asas untuk memahami **mvc melayu**

----
## Code Example / Contoh Kod

### fungsi __autoload
```php
# guna contoh http://www.php-fig.org/psr/psr-4/examples/
spl_autoload_register(function ($class) 
{
    # project-specific namespace prefix
    $prefix = 'Foo\\Bar\\'; //echo '<br>' . $prefix;

    # base directory for the namespace prefix
    $base_dir = __DIR__ . '/' . PUSTAKA . 'vendor/foo.bar/src/'; //echo '<br>' . $base_dir;

    # does the class use the namespace prefix?
    $len = strlen($prefix); //echo '<br>' . $len;
    if (strncmp($prefix, $class, $len) !== 0) 
        # no, move to the next registered autoloader
        return;

    # get the relative class name
    $relative_class = substr($class, $len); //echo '<br>' . $relative_class;

    # replace the namespace prefix with the base directory, replace namespace
    # separators with directory separators in the relative class name, append
    # with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
	echo '<br>' . $file;
    # if the file exists, require it
    if (file_exists($file)) require $file;   
});
```

### Output
| Class           | Fail                                |
| --------------- | ----------------------------------- |
| nama class:Ayam | fail:D:\xampp\htdocs\imgekonomi\crud/aplikasi/pustaka/vendor/foo.bar/src/Ayam.php|
> namespace Foo\Bar | class Ayam

| Class           | Fail                                |
| --------------- | ----------------------------------- |
| nama class:Baz | fail:D:\xampp\htdocs\imgekonomi\crud/aplikasi/pustaka/vendor/foo.bar/src/Baz.php |
> namespace Foo\Bar | class Baz 

| Class           | Fail                                |
| --------------- | ----------------------------------- |
| nama class:Qux\Quux | fail:D:\xampp\htdocs\imgekonomi\crud/aplikasi/pustaka/vendor/foo.bar/src/Qux/Quux.php |
> namespace Foo\Bar | class Quux 

----
## Motivation / Motivasi
* Untuk memertabatkan bahasa melayu dalam dunia programing

## Installation / Pemasangan
* Muat turun dan buka fail zip

## API Reference / Rujukan API
* Belum ada idea mahu tulis.

## Tests / Ujian
* Belum ada idea mahu tulis.

## Contributors
* Belum ada idea mahu tulis.

## License
* Belum ada idea mahu tulis.

----
## Changelog
* 10 Disember 2015 - Asyik berubah2 hari ini

----
## Kredit
* [JREAM](https://github.com/JREAM)