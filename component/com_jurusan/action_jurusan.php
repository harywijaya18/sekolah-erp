<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$id_jurusan   = md5($_POST[jurusan]);
	$randomkata = random_string(0);
	$kd_jurusan = $id_jurusan.$randomkata;
	$jurusan = addslashes($_POST[jurusan]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	mysqli_query($conn,"INSERT INTO m_jurusan(kd_jurusan,
									  jurusan,
									  singkatan,
									  program_studi,
									  tanggal_buat,
									  tanggal_ubah,
									  udp,
									  target_siswa,
									  kd_tahun,
									  kd_spektrum,
									  kd_pegawai) VALUES('$kd_jurusan',
													 '$jurusan',
													 '$_POST[singkatan]',
													 '$_POST[program_studi]',
													 '$tanggal',
													 '$tanggal',
													 '$_POST[udp]',
													 '$_POST[target]',
													 '$_POST[kd_tahun]',
													 '$_POST[kd_spektrum]',
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
											 kd_spektrum='$_POST[kd_spektrum]',
											 kd_pegawai='$kd_pegawai'
											 where kd_jurusan ='$kd_jurusan'");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}elseif($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $kd_jurusan= $_GET['id'];
  $query=mysqli_query($conn,"Delete FROM m_jurusan WHERE kd_jurusan='$kd_jurusan'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>