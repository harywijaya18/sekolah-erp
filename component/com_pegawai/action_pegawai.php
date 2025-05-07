<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	//SCRIPT UNTUK MENYIMPAN DATA
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	
	$kd_pegawai   = md5($_POST[nip]);
	//$randomkata = random_string(0);
	//$kd_sekolah = $id_sekolah.$randomkata;
	
	$nip = addslashes($_POST[nip]);
	$nama = addslashes($_POST[nama]);
	
	mysqli_query($conn,"INSERT INTO m_pegawai(kd_pegawai,
									  nip,
									  nama,
									  username,
									  password,
									  tanggal_buat,
									  tanggal_ubah,
									  status,
									  level) VALUES('$kd_pegawai',
													 '$nip',
													 '$nama',
													 '$nip',
													 '$kd_pegawai',
													 '$tanggal',
													 '$tanggal',
													 'Y',
													 '$_POST[level]')");

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