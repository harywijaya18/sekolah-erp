<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	//SCRIPT UNTUK MENYIMPAN DATA
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	
	//GENERATE KODE SISWA SECARA RANDOM SALT
	$kd_siswa   = md5($_POST[nama]);
	$randomkata = random_string(0);
	$kd_siswa_r = $kd_siswa.$randomkata;
	
	//MENGECEK SINGKATAN JURUSAN
	$kd_jurusan = $_POST[kd_jurusan];
	$query_skt="SELECT * FROM m_jurusan where kd_jurusan ='$kd_jurusan'";
	$hasil_skt = mysqli_query($conn,$query_skt);
	$data_skt = @mysqli_fetch_array($hasil_skt);
	$singkatan_jurusan = $data_skt['singkatan'];
	
	//GENERATE NOMOR URUT TERAKHIR KODE UNIK
	$query = "SELECT max(kd_unik_siswa) as maxID, LENGTH(kd_unik_siswa) as lengthid FROM calon_siswa where kd_jurusan='$kd_jurusan' ";
    $hasil = mysqli_query($conn,$query);
    $data = @mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
	
	if($data['lengthid'] > 5 ){
		$noUrut = (int) substr($idMax, 3, 3);
		//$noUrut = (int) ($idMax);
		$noUrut++;
		$char = $singkatan_jurusan;
		$newID = $char.sprintf("%03s", $noUrut); 
	}else{
		$noUrut = (int) substr($idMax, 2, 3);
		//$noUrut = (int) ($idMax);
		$noUrut++;
		$char = $singkatan_jurusan;
		$newID = $char.sprintf("%03s", $noUrut); 
	}
	
	
	//VARIABEL UNTUK TETAP MENYIMPAN DATA YG MEMILIKI KARAKTER KHUSUS MISAL TANDA KUTIP
	$nisn = addslashes($_POST[nisn]);
	$nama = addslashes($_POST[nama]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tanggal_lahir = $_POST[tanggal_lahir];
	$tgllahir = date('Y-m-d', strtotime($tanggal_lahir));
	$nama_ortu = addslashes($_POST[nama_ortu]);
	$alamat = addslashes($_POST[alamat]);
	$telp = addslashes($_POST[telp]);
	$ket = addslashes($_POST[keterangan]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	

	mysqli_query($conn,"INSERT INTO calon_siswa(kd_siswa,
									  kd_unik_siswa,
									  nisn,
									  nama,
									  jenis_kelamin,
									  tempat,
									  tanggal_lahir,
									  nama_orangtua,
									  alamat,
									  telp,
									  keterangan,
									  kd_sekolah,
									  kd_jurusan,
									  tanggal_buat,
									  kd_pegawai,
									  kd_voucher,
									  kd_diskon) VALUES('$kd_siswa_r',
													 '$newID',
													 '$nisn',
													 '$nama',
													 '$_POST[jenis_kelamin]',
													 '$tempat_lahir',
													 '$tgllahir',
													 '$nama_ortu',
													 '$alamat',
													 '$telp',
													 '$ket',
													 '$_POST[kd_sekolah]',
													 '$kd_jurusan',
													 '$tanggal',
													 '$kd_pegawai',
													 '',
													 '$_POST[kd_diskon]')");
	

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT UNTUK UPDATE DATA
	$module = $_GET['module'];
	$tanggal = date("Y-m-d");
	
	//MENGECEK SINGKATAN JURUSAN
	$kd_jurusan = $_POST[kd_jurusan];
	$query_skt="SELECT * FROM m_jurusan where kd_jurusan ='$kd_jurusan'";
	$hasil_skt = mysqli_query($conn,$query_skt);
	$data_skt = @mysqli_fetch_array($hasil_skt);
	$singkatan_jurusan = $data_skt['singkatan'];
	
	//GENERATE NOMOR URUT TERAKHIR KODE UNIK
	$query = "SELECT max(kd_unik_siswa) as maxID, LENGTH(kd_unik_siswa) as lengthid FROM calon_siswa where kd_jurusan='$kd_jurusan' ";
    $hasil = mysqli_query($conn,$query);
    $data = @mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
	
    if($data['lengthid'] > 5 ){
		$noUrut = (int) substr($idMax, 3, 3);
		//$noUrut = (int) ($idMax);
		$noUrut++;
		$char = $singkatan_jurusan;
		$newID = $char.sprintf("%03s", $noUrut); 
	}else{
		$noUrut = (int) substr($idMax, 2, 3);
		//$noUrut = (int) ($idMax);
		$noUrut++;
		$char = $singkatan_jurusan;
		$newID = $char.sprintf("%03s", $noUrut); 
	}
	
	//VARIABEL UNTUK TETAP MENYIMPAN DATA YG MEMILIKI KARAKTER KHUSUS MISAL TANDA KUTIP
	$kd_siswa   = $_POST[kd_siswa];
	$nisn = addslashes($_POST[nisn]);
	$nama = addslashes($_POST[nama]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tanggal_lahir = $_POST[tanggal_lahir];
	$tgllahir = date('Y-m-d', strtotime($tanggal_lahir));
	$nama_ortu = addslashes($_POST[nama_ortu]);
	$alamat = addslashes($_POST[alamat]);
	$telp = addslashes($_POST[telp]);
	$ket = addslashes($_POST[keterangan]);
	$kd_pegawai = $_SESSION['kdpegawai'];
	
	//MENGECEK APAKAH ADA PERUBAHAN JURUSAN
	$query_jur = "SELECT * FROM calon_siswa where kd_siswa ='$kd_siswa'";
	$hasil_jur = mysqli_query($conn,$query_jur);
	$data_jur = @mysqli_fetch_array($hasil_jur);
	
	if($data_jur['kd_jurusan'] == $kd_jurusan){
		
		mysqli_query($conn,"UPDATE calon_siswa SET nisn ='$nisn',
											 nama ='$nama', 
											 jenis_kelamin='$_POST[jenis_kelamin]',
											 tempat='$tempat_lahir',
											 tanggal_lahir='$tgllahir',
											 nama_orangtua='$nama_ortu',
											 alamat='$alamat',
											 telp='$telp',
											 keterangan='$ket',
											 kd_sekolah='$_POST[kd_sekolah]',
											 kd_jurusan='$kd_jurusan',
											 tanggal_ubah='$tanggal',
											 kd_pegawai='$kd_pegawai',
											 kd_voucher='',
											 kd_diskon='$_POST[kd_diskon]'
											 where kd_siswa ='$kd_siswa'");	

	}else{

		mysqli_query($conn,"UPDATE calon_siswa SET kd_unik_siswa ='$newID',
											 nisn ='$nisn',
											 nama ='$nama', 
											 jenis_kelamin='$_POST[jenis_kelamin]',
											 tempat='$tempat_lahir',
											 tanggal_lahir='$tgllahir',
											 nama_orangtua='$nama_ortu',
											 alamat='$alamat',
											 telp='$telp',
											 keterangan='$ket',
											 kd_sekolah='$_POST[kd_sekolah]',
											 kd_jurusan='$kd_jurusan',
											 tanggal_ubah='$tanggal',
											 kd_pegawai='$kd_pegawai',
											 kd_voucher='',
											 kd_diskon='$_POST[kd_diskon]'
											 where kd_siswa ='$kd_siswa'");	

	}
	
	
	//echo $query_coba;
	
	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
	
}elseif($_GET['aksi'] == 'hapus'){
  //SCRIPT UNTUK HAPUS DATA
  $module = $_GET['module'];  
  $kd_siswa = $_GET['id'];
  $query=mysqli_query($conn,"Delete FROM calon_siswa WHERE kd_siswa='$kd_siswa'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>