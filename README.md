## Synopsis / Penerangan
Langkah asas untuk memahami **mvc melayu**

----
## Code Example / Contoh Kod

### fungsi __autoload
```php
# guna contoh http://www.php-fig.org/psr/psr-4/examples/
spl_autoload_register(function ($namaClass) 
{
    # tentukan namespace 
    $prefix = 'Foo\\Bar\\'; //echo '<br>' . $prefix;

    # folder asas bagi namespace prefix
    $base_dir = __DIR__ . '/' . PUSTAKA . 'vendor/foo.bar/src/'; //echo '<br>' . $base_dir;

    # does the class use the namespace prefix?
    $len = strlen($prefix); //echo '<br>' . $len;
    if (strncmp($prefix, $namaClass, $len) !== 0) 
        # no, move to the next registered autoloader
        return;

    # dapatkan nama class tanpa namespace
    $class = substr($namaClass, $len); //echo '<br>' . $relative_class;

	# dapatkan fail class tanpa namespace
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
	echo '<br> nama class:' . $class . ' | fail:' . $file;
    # jika fail wujud, masukkan 
    if (file_exists($file)) require $file;   
});
```

### Output
| Class           | Fail                                |
| --------------- | ----------------------------------- |
| nama class:Ayam | fail:D:\xampp\htdocs\imgekonomi\crud/aplikasi/pustaka/vendor/foo.bar/src/Ayam.php|

> namespace Foo\Bar  : class Ayam

| Class           | Fail                                |
| --------------- | ----------------------------------- |
| nama class:Baz | fail:D:\xampp\htdocs\imgekonomi\crud/aplikasi/pustaka/vendor/foo.bar/src/Baz.php |

> namespace Foo\Bar  : class Baz 

| Class           | Fail                                |
| --------------- | ----------------------------------- |
| nama class:Qux\Quux | fail:D:\xampp\htdocs\imgekonomi\crud/aplikasi/pustaka/vendor/foo.bar/src/Qux/Quux.php |

> namespace Foo\Bar : class Quux 

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