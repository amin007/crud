<?php

function dpt_url()
{
	$url = isset($_GET['url']) ? $_GET['url'] : null;
	$url = rtrim($url, '/');
	$url = filter_var($url, FILTER_SANITIZE_URL);
	$url = explode('/', $url);

	return $url;
}

function pecah_post()
{
	$papar['pilih'] = isset($_POST['pilih']) ? $_POST['pilih'] : null;
	$papar['cari'] = isset($_POST['cari']) ? $_POST['cari'] : null;
	$papar['fix'] = isset($_POST['fix']) ? $_POST['fix'] : null;
	$papar['atau'] = isset($_POST['atau']) ? $_POST['atau'] : null;
	
	$kira['pilih'] = count($papar['pilih']);
	$kira['cari'] = count($papar['cari']);
	$kira['fix'] = count($papar['fix']);
	$kira['atau'] = count($papar['atau']);
	
	return $kira;
	//echo '<pre>'; print_r($kira) . '</pre>';
}

# mula untuk kod php+html 
function papar_jadual($row, $myTable, $pilih)
{
	if ($pilih == 1) 
	{
///////////////////////////////////////////////////////////////////////////////////////////////////
		?><!-- Jadual <?php echo $myTable ?> -->	
		<table  border="1" class="excel" id="example"><?php
		$printed_headers = false;  # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{	//print the headers once: 	
			if ( !$printed_headers ) : ?>
		<thead><tr>
		<th>#</th><?php foreach ( array_keys($row[$kira]) as $tajuk ) :
		?><th><?php echo $tajuk ?></th>
		<?php endforeach; ?>  
		</tr></thead>
		<?php	$printed_headers = true; 
			endif;
		#-print the data row -----------------------------------------------?>
		<tbody><tr>
		<td><?php echo $kira+1 ?></td>	
		<?php foreach ( $row[$kira] as $key=>$data ) : 
		?><td><?php echo $data ?></td>
		<?php endforeach; ?>  
		</tr></tbody>
		<?php
		}
		#-----------------------------------------------------------------
		?></table><!-- Jadual <?php echo $myTable ?> --><?php
///////////////////////////////////////////////////////////////////////////////////////////////////
	}
	elseif ($pilih == 2) 
	{
///////////////////////////////////////////////////////////////////////////////////////////////////
		?><!-- Jadual <?php echo $myTable ?> -->	
		<table  border="1" class="excel" id="example"><?php
		// mula bina jadual
		$printed_headers = false; 
		#-----------------------------------------------------------------
		for ($kira=0; $kira < count($row); $kira++)
		{	//print the headers once: 	
			if ( !$printed_headers ) : ?>
		<thead><tr>
		<th>#</th><?php
				foreach ( array_keys($row[$kira]) AS $tajuk ) 
				{ 	if ( !is_int($tajuk) ) : ?>
		<th><?php echo $tajuk ?></th>
		<?php		endif;
				}
		?></tr></thead><?php
				$printed_headers = true; 
			endif; 
		#- print the data row ------------------------------------------------?>
		<tbody><tr>
		<td><?php echo $kira+1 ?></td>	
		<?php
			foreach ( $row[$kira] AS $key=>$data ) 
			{
				?><td><?php echo $data ?></td>
		<?php
			} 
			?></tr></tbody>
		<?php
		}
		#-----------------------------------------------------------------
		?></table><!-- Jadual <?php echo $myTable ?> --><?php
///////////////////////////////////////////////////////////////////////////////////////////////////
	}
	elseif ($pilih == 3) 
	{
///////////////////////////////////////////////////////////////////////////////////////////////////
		?><!-- Jadual <?php echo $myTable ?>  --><?php
		for ($kira=0; $kira < count($row); $kira++)
		{# ulang untuk $kira++ ?>
		<table border="1" class="excel" id="example">
		<tbody><?php foreach ( $row[$kira] as $key=>$data ):?>
		<tr>
		<td><?php echo $key ?></td>
		<td><?php echo $data ?></td>
		</tr>
		<?php endforeach; ?></tbody>
		</table>
		<?php
		}# ulang untuk $kira++ ?>
		<!-- Jadual <?php echo $myTable ?> --><?php
///////////////////////////////////////////////////////////////////////////////////////////////////
	} # tamat if (jadual ==3
	elseif ($jadual == 4)
	{ # mula if (jadual==4
		$bil_tajuk = $row['bil_tajuk'];
		$bil_baris = $row['bil_baris']; 

		$output  = null; 
		$output .= '<table border="1" class="excel" id="example">
		<thead><tr>
		<th colspan="' . $bil_tajuk . '">
		<strong>Jadual ' . $myTable . ' : ' . $bil_tajuk . '
		</strong></th>
		</tr></thead>';

		$printed_headers = false; # mula bina jadual
		#-----------------------------------------------------------------
		for ($kira=0; $kira < $bil_baris; $kira++)
		{
			if ( !$printed_headers ) # print the headers once: 	
			{##============================================================
			$output .= "\r\t<thead><tr>\r\t<th>#</th>";
			foreach ( array_keys($row[$kira]) as $tajuk ) :
				$output .= "\r\t" . '<th>' . $tajuk . '</th>';
			endforeach;
			$output .= "\r\t" . '</tr></thead>';
			##=============================================================
				$printed_headers = true; 
			} 
		#--- print the data row  -------------------------------------------		 
			$output .= "\r\t<tbody><tr>\r\t<td>" . ($kira+1) . '</td>';
			foreach ( $row[$kira] as $key=>$data ) :
				$output .= "\r\t" . '<td>' . $data . '</td>';
			endforeach; 
			$output .= "\r\t" . '</tr></tbody>';
		}
		#-----------------------------------------------------------------
		$output .= "\r\t" . '</table>';

		return $output;

	} # tamat if ($jadual == 4
}
# tamat untuk kod php+html 

