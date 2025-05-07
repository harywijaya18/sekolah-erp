<?php
include 'config/conn.php';
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Form Tambah Jurusan</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
													
                                                    <form action="?module=<?php echo $_GET['module'];?>&aksi=simpan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="jurusan" id="namajurusan" type="text" class="form-control" placeholder="Nama Jurusan" required>
                                                                </div>
																<div class="form-group">
                                                                    <input name="singkatan" id="singkatanjurusan" type="text" class="form-control" placeholder="Singkatan Jurusan" required>
                                                                </div>
																<div class="form-group">
                                                                    <select name="kd_spektrum" id="kdspektrum" class="form-control">
																		<option value="none" selected="" disabled="">Pilih Spektrum Jurusan</option>
																		<?php
																		$query  = mysqli_query($conn,"SELECT * FROM m_spektrum ORDER BY spektrum ASC");
																		while($r=mysqli_fetch_array($query)){
																		  echo "<option value=\"$r[kd_spektrum]\">$r[spektrum]</option>";
																		}
																		?>
																	</select>
                                                                </div>
																<div class="form-group">
                                                                    <select name="program_studi" id="programstudi" class="form-control">
																		<option value="none" selected="" disabled="">Pilih Program Studi</option>
																		<option value="3">Program Studi 3 Tahun</option>
																		<option value="4">Program Studi 4 Tahun</option>
																	</select>
                                                                </div>
																<div class="form-group">
                                                                    <input name="udp" id="udp_jurusan" type="text" class="form-control" placeholder="Biaya UDP" required>
                                                                </div>
																<div class="form-group">
                                                                    <input name="target" id="target_jurusan" type="text" class="form-control" placeholder="Target Siswa" required>
                                                                </div>
																<div class="form-group">
                                                                    <select name="kd_tahun" id="kdtahun" class="form-control">
																		<option value="none" selected="" disabled="">Pilih Tahun Ajaran</option>
																		<?php
																		$query  = mysqli_query($conn,"SELECT * FROM m_tahun WHERE status='on' ORDER BY tahun ASC");
																		while($r=mysqli_fetch_array($query)){
																		  echo "<option value=\"$r[kd_tahun]\">$r[tahun]</option>";
																		}
																		?>
																	</select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label>* Contoh : Akuntansi</label>
                                                                </div>
																</br>
																<div class="form-group">
                                                                    <label>* Contoh : AKT</label>
                                                                </div>
																</br>
																</br>
																<div class="form-group">
                                                                    <label>*</label>
                                                                </div>
																</br>
																<div class="form-group">
                                                                    <label>*</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
																	<button type="button" class="btn btn-primary waves-effect waves-light" onclick=self.history.back()>Batal</button>
                                                                    <button id="btnAdd" type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
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