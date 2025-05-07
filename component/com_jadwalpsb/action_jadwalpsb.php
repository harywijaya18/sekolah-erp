<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	$tgl_promo = date('Y-m-d', strtotime($_POST[tanggalpromo]));
	
	//GENERATE RANDOM KODE VOUCHER
	$randomkata = random_string(0);
	$kd_unik = md5($randomkata);
	$kd_jadwal = $kd_unik;

	$ket = addslashes($_POST[ket]);
	$kd_pegawai = $_SESSION['kdpegawai'];

	
	mysqli_query($conn,"INSERT INTO jadwal_psb(kd_jadwal,
									  tanggal_jadwal,
									  tanggal_buat,
									  tanggal_ubah,
									  status,
									  keterangan,
									  kd_pegawai) VALUES('$kd_jadwal',
													 '$tgl_promo',
													 '$tanggal',
													 '$tanggal',
													 'Y',
													 '$ket',
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
  
}elseif($_GET['aksi'] == 'simpan_detail'){
	
	$module = $_GET['module'];
	//$tanggal = date("Y-m-d");
	
	$kd_jadwal = $_POST[kd_jadwal];
	$kd_sekolah = $_POST[kd_sekolah];
	$jam = $_POST[jam];
	$jumlah_kelas = $_POST[jumlah_kelas];
	$ket = addslashes($_POST[ket]);
	//$kd_pegawai = $_SESSION['kdpegawai'];

	
	mysqli_query($conn,"INSERT INTO jadwalpsb_detail(kd_jadwal,
									  kd_sekolah,
									  jam,
									  jumlah_kelas,
									  status,
									  keterangan) VALUES('$kd_jadwal',
													 '$kd_sekolah',
													 '$jam',
													 '$jumlah_kelas',
													 'N',
													 '$ket')");
													 
	mysqli_query($conn,"UPDATE m_sekolah SET selected = 'Y' where kd_sekolah = '$kd_sekolah'");												 

	echo "<script language='javascript'>document.location='?module=".$module."&aksi=detail&id=".$kd_jadwal."';</script>";
	
}elseif($_GET['aksi'] == 'simpan_kunjungan'){
	
	$module = $_GET['module'];
	$kd_jadwal = $_POST[kd_jadwal];
	
	$kd_sekolah = $_POST[kunjungan];
	$jumlah_dipilih = count($kd_sekolah);
	
	for($x=0;$x<$jumlah_dipilih;$x++){
		mysqli_query($conn,"UPDATE jadwalpsb_detail SET status ='Y' where kd_sekolah = '$kd_sekolah[$x]'");
	}
										 

	echo "<script language='javascript'>document.location='?module=".$module."&aksi=detail&id=".$kd_jadwal."';</script>";
}

?>