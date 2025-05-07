<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	
	$id_sekolah   = md5($_POST[nama_sekolah]);
	$randomkata = random_string(0);
	$kd_sekolah = $id_sekolah.$randomkata;
	
	$nama_sekolah = addslashes($_POST[nama_sekolah]);
	$npsn_sekolah = addslashes($_POST[npsn_sekolah]);
	$singkatan = addslashes($_POST[singkatan]);
	$alamat = addslashes($_POST[alamat_sekolah]);
	$user_akses = $_SESSION['kdpegawai'];
	
	mysqli_query($conn,"INSERT INTO m_sekolah(kd_sekolah,
									  npsn,
									  nama_sekolah,
									  singkatan,
									  alamat_sekolah,
									  tanggal_buat,
									  tanggal_ubah,
									  status,
									  kd_pegawai) VALUES('$kd_sekolah',
													 '$npsn_sekolah',
													 '$nama_sekolah',
													 '$singkatan',
													 '$alamat',
													 '$tanggal',
													 '$tanggal',
													 'on',
													 '$user_akses')");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$kd_sekolah   = $_POST[kd_sekolah];
	$nama_sekolah = addslashes($_POST[nama_sekolah]);
	$npsn_sekolah = addslashes($_POST[npsn_sekolah]);
	$singkatan = addslashes($_POST[singkatan]);
	$alamat = addslashes($_POST[alamat_sekolah]);
	$user_akses = $_SESSION['kdpegawai'];
	mysqli_query($conn,"UPDATE m_sekolah SET npsn ='$npsn_sekolah',
											 nama_sekolah='$nama_sekolah',
											 singkatan='$singkatan',
											 alamat_sekolah='$alamat',
											 tanggal_ubah='$tanggal',
											 kd_pegawai='$user_akses'
											 where kd_sekolah ='$kd_sekolah'");
	
	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
	
}elseif($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $kd_sekolah= $_GET['id'];
  $query=mysqli_query($conn,"Delete FROM m_sekolah WHERE kd_sekolah='$kd_sekolah'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>