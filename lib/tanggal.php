<?php 
	function tanggal($tanggal, $cetak_hari = true)
	{
		$hari = array(1 => 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu' );
		$bulan = array(1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember' );
		$split = explode('-', $tanggal);
		$tgl=$split[2].' '.$bulan[(int)$split[1]].' '.$split[0];

		if ($cetak_hari) {
			$num = date("N", strtotime($tanggal));
			return $hari[$num].', '.$tgl;
		}
		return $tgl;
	}

function getHari($ket){
	$hari = date ("D");
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu-07";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin-01";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa-02";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu-03";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis-04";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat-05";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu-06";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
	$data=explode("-", $hari_ini);
	if ($ket=="angka") {
		return $data[1];
	}elseif ($ket=="huruf") {
		return $data[0];
	}else{
		return $data[0];
	}
}
	function getRomawi($bulan)
	{
		switch ($bulan) {
				case 1:
					return "I";
					break;
				case 2:
					return "II";
					break;
				case 3:
					return "III";
					break;
				case 4:
					return "IV";
					break;
				case 5:
					return "V";
					break;
				case 6:
					return "VI";
					break;
				case 7:
					return "VII";
					break;
				case 8:
					return "VIII";
					break;
				case 9:
					return "IX";
					break;
				case 10:
					return "X";
					break;
				case 11:
					return "XI";
					break;
				case 12:
					return "XII";
					break;
					
				default:
					# code...
					break;
			}	
	}

	function getMonth($rom)
	{
		switch ($rom) {
				case 'I':
					return "01";
					break;
				case 'II':
					return "02";
					break;
				case 'III':
					return "03";
					break;
				case 'IV':
					return "04";
					break;
				case 'V':
					return "05";
					break;
				case 'VI':
					return "06";
					break;
				case 'VII':
					return "07";
					break;
				case 'VIII':
					return "08";
					break;
				case 'IX':
					return "09";
					break;
				case 'X':
					return "10";
					break;
				case 'XI':
					return "11";
					break;
				case 'XII':
					return "12";
					break;
			}	
	}
	
function getKelas($param,$by){
	if ($param=="x") {
		$data="10 Sepuluh";
	}elseif ($param=="xi") {
		$data="11 Sebelas";
	}elseif ($param=="xii") {
		$data="12 Duabelas";
	}else{
		return "Nothing";
	}
	$exd=explode(" ", $data);
	if ($by=="x") {
		$result=$exd[0];
	}elseif ($by=="y") {
		$result=$exd[1];
	}elseif ($by=="xy"||$by=="yx") {
		$result=$exd[0]." (".$exd[1].")";
	}else{
		$result=$exd[0];
	}
	return $result;
}

function checkJam($param){
  global $koneksi;
  $waktu = date('G:i'); //Format 24 jam
  $format=explode("-", $param);
  $time=explode("_", $format[1]);
  $i=0;
  while ($i<=1) {
    $query=mysqli_query($koneksi,"SELECT * FROM tb_jam WHERE kd_hari='$format[0]' and kd_jam='$time[$i]'");
  }
}

function postHari($param){
	$hari=explode("-", $param);
	switch($hari[0]){
		case 7:
			$hari_ini = "Minggu";
		break;
 
		case 1:			
			$hari_ini = "Senin";
		break;
 
		case 2:
			$hari_ini = "Selasa";
		break;
 
		case 3:
			$hari_ini = "Rabu";
		break;
 
		case 4:
			$hari_ini = "Kamis";
		break;
 
		case 5:
			$hari_ini = "Jumat";
		break;
 
		case 6:
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
	return $hari_ini;
}

function postJam($param){
	$raw=explode("-", $param);
	$jam=explode("_", $raw[1]);
	$rcd=count($jam);
	if ($rcd==3) {
	    if (substr($jam[0],-2,1)==0&&substr($jam[2],-2,1)==0){
	        $data=substr($jam[0],1,1)." - ".substr($jam[2], 1,1);  
	    }elseif(substr($jam[2],-2,1)==0){
	        $data=substr($jam[0],1,1)." - ".substr($jam[2], -2,2);
	    }elseif(substr($jam[0],-2,1)==0){
	        $data=substr($jam[0],1,1)." - ".substr($jam[2], -2,2);
	    }else{
	        $data=substr($jam[0],-2,2)." - ".substr($jam[2], -2,2); 
	    }
	}else if ($rcd==2) {
	    if (substr($jam[0],-2,1)==0&&substr($jam[1],-2,1)==0){
	        $data=substr($jam[0],1,1)." - ".substr($jam[1], 1,1);  
	    }elseif(substr($jam[1],-2,1)==0){
	        $data=substr($jam[0],1,1)." - ".substr($jam[1], -2,2);
	    }elseif(substr($jam[0],-2,1)==0){
	        $data=substr($jam[0],1,1)." - ".substr($jam[1], -2,2);
	    }else{
	        $data=substr($jam[0],-2,2)." - ".substr($jam[1], -2,2); 
	    }
// 		$data=$jam[0]." - ".$jam[1];
	}else{
		$data="NONE";
	}
	return $data;
}

function bulanString($param){
	switch ($param) {
        case 1  : $bulan = "Januari";
           break;
        case 2  : $bulan = "Februari";
           break;
        case 3  : $bulan = "Maret";
           break;
        case 4  : $bulan = "April";
           break;
        case 5  : $bulan = "Mei";
           break;
        case 6  : $bulan = "Juni";
           break;
        case 7  : $bulan = "Juli";
           break;
        case 8  : $bulan = "Agustus";
           break;
        case 9  : $bulan = "September";
           break;
        case 10 : $bulan = "Oktober";
           break;
        case 11 : $bulan = "November";
           break;
        case 12 : $bulan = "Desember";
           break;
    }
    return $bulan;
}

function hariString($param){
	switch($param){
		case 'Sun':
			$hari_lap = "Minggu";
		break;
 
		case 'Mon':			
			$hari_lap = "Senin";
		break;
 
		case 'Tue':
			$hari_lap = "Selasa";
		break;
 
		case 'Wed':
			$hari_lap = "Rabu";
		break;
 
		case 'Thu':
			$hari_lap = "Kamis";
		break;
 
		case 'Fri':
			$hari_lap = "Jumat";
		break;
 
		case 'Sat':
			$hari_lap = "Sabtu";
		break;
		
		default:
			$hari_lap = "Tidak di ketahui";		
		break;
	}
	
	return $hari_lap;
	
}

?>