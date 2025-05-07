<?php
error_reporting(E_ALL);

include 'config/conn.php';
include 'lib/random.php';
include 'lib/excel_reader2.php';

//SCRIPT UNTUK MENYIMPAN DATA
	
	$module = $_GET['module'];
	// upload file xls
	$target = basename($_FILES['fileupload']['name']) ;
	move_uploaded_file($_FILES['fileupload']['tmp_name'], $target);

	// beri permisi agar file xls dapat di baca
	chmod($_FILES['fileupload']['name'],0777);

	// mengambil isi file xls
	$data = new Spreadsheet_Excel_Reader($_FILES['fileupload']['name'],false);
	// menghitung jumlah baris data yang ada
	$jumlah_baris = $data->rowcount($sheet_index=0);

	// jumlah default data yang berhasil di import
	$berhasil = 0;
	for ($i=2; $i<=$jumlah_baris; $i++){

		// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
		$kddaftar     = $data->val($i, 1);
		$jurusan   = $data->val($i, 2);
		$tgldaftar  = $data->val($i, 3);
		$nama  = $data->val($i, 4);
		$jk  = $data->val($i, 5);
		$sekolah  = $data->val($i, 6);
		$kelas  = addslashes($data->val($i, =7));
		$tempatlahir  = $data->val($i, 8);
		$tgllahir  = $data->val($i, 9);
		$namaortu  = $data->val($i, 10);
		$alamatortu  = $data->val($i, 11);
		$tlp  = $data->val($i, 12);
		$ukuranbaju  = $data->val($i, 13);
		$tglbayar1  = $data->val($i, 14);
		$nominalbayar1 = $data->val($i, 15);
		$tglbayar2  = $data->val($i, 16);
		$nominalbayar2 = $data->val($i, 17);
		$tglbayar3  = $data->val($i, 18);
		$nominalbayar3 = $data->val($i, 19);
		$tglbayar4  = $data->val($i, 20);
		$nominalbayar4 = $data->val($i, 21);
		$tglbayar5  = $data->val($i, 22);
		$nominalbayar5 = $data->val($i, 23);
		
		$tanggal = date("Y-m-d G:i:s");
		$tgl_daftar = date('Y-m-d', strtotime($tgldaftar));
		
		//GENERATE KODE SISWA SECARA RANDOM SALT
		$kd_siswa   = md5($nama);
		$randomkata = random_string(0);
		$kd_siswa_r = $kd_siswa.$randomkata;
		
		if($kddaftar != "" && $jurusan != "" && $tgldaftar != "" && $nama != ""){
			// input data ke database (table data_pegawai)
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
													 '$kddaftar',
													 ' ',
													 '$nama',
													 '$jk',
													 '$tempatlahir',
													 '$tgllahir',
													 '$namaortu',
													 '$alamatortu',
													 '$tlp',
													 '$sekolah',
													 '$kelas',
													 '$jurusan',
													 '$tgl_daftar',
													 '$kd_pegawai',
													 ' ',
													 ' ',
													 'Y')");
			$berhasil++;            
		}else{
			echo "Data belum lengkap";
		}
	}
	
	echo $berhasil;

	echo "<script language='javascript'>document.location='?module=".$module."&aksi';</script>";

?>