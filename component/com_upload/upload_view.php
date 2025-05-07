<?php
//error_reporting(0);

include 'config/conn.php';
include 'lib/random.php';

//if($_GET['aksi']=='') {
?>

<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Upload <span class="table-project-n">Calon Siswa</span></h1>
									<form method="post" enctype="multipart/form-data" >
										<div style="display: flex;">
											<div><input name="filemhsw" type="file" required="required"></div>
											<div><input name="upload" type="submit" value="Import"></div>
										</div>
									</form>
									<?php
									if (isset($_POST['upload'])) {
										// MENGECEK TAHUN AJARAN PPDB YANG AKTIF
										$qTahun = "SELECT * FROM m_tahun WHERE status = 'Y'";
										$eTahun = mysqli_query($conn, $qTahun);
										$dTahun = @mysqli_fetch_array($eTahun);
										$kd_tahun = $dTahun['kd_tahun'];
										
										$berhasil = 0;
										/////////////////////////////////////////////////////////////////////
										require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
										require('spreadsheet-reader-master/SpreadsheetReader.php');
										
										
										$destination_path = getcwd().DIRECTORY_SEPARATOR;
										$target_path = $destination_path . 'component/com_upload/uploads/'. basename( $_FILES["filemhsw"]["name"]);
										move_uploaded_file($_FILES['filemhsw']['tmp_name'], $target_path);
										//upload data excel kedalam folder uploads
										//$target_dir = "uploads/".basename($_FILES['filemhsw']['name']);
										
										//move_uploaded_file($_FILES['filemhsw']['tmp_name'],$target_dir);

										$Reader = new SpreadsheetReader($target_path);
										
										$tanggal = date("Y-m-d G:i:s");
										$kd_pegawai = $_SESSION['kdpegawai'];
										$Rows=null;
										
																			
										foreach ($Reader as $Key => $Row)
										{
											// import data excel mulai baris ke-2 (karena ada header pada baris 1)
											if ($Key < 1) continue;	
											
											
											$urut = $Row[0];
											$sktjur = $Row[1];
											$kd_unik =  $sktjur.$urut;
											
											$kd_siswa   = md5($kd_unik);
											$randomkata = random_string(0);
											$kd_siswa_r = $kd_siswa.$randomkata;
											
											$tgldaftar = $Row[2];
											$tgl_daftar = date('Y-m-d', strtotime($tgldaftar));
											$nama =  addslashes($Row[3]);
											$jk = $Row[4];
											$smp = addslashes($Row[5]);
											$kelas = $Row[6];
											$tmplahir = $Row[7];
											$tgllahir = $Row[8];
											$tgl_lahir = date('Y-m-d', strtotime($tgllahir));
											$ortu = $Row[9];
											$alamat = $Row[10];
											$telp = $Row[11];
											$tglbayar1  = $Row[11];
											$nominalbayar1 = $Row[12];
											$tglbayar2  = $Row[13];
											$nominalbayar2 = $Row[14];
											$tglbayar3  = $Row[15];
											$nominalbayar3 = $Row[16];
											$tglbayar4  = $Row[17];
											$nominalbayar4 = $Row[18];
											$tglbayar5  = $Row[19];
											$nominalbayar5 = $Row[20];
											
											//CEK ISIAN DATA
											if($nama != "" && $sktjur != "" && $urut != ""){
											
												//CEK DATABASE DATA SEKOLAH SMP
												$querySmp = mysqli_query($conn, "select * from m_sekolah where nama_sekolah like '%$smp%' limit 1");
												$dataSmp = mysqli_fetch_array($querySmp);
												$cekSmp = mysqli_num_rows($querySmp);
												if($cekSmp < 1){
													$kdsekolah = md5($smp);
													$randomsekolah = random_string(0);
													$kd_sekolah = $kdsekolah.$randomsekolah;
													$tamSmp = mysqli_query($conn, "insert into m_sekolah(kd_sekolah, nama_sekolah, tanggal_buat, status, kd_pegawai)
																				  VALUES ('$kd_sekolah','$smp', '$tanggal', 'on', '$kd_pegawai')");
																				  
												}else{
													$kd_sekolah = $dataSmp['kd_sekolah'];
												}
												///////////////////////////////////////
												
												//CEK DATABASE DATA KELAS
												if($kelas == 0 || $kelas == '0' || $kelas == ''){
													$kelas = 9;
												}
												$queryKelas = mysqli_query($conn, "select * from m_kelas where kelas like '%$kelas%' limit 1");
												$dataKelas = mysqli_fetch_array($queryKelas);
												$cekKelas = mysqli_num_rows($queryKelas);
												if($cekKelas < 1){
													$kdkelas = md5($kelas);
													$randomkelas = random_string(0);
													$kd_kelas = $kdkelas.$randomkelas;
													$tamKelas = mysqli_query($conn, "insert into m_kelas(kd_kelas, kelas, tanggal_buat, status, kd_pegawai)
																				  VALUES ('$kd_kelas','$kelas', '$tanggal', 'Y', '$kd_pegawai')");
																				  
												}else{
													$kd_kelas = $dataKelas['kd_kelas'];
												}
												////////////////////////////////////////
												
												//CEK DATA JURUSAN
												$queryJur = mysqli_query($conn, "select * from m_jurusan where singkatan like '%$sktjur%' limit 1");
												$dataJur = mysqli_fetch_array($queryJur);
												$cekJur = mysqli_num_rows($queryJur);
												if($cekJur < 1){
													$kd_jurusan = "";
												}else{
													$kd_jurusan = $dataJur['kd_jurusan'];
												}
												////////////////////////////////////////
																				
												//CEK DATA VOUCHER
												$queryGel = "SELECT * FROM `m_voucher` WHERE tanggal_awal <= '$tgl_daftar' AND tanggal_akhir >= '$tgl_daftar'
															 AND keterangan LIKE '%$sktjur%'";
												$hasil_Gel = mysqli_query($conn,$queryGel);
												$data_gel = @mysqli_fetch_array($hasil_Gel);
												$kd_voucher = $data_gel['kd_voucher'];
												////////////////////////////////////////
												
												//CEK DATA DISCOUNT
												
												////////////////////////////////////////
												
												//MENAMBAHKAN DATA CALON SISWA KE DB
												$queryCalsis = mysqli_query($conn, "SELECT * FROM calon_siswa where kd_unik_siswa like '%$kd_unik%' limit 1");
												$dataCalsis = mysqli_fetch_array($queryCalsis);
												$cekCalsis = mysqli_num_rows($queryCalsis);
												//cek apakasih data calsis sudah ada atau belum
												if($cekCalsis < 1){
													$query=mysqli_query($conn, "INSERT INTO calon_siswa(kd_siswa, kd_unik_siswa, nama, jenis_kelamin,
																			tempat, tanggal_lahir, nama_orangtua, alamat, telp, kd_sekolah,
																			kd_kelas, kd_jurusan, kd_tahun, kd_voucher, tanggal_buat, kd_pegawai, status) 
																			VALUES ('$kd_siswa_r', '$kd_unik','$nama','$jk','$tmplahir','$tgl_lahir',
																			'$ortu','$alamat','$telp','$kd_sekolah','$kd_kelas', '$kd_jurusan', '$kd_tahun',
																			'$kd_voucher', '$tgl_daftar','$kd_pegawai','Y')");
													if ($query) {
														echo "<br><span style='color:green;'>data calsis no daftar : <b>".$kd_unik."</b> diupload</span> <i class='fa fa-check' style='color:green;'></i>";
													}else{
														echo mysqli_error($conn);
													}
												}else{
													echo "<br> <span style='color:#22bcf7;'> DUPLIKAT data calsis no daftar : <b>".$kd_unik."</b> </span> <i class='fa fa-refresh' style='color:#22bcf7;'></i>";
												}
												$berhasil++;
												
												//MENAMBAHKAN DATA PEMBAYARAN
												if($nominalbayar1 != "" || $nominalbayar1 != 0){
													
												}										
												////////////////////////////////////////////
												
											}else{
												if($kd_unik != ""){
													echo "<br> <span style='color:red;'> Gagal menyimpan : <b>".$kd_unik."</b> </span> <i class='fa fa-close' style='color:red;'></i>";
												}else{
													echo "<br> <span style='color:red;'> Gagal menyimpan : <b>Tidak ada Kode Daftar</b> </span> <i class='fa fa-close' style='color:red;'></i>";
												}
												
											}
										}
										if ($query) {
											echo "<br> Berhasil upload Total : ".$berhasil." data calon siswa";
										}else{
											echo mysqli_error($conn);
										}
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		

