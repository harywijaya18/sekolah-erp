<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	//SCRIPT UNTUK MENYIMPAN DATA
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	
	$kd_diskon   = md5($_POST[namadiskon]);
	$randomkata = random_string(0);
	$kd_diskon_random = $kd_diskon.$randomkata;
	
	$nama_diskon = addslashes($_POST[namadiskon]);
	$tgl_awal = date('Y-m-d', strtotime($_POST[startday]));
	$tgl_akhir = date('Y-m-d', strtotime($_POST[endday]));
	$ket = addslashes($_POST[keterangan]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	
	mysqli_query($conn,"INSERT INTO m_diskon(kd_diskon,
									  nama_diskon,
									  diskon,
									  tanggal_awal,
									  tanggal_akhir,
									  keterangan,
									  tanggal_buat,
									  kd_pegawai) VALUES('$kd_diskon_random',
													 '$nama_diskon',
													 '$_POST[diskon]',
													 '$tgl_awal',
													 '$tgl_akhir',
													 '$ket',
													 '$tanggal',
													 '$kd_pegawai')");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT UNTUK UPDATE DATA
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$kd_pegawai   = $_POST[kd_pegawai];
	$nama = addslashes($_POST[nama_pegawai]);
	$username = addslashes($_POST[username]);
	$password = md5($_POST[password]);
	
	//MENGECEK APAKAH ADA PERUBAHAN PASSWORD ATAU TIDAK
	if(empty($_POST[password])){
		mysqli_query($conn,"UPDATE m_pegawai SET nama ='$nama', 
											 username='$username',
											 tanggal_ubah='$tanggal',
											 status='$_POST[status]',
											 level='$_POST[level]'
											 where kd_pegawai ='$kd_pegawai'");						
	}else{
		mysqli_query($conn,"UPDATE m_pegawai SET nama ='$nama', 
											 username='$username',
											 password='$password',
											 tanggal_ubah='$tanggal',
											 status='$_POST[status]',
											 level='$_POST[level]'
											 where kd_pegawai ='$kd_pegawai'");						 
	}
	
	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
	
}elseif($_GET['aksi'] == 'hapus'){
  //SCRIPT UNTUK HAPUS DATA
  $module = $_GET['module'];  
  $kd_pegawai= $_GET['id'];
  $query=mysqli_query($conn,"Delete FROM m_pegawai WHERE kd_pegawai='$kd_pegawai'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>