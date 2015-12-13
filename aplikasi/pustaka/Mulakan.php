<?php
/* Ini class untuk
 * 1. membaca $url dari fungsi dpt_url() dari fail fungsi.php
 *    dan masukkan dalam $url
 * 2. semak sama ada nilai $url[0] kosong tak
 * 3. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0]
 * 4. semak sama ada dalam folder KAWAL $fail benar2 wujud
 */
namespace Foo\Bar;
class Mulakan
{
#--------------------------------------------------------------------------------------#
    function __construct()
    {
        # 1. guna fungsi dpt_url() dari fail fungsi.php
        # dan masukkan dalam $url
        $url = dpt_url(); //echo '<br>$url->'; print_r($url) . '';
         
        /* 2. semak sama ada $url[0] kosong
         * jika ya : $url[0] == 'index';
         * jika tak : $url[0] == $url[0];
         */
         
        $url[0]= (empty($url[0])) ? 'index' : $url[0];
 
        /* 3. dapatkan fail dalam folder KAWAL yang serupa dengan $url[0]
         * dan masukkan dalam $fail
         */
 
		$failKawal = GetMatchingFiles(GetContents(KAWAL),$url[0] . '.php');
        //echo '<hr>$fail ' . KAWAL . '->' . $failKawal[0] . '<br>';
         
        /* 4. semak sama ada dalam folder KAWAL $fail benar2 wujud
         * jika ya : masukkan $fail dan isytihar class tersebut
         * jika tak : cari fungsi sesat()
         */
		if (file_exists($failKawal[0]))
		{
			$kawal = new $url[0];
			$kawal->muatTanya($url[0]);/*
			# jika $url[1] tak disetkan, bagi $method='index'
			$method = (isset($url[1])) ? $url[1] : 'index';
			# semak sama ada method ada dalam $kawal
			if ( !method_exists($kawal, $method) )
				$this->parameter();			
			else $this->cari_pengawal($kawal, $url);
			//*/
        }
        else
        {
            $this->sesat();
        }//*/
         
    }

	/**
	 *  Cara membaca parameter url GET
	 *
     *  http://localhost/kawal/kaedah/(param)/(param)/(param)
     *  url[0] = Kawal -> senarai class dalam folder kawal
     *  url[1] = Kaedah -> senarai fungsi2 dalam class Kawal
     *  url[2] = Param2
     *  url[3] = Param3
     *  url[4] = Param4
     *  url[5] = Param5
     */
     
    private function cari_pengawal($kawal, $url)
    {
        $panjang = count($url); echo '$panjang=' . $panjang . '<br>';
		
        # Pastikan kaedah yang kita panggil wujud	
		if ($panjang > 1)
        {
			if (!method_exists($kawal, $url[1])) {$this->parameter();}
		}
			
			# Tentukan apa yang dimuatkan		
			switch ($panjang)
			{
				case 8:
				# Kawal->Kaedah(Param2, Param3, Param4, Param5)
				$kawal->{$url[1]}($url[2], $url[3], $url[4], $url[5], $url[6], $url[7]);
				break;

				case 7:
				# Kawal->Kaedah(Param2, Param3, Param4, Param5)
				$kawal->{$url[1]}($url[2], $url[3], $url[4], $url[5], $url[6]);
				break;

				case 6:
				# Kawal->Kaedah(Param2, Param3, Param4, Param5)
				$kawal->{$url[1]}($url[2], $url[3], $url[4], $url[5]);
				break;
	 
				case 5:
				# Kawal->Kaedah(Param2, Param3, Param4)
				$kawal->{$url[1]}($url[2], $url[3], $url[4]);
				break;
	 
				case 4:
				# Kawal->Kaedah(Param2, Param3)
				$kawal->{$url[1]}($url[2], $url[3]);
				break;
	 
				case 3:
				# Kawal->Kaedah(Param2)
				$kawal->{$url[1]}($url[2]);
				break;
	 
				case 2:
				# Kawal->Kaedah()
				$kawal->{$url[1]}();
				break;
	 
				default:
				$kawal->index();
				break;
			}
		//*/
    }
    
    function sesat()
    {
        require KAWAL . '/sesat.php';
        $kawal = new Sesat();
        $kawal->index();
        return false;
    }
	
	function parameter()
    {
        require KAWAL . '/sesat.php';
        $kawal = new Sesat();
        $kawal->parameter();
        return false;
    }

	function paramPanjangSangat($bilParam)
    {
        require KAWAL . 'sesat.php';
        $kawal = new Sesat();
        $kawal->paramPanjangSangat($bilParam);
        return false;
    }

	function classKawalTidakWujud($amaran)
    {
        require KAWAL . 'sesat.php';
        $kawal = new Sesat();
        $kawal->classTidakWujud($amaran);
        return false;
    }
		
	public static function classTanyaTidakWujud($amaran)
    {
        require KAWAL . 'sesat.php';
        $kawal = new Sesat();
        $kawal->classTidakWujud($amaran);
        //return false;
		exit;
    }
	
	public static function failPaparTidakWujud()
    {
        require KAWAL . 'sesat.php';
        $kawal = new Sesat();
        $kawal->failTidakWujud();
        return false;
    }
#--------------------------------------------------------------------------------------#
} # tamat class
# tamat namespace