<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$tgl_awal = date('Y-m-d', strtotime($_POST[startdate]));
	$tgl_akhir = date('Y-m-d', strtotime($_POST[enddate]));
	
	//GENERATE RANDOM KODE VOUCHER
	$kd_voucher   = md5($_POST[voucher]);
	$randomkata = random_string(0);
	$kd_voucher_r = $kd_voucher.$randomkata;

	$voucher = addslashes($_POST[voucher]);
	$kd_pegawai = $_SESSION['kdpegawai'];

	//CHECKBOX CHECKING
	if($_POST['AKT'] != ''){
		$akt = $_POST['AKT'];
	}
	if($_POST['APK'] != ''){
		$apk = ' , '.$_POST['APK'];
	}
	if($_POST['PMS'] != ''){
		$pms = ' , '.$_POST['PMS'];
	}
	if($_POST['PBS'] != ''){
		$pbs = ' , '.$_POST['PBS'];
	}
	if($_POST['APH'] != ''){
		$aph = ' , '.$_POST['APH'];
	}
	if($_POST['JB'] != ''){
		$jb = ' , '.$_POST['JB'];
	}
	if($_POST['UPW'] != ''){
		$upw = ' , '.$_POST['UPW'];
	}
	if($_POST['BB'] != ''){
		$bb = ' , '.$_POST['BB'];
	}
	if($_POST['KCK'] != ''){
		$kck = ' , '.$_POST['KCK'];
	}
	if($_POST['MLOG'] != ''){
		$mlog = ' , '.$_POST['MLOG'];
	}
	if($_POST['HR'] != ''){
		$hr = ' , '.$_POST['HR'];
	}

	$ketvoucher = $akt . $apk  . $pms . $pbs . $aph . $jb . $upw . $bb . $kck . $mlog . $hr;

	
	mysqli_query($conn,"INSERT INTO m_voucher(kd_voucher,
									  voucher,
									  nominal_voucher,
									  stok_voucher,
									  keterangan,
									  tanggal_awal,
									  tanggal_akhir,
									  tanggal_buat,
									  tanggal_ubah,
									  kd_pegawai) VALUES('$kd_voucher_r',
													 '$voucher',
													 '$_POST[nominal]',
													 '$_POST[stok]',
													 '$ketvoucher',
													 '$tgl_awal',
													 '$tgl_akhir',
													 '$tanggal',
													 '$tanggal',
													 '$kd_pegawai')");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	$module = $_GET['module'];
	$kd_voucher = $_POST[kd_voucher];
	$nominal_voucher = $_POST[nominal_voucher];
	$stok_voucher = $_POST[stok_voucher];
	$kd_pegawai = $_SESSION['kdpegawai'];
	$tanggal_ubah = date("Y-m-d");
	$tgl_awal = date('Y-m-d', strtotime($_POST[startdate]));
	$tgl_akhir = date('Y-m-d', strtotime($_POST[enddate]));
	
	//CHECKBOX CHECKING
	if($_POST['AKT'] != ''){
		$akt = $_POST['AKT'];
	}
	if($_POST['APK'] != ''){
		$apk = ' , '.$_POST['APK'];
	}
	if($_POST['PMS'] != ''){
		$pms = ' , '.$_POST['PMS'];
	}
	if($_POST['PBS'] != ''){
		$pbs = ' , '.$_POST['PBS'];
	}
	if($_POST['APH'] != ''){
		$aph = ' , '.$_POST['APH'];
	}
	if($_POST['JB'] != ''){
		$jb = ' , '.$_POST['JB'];
	}
	if($_POST['UPW'] != ''){
		$upw = ' , '.$_POST['UPW'];
	}
	if($_POST['BB'] != ''){
		$bb = ' , '.$_POST['BB'];
	}
	if($_POST['KCK'] != ''){
		$kck = ' , '.$_POST['KCK'];
	}
	if($_POST['MLOG'] != ''){
		$mlog = ' , '.$_POST['MLOG'];
	}
	if($_POST['HR'] != ''){
		$hr = ' , '.$_POST['HR'];
	}

	$ketvoucher = $akt . $apk  . $pms . $pbs . $aph . $jb . $upw . $bb . $kck . $mlog . $hr;

	mysqli_query($conn,"UPDATE m_voucher set nominal_voucher = '$nominal_voucher',
								stok_voucher = '$stok_voucher',
								keterangan = '$ketvoucher',
								kd_pegawai = '$kd_pegawai',
								tanggal_ubah = '$tanggal_ubah'
								WHERE kd_voucher = '$kd_voucher'");

	echo "<script language='javascript'>alert ('Data Berhasil diubah');</script>";
	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}elseif($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $kd_voucher= $_GET['id'];
  $query=mysqli_query($conn,"Delete FROM m_voucher WHERE kd_voucher='$kd_voucher'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>