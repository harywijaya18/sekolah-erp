<?php
include 'config/conn.php';
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Form Tambah Calon Siswa</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
													
                                                    <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                                        <div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Tanggal Daftar</label>
																	</div>
																</div>
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="form-group data-custon-pick data-custom-mg" id="data_5">
																		<div class="input-daterange" id="datepicker">
																			<input type="text" class="form-control" name="tanggaldaftar" placeholder="Tanggal Daftar" value="<?php echo date("m/d/Y");?>" required autocomplete="off"/>
																		</div>
																		<span class="help-block"></span>
																	</div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Kode Daftar</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="kode_daftar" id="kodedaftar" type="text" class="form-control" placeholder="Kode Daftar" autocomplete="off"
																		required onkeydown="upperCaseF(this)">
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
																		<input name="nisn" id="nisn" type="text" class="form-control" placeholder="Nomor Induk Siswa Nasional" autocomplete="off">
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
																		<input name="nama" id="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap (Sesuai Ijasah)" required autocomplete="off"
																		onkeydown="upperCaseF(this)">
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
																		<option value="P">Perempuan</option>
																		<option value="L">Laki-Laki</option>
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
																				  echo "<option value=\"$r[kd_sekolah]\">$r[nama_sekolah]</option>";
																				}
																				?>
																		</select>
																		<span class="help-block"></span>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Asal Kelas</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	
																		<select required name="kd_kelas" id="kdkelas" class="chosen-select" tabindex="-1">
																				<option value="">Pilih Asal Kelas</option>
																				<?php
																				$query  = mysqli_query($conn,"SELECT * FROM m_kelas WHERE status='Y' ORDER BY kelas ASC");
																				while($r=mysqli_fetch_array($query)){
																				  echo "<option value=\"$r[kd_kelas]\">$r[kelas]</option>";
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
																		<input name="tempat_lahir" id="tempatlahir" type="text" class="form-control" placeholder="Contoh : Bogor" required autocomplete="off">
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
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="form-group data-custon-pick data-custom-mg" id="data_5">
																		<div class="input-daterange" id="datepicker">
																			<input name="tanggal_lahir" id="tanggallahir" type="text" class="form-control" data-mask="99-99-9999" value="<?php echo date("m/d/Y", strtotime('01-01-2006'));?>" autocomplete="off" required>
																			<!--<span class="help-block">dd/mm/yyyy</span>-->
																		</div>
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
																		<input name="nama_ortu" id="namaortu" type="text" class="form-control" placeholder="Orang Tua / Wali Calon Murid" required autocomplete="off">
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
																		<input name="alamat" id="alamat" type="text" class="form-control" placeholder="Alamat Calon Murid / Orang Tua Wali Calon Murid " required autocomplete="off">
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
																		<input name="telp" id="telp" type="text" class="form-control" placeholder="Nomor Telp / Hp" autocomplete="off">
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
																				  echo "<option value=\"$r[kd_jurusan]\">$r[jurusan]</option>";
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
																				  echo "<option value=\"$r[kd_diskon]\">$r[nama_diskon]</option>";
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
																				$dateNow = date("Y-m-d");
																				while($r=mysqli_fetch_array($query)){
																				  //if($r[tanggal_awal] <= $dateNow && $r[tanggal_akhir] >= $dateNow){
																					echo "<option value=\"$r[kd_voucher]\">$r[voucher] - (Rp.$r[nominal_voucher]) - $r[keterangan]</option>";
																				  //}
																				  
																				}
																				?>
																		</select>
																		<span class="help-block"></span>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Pembayaran UDP</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="pembayaran" id="pembayaran" type="text" class="form-control" placeholder="Pembayaran UDP" autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Tanggal Bayar</label>
																	</div>
																</div>
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="form-group data-custon-pick data-custom-mg" id="data_5">
																		<div class="input-daterange" id="datepicker">
																			<input type="text" class="form-control" name="tanggalbayar" placeholder="Tanggal Bayar" value="<?php echo date("m/d/Y");?>" required autocomplete="off"/>
																		</div>
																		<span class="help-block"></span>
																	</div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
																	<div class="input-mask-title">
																		<label>Keterangan Pembayaran</label>
																	</div>
																</div>
																<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
																	<div class="input-mark-inner mg-b-22">
																		<input name="keterangan" id="keterangan" type="text" class="form-control" placeholder="Keterangan Pembayaran" autocomplete="off">
																		<span class="help-block"></span>
																	</div>
																</div>
                                                        </div>
														</br>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
																	<button type="button" class="btn btn-primary waves-effect waves-light" onclick=self.history.back()>Batal</button>
                                                                    <button id="btnAdd" type="submit" class="btn btn-primary waves-effect waves-light" onclick="cek_data()">Simpan</button>
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
 
<!-- JQUERY UNTUK CEK KELENGKAPAN DATA -->
<script type="text/javascript">
function cek_data()
        {
			var jk = document.getElementById('jeniskelamin').value;
            var kode_sekolah = document.getElementById('kdsekolah').value;
			var kode_kelas = document.getElementById('kdkelas').value;
			var kode_jurusan = document.getElementById('kdjurusan').value;
			//var kode_diskon = document.getElementById('kddiskon').value;
			if(jk == ""){
                alert("Jenis Kelamin Harus dipilih!");
            }else if(kode_sekolah == ""){
                alert("Nama Sekolah Asal Harus dipilih!");
            }else if(kode_kelas == ""){
                alert("Asal Kelas Harus dipilih!");
            }else if(kode_jurusan ==""){
				alert("Jurusan Harus dipilih!");
			}
		}
function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
</script>