function pencamSqlLimit($bilSemua, $item, $ms)
{# sql limit
    # Tentukan bilangan jumlah dalam DB:
    $jum['bil_semua'] = $bilSemua;
    # ambil halaman semasa, jika tiada, cipta satu! 
    $jum['page'] = ( !isset($ms) ) ? 1 : $ms; 
    # berapa item dalam satu halaman
    $jum['max'] = ( !isset($item) ) ? 30 : $item; 
    # Tentukan had query berasaskan nombor halaman semasa.
    $dari = (($jum['page'] * $jum['max']) - $jum['max']); 
    $jum['dari'] = ( !isset($dari) ) ? 0 : $dari; 
    # Tentukan bilangan halaman. 
    $jum['muka_surat'] = ceil($jum['bil_semua'] / $jum['max']);
    # Tentukan berapa bil jumlah dlm satu muka surat
    $jum['bil'] = $jum['dari']+1; 
    
    return $jum;
}

function kira1($kiraan, $perpuluhan = 0)
{
	# pecahan kepada ratus
	return number_format($kiraan,$perpuluhan,'.',',');
} 

function kira2($dulu, $kini)
{
	# buat bandingan dan pecahan kepada ratus
	return @number_format((($kini-$dulu)/$dulu)*100,0,'.',',');
	//@$kiraan=(($kini-$dulu)/$dulu)*100;
}

function kira3($kira,$n) 
{
	# tambah bilangan 0 pada depan $kira
	return str_pad($kira,$n,"0",STR_PAD_LEFT);
}

function huruf($jenis, $papar) 
{
	switch ($jenis) 
	{
	case "BESAR":
		$papar = strtoupper($papar);
		break;
	case "kecil":
		$papar = strtolower($papar);
		break;
	case "Besar":
		$papar = ucfirst($papar);
		break;
	case "Besar_Depan":
		$papar = mb_convert_case($papar, MB_CASE_TITLE);
		break;
	}
	
	return $papar;
}

function bersih($papar) 
{
	# buang ruang kosong (atau aksara lain) dari mula & akhir 
	$papar = trim($papar);
	
	return $papar;
}

function cari_fail($fail,$strExt = 'jpg', $strDir)
{
	if ( isset($fail) && empty($fail) )
	{
		$cariFail = null;
	}
	else
	{
		# This is the full match pattern based upon your selections above
		$pattern = "*" . $fail . "*." . $strExt;
		//echo '<br> Fungsi.php -> $strDir=' . $strDir;
		
		# find function GetContents() & GetMatchingFiles()
		$cariFail = GetMatchingFiles(GetContents($strDir),$pattern);
	}
	
	//print_r($cariFail);
	return $cariFail;
}

function GetMatchingFiles($files, $search) 
{
	# Split to name and filetype
	if(strpos($search,".")) 
	{
		$baseexp=substr($search,0,strpos($search,"."));
		$typeexp=substr($search,strpos($search,".")+1,strlen($search));
	} 
	else 
	{ 
		$baseexp=$search;
		$typeexp="";
	} 
		
	# Escape all regexp Characters 
	$baseexp=preg_quote($baseexp); 
	$typeexp=preg_quote($typeexp); 
		
	# Allow ? and *
	$baseexp=str_replace(array("\*","\?"), array(".*","."), $baseexp);
	$typeexp=str_replace(array("\*","\?"), array(".*","."), $typeexp);
		   
	# Search for Matches
	$i=0;
	$matches=null; # $matches adalah array()
	foreach($files as $file) 
	{
		$filename=basename($file);
			  
		if(strpos($filename,".")) 
		{
			$base=substr($filename,0,strpos($filename,"."));
			$type=substr($filename,strpos($filename,".")+1,strlen($filename));
		} 
		else 
		{ 
			$base=$filename;
			$type="";
		}

		if(preg_match("/^".$baseexp."$/i",$base) && preg_match("/^".$typeexp."$/i",$type))  
		{
			$matches[$i]=$file;
			$i++;
		}
	}
	
	return $matches;
}


function GetContents($dir,$files=array()) 
{# Returns all Files contained in given dir, including subdirs
	if(!($res=opendir($dir))) exit("$dir doesn't exist!");
		while(($file=readdir($res))==TRUE) 
		if($file!="." && $file!="..")
			if(is_dir("$dir/$file")) 
				$files=GetContents("$dir/$file",$files);
			else array_push($files,"$dir/$file");
		 
	closedir($res);
	return $files;
}