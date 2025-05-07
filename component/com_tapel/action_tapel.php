<?php
include 'config/conn.php';

if($_GET['aksi'] == 'simpan'){
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$idtapel   = md5($_POST[tahun_ajaran]);
	$tahunajaran = addslashes($_POST[tahun_ajaran]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	$query="INSERT INTO m_tahun(kd_tahun,
									  tahun,
									  tanggal_buat,
									  tanggal_ubah,
									  status,
									  kd_pegawai) VALUES('$idtapel',
													 '$tahunajaran',
													 '$tanggal',
													 '$tanggal',
													 '$_POST[status]',
													 '$kd_pegawai')";
	$exSave=mysqli_query($conn, $query);
	if($exSave){
		$_SESSION["m"] = 'S';
	}

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	
}elseif($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $kd_tahun= $_GET['id'];
  $query=mysqli_query($conn,"update m_tahun set status ='N' WHERE kd_tahun='$kd_tahun'");
  if($query){
    $_SESSION["m"] = 'D';
  }
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>