<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	//SCRIPT UNTUK MUTASI CALON SISWA
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d G:i:s");
	$tgl_daftar = date('Y-m-d', strtotime($_POST[tanggaldaftar]));
	
	
	
	//MENGECEK SINGKATAN JURUSAN
	$kd_jurusan = $_POST[kd_jurusan];
	
	
	//VARIABEL UNTUK TETAP MENYIMPAN DATA YG MEMILIKI KARAKTER KHUSUS MISAL TANDA KUTIP
	$kd_siswa   = $_POST[kd_siswa];
	//GENERATE KODE SISWA SECARA RANDOM SALT
	$randomkata = random_string(0);
	$kd_siswa_r = $kd_siswa.$randomkata;
	
	$kd_unik = $_POST[kd_unik];
	$nisn = addslashes($_POST[nisn]);
	$nama = addslashes($_POST[nama]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tanggal_lahir = $_POST[tanggal_lahir];
	$tgllahir = date('Y-m-d', strtotime($tanggal_lahir));
	$nama_ortu = addslashes($_POST[nama_ortu]);
	$alamat = addslashes($_POST[alamat]);
	$telp = addslashes($_POST[telp]);
	$pembayaran = addslashes($_POST[pembayaran]);
	$tgl_bayar = date('Y-m-d', strtotime($_POST[tanggalbayar]));
	$ket = addslashes($_POST[keterangan]);
	$kd_pegawai = $_SESSION['kdpegawai'];
											 
		//MENAMBAHKAN PADA DB CALON SISWA
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
									  kd_sekolah,
									  kd_kelas,
									  kd_jurusan,
									  tanggal_buat,
									  kd_pegawai,
									  kd_voucher,
									  kd_diskon,
									  keterangan,
									  status) values ('$kd_siswa',
													 '$kd_unik',
													 '$nisn',
													 '$nama',
													 '$_POST[jenis_kelamin]',
													 '$tempat_lahir',
													 '$tgllahir',
													 '$nama_ortu',
													 '$alamat',
													 '$telp',
													 '$_POST[kd_sekolah]',
													 '$_POST[kd_kelas]',
													 '$kd_jurusan',
													 '$tgl_daftar',
													 '$kd_pegawai',
													 '$_POST[kd_voucher]',
													 '$_POST[kd_diskon]',
													 '$ket',
													 'Y')");
													 
													 
	//MERUBAH PADA STATUS DAFTAR ONLINE												 
	$query=mysqli_query($conn,"UPDATE daftar_online set status='M' WHERE kd_siswa='$kd_siswa'");
		
	
	//MENAMBAHKAN PEMBAYARAN JIKA ADA PEMBAYARAN UDP
	if($pembayaran != ""){

		//GENERATE KODE BAYAR
		$randomkata = random_string(0);
		$kd_bayar   = $kd_siswa_r.$randomkata;
		
		//GENERATE NOMOR URUT TERAKHIR KODE UNIK
		$query = "SELECT max(no_bayar) as maxID FROM transaksi_psb";
		$hasil = mysqli_query($conn,$query);
		$data = @mysqli_fetch_array($hasil);
		$idMax = $data['maxID'];
		$noUrut = (int) substr($idMax, 2, 3);
		//$noUrut = (int) ($idMax);
		$noUrut++;
		$char = 'B';
		$newIDUdp = $char.sprintf("%03s", $noUrut);
		
		


		mysqli_query($conn,"INSERT INTO transaksi_psb(kd_bayar,
									  kd_siswa,
									  no_bayar,
									  jumlah_bayar,
									  tanggal_buat,
									  ket,
									  kd_pegawai,
									  status) VALUES('$kd_bayar',
													 '$kd_siswa',
													 '$newIDUdp',
													 '$pembayaran',
													 '$tgl_bayar',
													 '$ket',
													 '$kd_pegawai',
													 'A')");
	}
	
	//echo $query_coba;
	
	echo "<script language='javascript'>alert('Mutasi ke calon siswa berhasil');</script>";
	echo "<script language='javascript'>document.location='?module=calon_siswa&aksi';</script>";

}elseif($_GET['aksi'] == 'update'){
	$module = $_GET['module'];
	$tanggal = date("Y-m-d G:i:s");
	$tgl_daftar = date('Y-m-d', strtotime($_POST[tanggaldaftar]));
	
	//MENGECEK SINGKATAN JURUSAN
	$kd_jurusan = $_POST[kd_jurusan];
	
	//VARIABEL UNTUK TETAP MENYIMPAN DATA YG MEMILIKI KARAKTER KHUSUS MISAL TANDA KUTIP
	$kd_siswa   = $_POST[kd_siswa];
	//GENERATE KODE SISWA SECARA RANDOM SALT
	$randomkata = random_string(0);
	$kd_siswa_r = $kd_siswa.$randomkata;
	
	$kd_unik = $_POST[kd_unik];
	$nisn = addslashes($_POST[nisn]);
	$nama = addslashes($_POST[nama]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tanggal_lahir = $_POST[tanggal_lahir];
	$tgllahir = date('Y-m-d', strtotime($tanggal_lahir));
	$nama_ortu = addslashes($_POST[nama_ortu]);
	$alamat = addslashes($_POST[alamat]);
	$telp = addslashes($_POST[telp]);
	$ket = addslashes($_POST[keterangan]);
	$kd_pegawai = $_SESSION['kdpegawai'];
											 
		//MENAMBAHKAN PADA DB CALON SISWA
		
	$queryUpdate = mysqli_query($conn,"UPDATE daftar_online SET keterangan = '$ket'
									  where kd_siswa = '$kd_siswa'");
	if($queryUpdate){
		echo "<script language='javascript'>alert('Perubahan data pendaftar online berhasil');</script>";
	}else{
		$error = "Error: " . $queryUpdate . "<br>" -> error;
		echo '<script>alert("'.$error.'")</script>';  
		//die('Query Error : '.$mysqli->errno.' - '.$mysqli->error);
	}
	
	echo "<script language='javascript'>document.location='?module=daftar_online&aksi';</script>";
	
}elseif($_GET['aksi'] == 'hapus'){
  //SCRIPT UNTUK HAPUS DATA
  $module = $_GET['module'];  
  $kd_siswa = $_GET['id'];
  $query=mysqli_query($conn,"UPDATE daftar_online set status='N' WHERE kd_siswa='$kd_siswa'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>