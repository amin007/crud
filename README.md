# crud
Langkah asas untuk fahamkan **mvc melayu**

# fungsi __autoload
```php
function __autoload($class)
{
	$cariFail = classFolder($class);
	echo '<br>Utama :: class ' . $class . ' | fail=>' . $cariFail;
	if (isset($cariFail[0])) 
	{	require $cariFail[0];
		if (!class_exists($class)): 
			echo '<br>class ' . $class . ' tak wujud<br>';
		endif;
	}
	else echo 'fail class ' . $class . ' tidak wujud <br>';
}
```

# Output
|Lokasi| Class           | Fail                                             |
|----- | --------------- | ------------------------------------------------ |
|Utama | $class->Mulakan | $fail->aplikasi/pustaka/Mulakan.php              |
|Utama | $class->index   | $fail->aplikasi/kawal/index.php |
|Utama | $class->Kawal   | $fail->aplikasi/pustaka/Kawal.php |
| Ini class Index extends Kawal |
|Lokasi| Class               | Fail                                       |
|----- | ------------------- | ------------------------------------------ |
|Utama | $class->Papar       | $fail->aplikasi/pustaka/Papar.php          |
|Utama | $class->Index_Tanya | $fail->aplikasi/tanya/index_tanya.php      |
|Utama | $class->Tanya       | $fail->aplikasi/pustaka/Tanya.php          |

=> Ini class Index_Tanya extends Tanya

Utama :: $class->PangkalanData | $fail->aplikasi/pustaka/PangkalanData.php


# Kredit
[JREAM](https://github.com/JREAM)