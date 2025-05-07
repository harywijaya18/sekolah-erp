<?php
include 'config/conn.php';

if($_GET['aksi'] == 'simpan'){
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$kd_spektrum   = md5($_POST[spektrum]);
	$spektrum = addslashes($_POST[spektrum]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	mysqli_query($conn,"INSERT INTO m_spektrum(kd_spektrum,
									  spektrum,
									  singkatan,
									  tanggal_buat,
									  tanggal_ubah,
									  kd_pegawai) VALUES('$kd_spektrum',
													 '$spektrum',
													 '$_POST[singkatan]',
													 '$tanggal',
													 '$tanggal',
													 '$kd_pegawai')");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$kd_jurusan   = $_POST[kd_jurusan];
	$jurusan = addslashes($_POST[jurusanedit]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	mysqli_query($conn,"UPDATE m_jurusan SET jurusan ='$jurusan', 
											 singkatan='$_POST[singkatan]',
											 program_studi='$_POST[program_studi]',
											 tanggal_ubah='$tanggal',
											 udp='$_POST[udp]', 
											 target_siswa='$_POST[target]',
											 kd_tahun='$_POST[kd_tahun]', 
											 kd_pegawai='$kd_pegawai'
											 where kd_jurusan ='$kd_jurusan'");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}elseif($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $kd_spektrum= $_GET['id'];
  $query=mysqli_query($conn,"Delete FROM m_spektrum WHERE kd_spektrum='$kd_spektrum'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>