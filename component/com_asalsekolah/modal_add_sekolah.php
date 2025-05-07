<?php
include '/../../config/conn.php';
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Form Tambah Asal Sekolah (SMP)</a></li>
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
                                                                    <input name="nama_sekolah" id="namasekolah" type="text" class="form-control" placeholder="Nama Sekolah" required autocomplete="off">
                                                                </div>
																<div class="form-group">
                                                                    <input name="npsn_sekolah" id="npsnsekolah" type="text" class="form-control" placeholder="NPSN Sekolah" onkeypress="return hanyaAngka(event)" autocomplete="off">
                                                                </div>
																<div class="form-group">
                                                                    <input name="singkatan" id="singkatansekolah" type="text" class="form-control" placeholder="Singkatan Sekolah" autocomplete="off">
                                                                </div>
																<div class="form-group">
                                                                    <input name="alamat_sekolah" id="alamatsekolah" type="text" class="form-control" placeholder="Alamat Sekolah" autocomplete="off">
                                                                </div>
																<!--
																<div class="form-group">
                                                                    <select name="status" id="statussekolah" class="form-control" required>
																		<option value="none" selected="" disabled="">Pilih Status</option>
																		<option value="on">Aktif</option>
																		<option value="off">Nonaktif</option>
																	</select>
                                                                </div>
																-->
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>