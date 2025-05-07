<?php
include 'config/conn.php';
include 'lib/random.php';

if($_GET['aksi'] == 'simpan'){
	//SCRIPT UNTUK MENYIMPAN DATA
	
	$module = $_GET['module'];
	$tanggal = date("Y-m-d G:i:s");
	$tgl_daftar = date('Y-m-d', strtotime($_POST[tanggaldaftar]));
	
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
	$kd_spektrum = $data_skt['kd_spektrum'];
	$kd_prog_jur = $data_skt['program_studi'];
	
	//MENGECEK SPEKTRUM (RUMPUN JURUSAN)
	$query_skt="SELECT * FROM m_spektrum where kd_spektrum ='$kd_spektrum'";
	$hasil_spkt = mysqli_query($conn,$query_skt);
	$data_spkt = @mysqli_fetch_array($hasil_spkt);
	$sing_spektrum = $data_spkt['singkatan'];
		
	//GENERATE NOMOR URUT TERAKHIR KODE UNIK
	//SELECT max(calon_siswa.kd_unik_siswa) as maxID
	$query = "SELECT calon_siswa.kd_unik_siswa as maxID, LENGTH(calon_siswa.kd_unik_siswa) as lengthid, m_jurusan.jurusan, 
				m_jurusan.program_studi, m_spektrum.singkatan FROM calon_siswa 
				LEFT JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
				LEFT JOIN m_spektrum ON m_jurusan.kd_spektrum = m_spektrum.kd_spektrum
				WHERE m_spektrum.kd_spektrum='$kd_spektrum'
				ORDER BY calon_siswa.tanggal_buat DESC
                LIMIT 1";
    $hasil = mysqli_query($conn,$query);
    $data = @mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
	
	/*
	//GENERATE NOMOR URUT TERAKHIR KODE UNIK
	$query = "SELECT max(kd_unik_siswa) as maxID, LENGTH(kd_unik_siswa) as lengthid FROM calon_siswa where kd_jurusan='$kd_jurusan' ";
    $hasil = mysqli_query($conn,$query);
    $data = @mysqli_fetch_array($hasil);
    $idMax = $data['maxID'];
	*/
	

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
	$kode_daftar = addslashes($_POST[kode_daftar]);
	$nisn = addslashes($_POST[nisn]);
	$nama = addslashes($_POST[nama]);
	//$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tempat_lahir = addslashes($_POST[tempat_lahir]);
	$tanggal_lahir = $_POST[tanggal_lahir];
	//$tgllahir = date('Y-m-d', strtotime($tanggal_lahir));
	$tgllahir = date('Y-m-d', strtotime($_POST[tanggal_lahir]));
	$nama_ortu = addslashes($_POST[nama_ortu]);
	$alamat = addslashes($_POST[alamat]);
	$telp = addslashes($_POST[telp]);
	$pembayaran = addslashes($_POST[pembayaran]);
	$tgl_bayar = date('Y-m-d', strtotime($_POST[tanggalbayar]));
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
									  kd_sekolah,
									  kd_kelas,
									  kd_jurusan,
									  tanggal_buat,
									  kd_pegawai,
									  kd_voucher,
									  kd_diskon,
									  status) VALUES('$kd_siswa_r',
													 '$kode_daftar',
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
													 'Y')");
	

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
													 '$kd_siswa_r',
													 '$newIDUdp',
													 '$pembayaran',
													 '$tgl_bayar',
													 '$ket',
													 '$kd_pegawai',
													 'A')");
	}
	//PENGURANGAN STOK VOUCHER APABILA DIGUNAKAN
	if($_POST[kd_voucher] != ""){
		$query_vcr="UPDATE m_voucher set stok_voucher = stok_voucher - 1 where kd_voucher ='$_POST[kd_voucher]'";
		$hasil_vcr = mysqli_query($conn,$query_vcr);
	}

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

}elseif($_GET['aksi'] == 'edit'){
	//SCRIPT UNTUK UPDATE DATA
	$module = $_GET['module'];
	$tanggal = date("Y-m-d G:i:s");
	$tgl_daftar = date('Y-m-d', strtotime($_POST[tanggaldaftar]));
	
	//MENGECEK SINGKATAN JURUSAN
	$kd_jurusan = $_POST[kd_jurusan];
	$query_skt="SELECT * FROM m_jurusan where kd_jurusan ='$kd_jurusan'";
	$hasil_skt = mysqli_query($conn,$query_skt);
	$data_skt = @mysqli_fetch_array($hasil_skt);
	$singkatan_jurusan = $data_skt['singkatan'];
	$kd_spektrum = $data_skt['kd_spektrum'];
	
	//GENERATE NOMOR URUT TERAKHIR KODE UNIK
	//$query = "SELECT max(kd_unik_siswa) as maxID, LENGTH(kd_unik_siswa) as lengthid FROM calon_siswa where kd_jurusan='$kd_jurusan' ";
	$query = "SELECT calon_siswa.kd_unik_siswa as maxID, LENGTH(calon_siswa.kd_unik_siswa) as lengthid, m_jurusan.jurusan, 
				m_jurusan.program_studi, m_spektrum.singkatan FROM calon_siswa 
				LEFT JOIN m_jurusan ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
				LEFT JOIN m_spektrum ON m_jurusan.kd_spektrum = m_spektrum.kd_spektrum
				WHERE m_spektrum.kd_spektrum='$kd_spektrum'
				ORDER BY calon_siswa.tanggal_buat DESC
                LIMIT 1";
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
	$kd_unik = $_POST[kd_unik];
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
											 tanggal_buat='$tgl_daftar',
											 tanggal_ubah='$tanggal',
											 kd_pegawai='$kd_pegawai',
											 kd_voucher='$_POST[kd_voucher]',
											 kd_diskon='$_POST[kd_diskon]'
											 where kd_siswa ='$kd_siswa'");	

	}else{
		
		$query_Edit = "SELECT * FROM calon_siswa where kd_siswa ='$kd_siswa'";
		$hasil_Edit = mysqli_query($conn,$query_Edit);
		$data_Edit = @mysqli_fetch_array($hasil_Edit);
		mysqli_query($conn,"INSERT INTO log_calonsiswa SET kd_unik_siswa ='$data_Edit[kd_unik_siswa]',
											 kd_siswa ='$data_Edit[kd_siswa]',
											 nisn ='$data_Edit[nisn]',
											 nama ='$data_Edit[nama]', 
											 jenis_kelamin='$data_Edit[jenis_kelamin]',
											 tempat='$data_Edit[tempat]',
											 tanggal_lahir='$data_Edit[tanggal_lahir]',
											 nama_orangtua='$data_Edit[nama_orangtua]',
											 alamat='$data_Edit[alamat]',
											 telp='$data_Edit[telp]',
											 keterangan='$data_Edit[keterangan]',
											 kd_sekolah='$data_Edit[kd_sekolah]',
											 kd_jurusan='$data_Edit[kd_jurusan]',
											 tanggal_buat='$tanggal',
											 tanggal_ubah='$tanggal',
											 kd_pegawai='$data_Edit[kd_pegawai]',
											 kd_voucher='$data_Edit[kd_voucher]',
											 kd_diskon='$data_Edit[kd_diskon]'");
											 

		mysqli_query($conn,"UPDATE calon_siswa SET kd_unik_siswa ='$kd_unik',
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
											 tanggal_buat='$tgl_daftar',
											 tanggal_ubah='$tanggal',
											 kd_pegawai='$kd_pegawai',
											 kd_voucher='$_POST[kd_voucher]',
											 kd_diskon='$_POST[kd_diskon]'
											 where kd_siswa ='$kd_siswa'");	

	}
	
	
	//echo $query_coba;
	
	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
	
}elseif($_GET['aksi'] == 'hapus'){
  //SCRIPT UNTUK HAPUS DATA
  $module = $_GET['module'];  
  $kd_siswa = $_GET['id'];
  $query=mysqli_query($conn,"UPDATE calon_siswa set status='N' WHERE kd_siswa='$kd_siswa'");
  echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";
}
?>