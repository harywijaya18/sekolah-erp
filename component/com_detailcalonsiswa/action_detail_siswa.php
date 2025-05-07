<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$tgl_bayar = date('Y-m-d', strtotime($_POST[tanggalbayar]));
	
	//GENERATE KODE BAYAR
	$randomkata = random_string(0);
	$kd_bayar   = $_POST[kd_siswa].$randomkata;
	
	//GENERATE NOMOR URUT TERAKHIR KODE UNIK
	$query = "SELECT max(no_bayar) as maxID FROM transaksi_psb";
    $hasil = mysqli_query($conn,$query);
    $data = @mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
	$noUrut = (int) substr($idMax, 2, 3);
	//$noUrut = (int) ($idMax);
	$noUrut++;
	$char = 'B';
	$newID = $char.sprintf("%03s", $noUrut);
	
	$jumlah_bayar = addslashes($_POST[nominal]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	mysqli_query($conn,"INSERT INTO transaksi_psb(kd_bayar,
									  kd_siswa,
									  no_bayar,
									  jumlah_bayar,
									  tanggal_buat,
									  ket,
									  kd_pegawai,
									  status) VALUES('$kd_bayar',
													 '$_POST[kd_siswa]',
													 '$newID',
													 '$jumlah_bayar',
													 '$tgl_bayar',
													 '$_POST[ket]',
													 '$kd_pegawai',
													 'A')");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi&id=".$_POST[kd_siswa]."';</script>";

}elseif($_GET['aksi'] == 'edit'){
	$module = $_GET['module'];
	$kd_siswa = $_POST['kd_siswa'];
	$no_bayar = $_POST['no_bayar'];
	$tgl_bayar = date('Y-m-d', strtotime($_POST[tanggalbayar]));
	$tanggal_ubah = date("Y-m-d");
	$jumlah_bayar = $_POST['jumlah_bayar'];
	$kd_pegawai = $_SESSION['kdpegawai'];

	mysqli_query($conn,"UPDATE transaksi_psb set jumlah_bayar = '$jumlah_bayar',
								kd_pegawai = '$kd_pegawai',
								tanggal_ubah = '$tanggal_ubah'
								WHERE kd_siswa = '$kd_siswa' AND
								no_bayar = '$no_bayar'");

	echo "<script language='javascript'>document.location='?module=".$module."&aksi&id=".$kd_siswa."';</script>";
	//echo "<script language='javascript'>alert ('".$kd_pegawai."');</script>";

}elseif($_GET['aksi'] == 'hapus'){
  $module = $_GET['module'];  
  $kd_bayar= $_GET['id'];
  $kd_siswa= $_GET['kdsiswa'];
  $query=mysqli_query($conn,"Delete FROM transaksi_psb WHERE kd_bayar='$kd_bayar'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi&id=".$kd_siswa."';</script>";
}
?>