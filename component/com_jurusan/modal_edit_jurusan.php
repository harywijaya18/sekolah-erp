<?php
	include 'config/conn.php';
	$kd_jurusan =$_GET['id'];
	$query  = mysqli_query($conn,"SELECT * FROM m_jurusan WHERE kd_jurusan = '$kd_jurusan'");
	$data=mysqli_fetch_array($query);
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
													
                                                    <form action="?module=<?php echo $_GET['module'];?>&aksi=edit" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
																	<input type="hidden"  class="form-control" name="kd_jurusan" value="<?php echo $data['kd_jurusan'];?>"  />
																	<label>Nama Jurusan </label>
                                                                    <input name="jurusanedit" id="namajurusanedit" type="text" class="form-control" placeholder="Nama Jurusan" value="<?php echo $data['jurusan'];?>" required>
                                                                </div>
																<div class="form-group">
																	<label>Singkatan Nama Jurusan </label>
                                                                    <input name="singkatan" id="singkatanjurusan" type="text" class="form-control" placeholder="Singkatan Jurusan" value="<?php echo $data['singkatan'];?>" required>
                                                                </div>
																<div class="form-group">
																<label>Spektrum Jurusan </label>
                                                                    <select name="kd_spektrum" id="kdspektrum" class="form-control">
																		<option value="none" selected="" disabled="">Pilih Spektrum Jurusan</option>
																		<?php
																		$query  = mysqli_query($conn,"SELECT * FROM m_spektrum ORDER BY spektrum ASC");
																		while($r=mysqli_fetch_array($query)){
																		  if($data['kd_spektrum']==$r['kd_spektrum']){
																			echo "<option value=\"$r[kd_spektrum]\" selected>$r[spektrum]</option>";
																		  }else{
																			echo "<option value=\"$r[kd_spektrum]\">$r[spektrum]</option>";
																		  }
																		}
																		?>
																	</select>
                                                                </div>
																<div class="form-group">
																<label>Program Studi </label>
                                                                    <select name="program_studi" id="programstudi" class="form-control">
																		<option value="none" disabled="">Pilih Program Studi</option>
																		<?php if($data['program_studi']=='3'){ ?>
																		<option value="<?php echo $data['program_studi'];?>" selected>Program Studi <?php echo $data['program_studi'];?> Tahun</option>
																		<option value="4">Program Studi 4 Tahun</option>
																		<?php }else{ ?>
																		<option value="3">Program Studi 3 Tahun</option>
																		<option value="<?php echo $data['program_studi'];?>" selected>Program Studi <?php echo $data['program_studi'];?> Tahun</option>
																		<?php } ?>
																	</select>
                                                                </div>
																<div class="form-group">
																<label>Biaya UDP </label>
                                                                    <input name="udp" id="udp_jurusan" type="text" class="form-control" placeholder="Biaya UDP" value="<?php echo $data['udp'];?>" required>
                                                                </div>
																<div class="form-group">
																<label>Target Calon Siswa </label>
                                                                    <input name="target" id="target_jurusan" type="text" class="form-control" placeholder="Target Siswa" value="<?php echo $data['target_siswa'];?>" required>
                                                                </div>
																<div class="form-group">
																<label>Tahun Ajaran </label>
                                                                    <select name="kd_tahun" id="kdtahun" class="form-control">
																		<option value="none" selected="" disabled="">Pilih Tahun Ajaran</option>
																		<?php
																		$query  = mysqli_query($conn,"SELECT * FROM m_tahun WHERE status='on' ORDER BY tahun ASC");
																		while($r=mysqli_fetch_array($query)){
																		  if($data['kd_tahun']==$r['kd_tahun']){
																			echo "<option value=\"$r[kd_tahun]\" selected>$r[tahun]</option>";
																		  }else{
																			echo "<option value=\"$r[kd_tahun]\">$r[tahun]</option>";
																		  }
																		}
																		?>
																	</select>
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