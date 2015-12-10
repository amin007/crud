<?php

class PangkalanData extends PDO
{
#--------------------------------------------------------------------------------------#
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		try
		{
			parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
			//parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTIONS);
		}
		catch (PDOException $e) 
		{
			echo '<br>=>' . $e->getMessage();
			//echo '<br><a href="' . URL . 'ruangtamu/logout">Keluar</a>';
			exit;
		}
	}
#--------------------------------------------------------------------------------------#
}
