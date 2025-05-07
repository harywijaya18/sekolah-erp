<?php
	include 'config/conn.php';
	$kd_siswa =$_GET['id'];
	$query  = mysqli_query($conn,"SELECT * FROM calon_siswa WHERE kd_siswa = '$kd_siswa'");
	$data=mysqli_fetch_array($query);
	$tgl_daftar = date('m/d/Y', strtotime($data['tanggal_buat']));
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Form Edit Calon Siswa</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
													
                                                    <form action="?module=<?php echo $_GET['module'];?>&aksi=edit" method="POST">
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Tanggal Daftar</label>
																	</div>
																</div>
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="form-group data-custon-pick data-custom-mg" id="data_5">
																		<div class="input-daterange" id="datepicker">
																			<input type="text" class="form-control" name="tanggaldaftar" placeholder="Tanggal Daftar" value="<?php echo $tgl_daftar;?>" required autocomplete="off"/>
																		</div>
																		<span class="help-block"></span>
																	</div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Kode Unik Pendaftaran</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="kd_unik" id="kd_unik" type="text" value="<?php echo $data['kd_unik_siswa'];?>" class="form-control" required autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Nomor Induk Siswa Nasional (NISN)</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="nisn" id="nisn" type="text" value="<?php echo $data['nisn'];?>" class="form-control" placeholder="Nomor Induk Siswa Nasional" autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
														</div>
                                                        <div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Nama Lengkap</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input type="hidden"  class="form-control" name="kd_siswa" value="<?php echo $data['kd_siswa'];?>"  />
																		<input name="nama" id="namalengkap" type="text" value="<?php echo $data['nama'];?>" class="form-control" placeholder="Nama Lengkap (Sesuai Ijasah)" required autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Jenis Kelamin</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                    <select name="jenis_kelamin" id="jeniskelamin" class="form-control" required>
																		<option value="none" selected="" disabled="">Pilih Jenis Kelamin</option>
																		<?php if($data['jenis_kelamin']=='P'){ ?>
																		<option value="<?php echo $data['jenis_kelamin'];?>" selected> Perempuan </option>
																		<option value="L">Laki-Laki</option>
																		<?php }else{ ?>
																		<option value="P"> Perempuan </option>
																		<option value="<?php echo $data['jenis_kelamin'];?>" selected> Laki-Laki </option>
																		<?php } ?>
																	</select>
																	<span class="help-block"></span>
                                                                </div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Asal Sekolah</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	
																		<select required name="kd_sekolah" id="kdsekolah" class="chosen-select" tabindex="-1">
																				<option value="">Pilih Asal Sekolah</option>
																				<?php
																				$query  = mysqli_query($conn,"SELECT * FROM m_sekolah WHERE status='on' ORDER BY nama_sekolah ASC");
																				while($r=mysqli_fetch_array($query)){
																				  if($data['kd_sekolah']==$r['kd_sekolah']){
																					echo "<option value=\"$r[kd_sekolah]\" selected>$r[nama_sekolah]</option>";
																				  }else{
																					echo "<option value=\"$r[kd_sekolah]\">$r[nama_sekolah]</option>";
																				  }
																				}
																				?>
																		</select>
																		<span class="help-block"></span>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Tempat Lahir</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="tempat_lahir" id="tempatlahir" type="text" value="<?php echo $data['tempat'];?>" class="form-control" placeholder="Contoh : Bogor" required autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Tanggal Lahir</label>
																	</div>
																</div>
																<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="tanggal_lahir" id="tanggallahir" type="text" value="<?php echo date('d-m-Y', strtotime($data['tanggal_lahir']));?>" class="form-control" data-mask="99-99-9999" placeholder="dd-mm-yyyy" autocomplete="off" required>
																		<!--<span class="help-block">dd/mm/yyyy</span>-->
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Nama Orang Tua</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="nama_ortu" id="namaortu" type="text" value="<?php echo $data['nama_orangtua'];?>" class="form-control" placeholder="Orang Tua / Wali Calon Murid" required autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Alamat</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="alamat" id="alamat" type="text" value="<?php echo $data['alamat'];?>" class="form-control" placeholder="Alamat Calon Murid / Orang Tua Wali Calon Murid " required autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Nomor Telp / Hp</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="telp" id="telp" type="text" value="<?php echo $data['telp'];?>" class="form-control" placeholder="Nomor Telp / Hp" autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Jurusan yg dipilih</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	
																		<select name="kd_jurusan" id="kdjurusan" data-placeholder="Pilih Jurusan..." class="chosen-select" tabindex="-1" required>
																				<option value="">Pilih Jurusan</option>
																				<?php
																				$query  = mysqli_query($conn,"SELECT * FROM m_jurusan ORDER BY jurusan ASC");
																				while($r=mysqli_fetch_array($query)){
																				  if($data['kd_jurusan']==$r['kd_jurusan']){
																					echo "<option value=\"$r[kd_jurusan]\" selected>$r[jurusan]</option>";
																				  }else{
																					echo "<option value=\"$r[kd_jurusan]\">$r[jurusan]</option>";
																				  }
																					
																				}
																				?>
																		</select>
																		<span class="help-block"></span>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Promo Diskon</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	
																		<select name="kd_diskon" id="kddiskon" data-placeholder="Pilih Promo Diskon..." class="chosen-select" tabindex="-1">
																				<option value="">Pilih Promo Diskon</option>
																				<?php
																				$query  = mysqli_query($conn,"SELECT * FROM m_diskon ORDER BY nama_diskon ASC");
																				while($r=mysqli_fetch_array($query)){
																				  if($data['kd_diskon']==$r['kd_diskon']){
																					echo "<option value=\"$r[kd_diskon]\" selected>$r[nama_diskon]</option>";
																				  }else{
																					 echo "<option value=\"$r[kd_diskon]\">$r[nama_diskon]</option>";
																				  }
																				}
																				?>
																		</select>
																		<span class="help-block"></span>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Voucher</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	
																		<select name="kd_voucher" id="kdvoucher" data-placeholder="Pilih Voucher..." class="chosen-select" tabindex="-1">
																				<option value="">Pilih Voucher</option>
																				<?php
																				$query  = mysqli_query($conn,"SELECT * FROM m_voucher where stok_voucher > 0 ORDER BY voucher ASC");
																				while($r=mysqli_fetch_array($query)){
																					if($data['kd_voucher']==$r['kd_voucher']){
																						echo "<option value=\"$r[kd_voucher]\" selected>$r[voucher] - (Rp.$r[nominal_voucher]) - $r[keterangan]</option>";
																					}else{
																						echo "<option value=\"$r[kd_voucher]\">$r[voucher] - (Rp.$r[nominal_voucher]) - $r[keterangan]</option>";
																					}
																				}
																				?>
																		</select>
																		<span class="help-block"></span>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Keterangan</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="keterangan" id="keterangan" type="text" value="<?php echo $data['keterangan'];?>" class="form-control" placeholder="Keterangan" autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														</br>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
																	<button type="button" class="btn btn-primary waves-effect waves-light" onclick=self.history.back()>Batal</button>
                                                                    <button id="btnAdd" type="submit" class="btn btn-primary waves-effect waves-light">Perbaharui</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 </div>
 
<!-- JQUERY UNTUK SIMPAN DATA -->
<script src="js/jquery/dist/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			$('#btnAdd').click(function(){
				var tipe = "simpan";
				var textTapel = $("#tahunajaran").val();
				var textStatus = $("#statustapel").val();
				console.log(text);
				$.get("action_tapel.php", {tipeaksi: tipe, tapel: textTapel, status: textStatus}) // request get -> menentukan nama url -> data yang dikirimkan
				.done(function(action_tapel){
					alert('Data Tahun Ajaran Berhasil Disimpan');
					
					var origin   = window.location.origin;   // Returns base URL (https://example.com)
					location.href = origin +'/sekolah/index.php?module=tapel_all&aksi=';
					
					//location.reload();
					//location.href = 'http://localhost/BAK/bankmini/index.php?module=cetak-rekening';

				});
				
                
			})
 
		})
</script>