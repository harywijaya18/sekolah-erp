<?php
	include 'config/conn.php';
	$kd_pegawai =$_GET['id'];
	$query  = mysqli_query($conn,"SELECT * FROM m_pegawai WHERE kd_pegawai = '$kd_pegawai'");
	$data=mysqli_fetch_array($query);
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Form Tambah Pegawai</a></li>
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
																	<input type="hidden"  class="form-control" name="kd_pegawai" value="<?php echo $data['kd_pegawai'];?>"  />
																	<label>Nama Pegawai</label>
                                                                    <input name="nama_pegawai" id="namapegawai" type="text" class="form-control" placeholder="Nama Pegawai" value="<?php echo $data['nama'];?>" required>
                                                                </div>
																<div class="form-group">
																	<label>Username </label>
                                                                    <input name="username" id="username_" type="text" class="form-control" placeholder="Username" value="<?php echo $data['username'];?>" required>
                                                                </div>
																<div class="form-group">
																<label>Ganti Password </label>
                                                                    <input name="password" id="password" type="text" class="form-control" placeholder="Password Baru" value="">
                                                                </div>
																
																<div class="form-group">
																<label>Level </label>
                                                                    <select name="level" id="level" class="form-control">
																		<option value="none" disabled="">Pilih Level Akses Pegawai</option>
																		<?php if($data['level']=='struktural'){ ?>
																			<option value="<?php echo $data['level'];?>" selected>Struktural</option>
																			<option value="admin_psb">Admin PSB</option>
																			<option value="panitia_psb">Panitia PSB</option>
																			<option value="it">IT</option>
																			<option value="guru">Guru</option>
																		<?php }elseif($data['level']=='admin_psb'){ ?>
																			<option value="struktural">Struktural</option>
																			<option value="<?php echo $data['level'];?>" selected>Admin PSB</option>
																			<option value="panitia_psb">Panitia PSB</option>
																			<option value="it">IT</option>
																			<option value="guru">Guru</option>
																		<?php }elseif($data['level']=='panitia_psb'){ ?>
																			<option value="struktural">Struktural</option>
																			<option value="admin_psb" >Admin PSB</option>
																			<option value="<?php echo $data['level'];?>" selected>Panitia PSB</option>
																			<option value="it">IT</option>
																			<option value="guru">Guru</option>
																		<?php }elseif($data['level']=='it'){ ?>
																			<option value="struktural">Struktural</option>
																			<option value="admin_psb" >Admin PSB</option>
																			<option value="panitia_psb">Panitia PSB</option>
																			<option value="<?php echo $data['level'];?>" selected>IT</option>
																			<option value="guru">Guru</option>
																		<?php }else{ ?>
																			<option value="struktural">Struktural</option>
																			<option value="admin_psb" >Admin PSB</option>
																			<option value="panitia_psb">Panitia PSB</option>
																			<option value="it" >IT</option>
																			<option value="<?php echo $data['level'];?>" selected>Guru</option>
																		<?php } ?>
																	</select>
                                                                </div>
																
																<div class="form-group">
																<label>Status </label>
                                                                    <select name="status" id="status_" class="form-control">
																		<option value="none" disabled="">Pilih Status Pegawai</option>
																		<?php if($data['status']=='Y'){ ?>
																		<option value="<?php echo $data['status'];?>" selected>Aktif</option>
																		<option value="N">Nonaktif</option>
																		<?php }else{ ?>
																		<option value="Y">Aktif</option>
																		<option value="<?php echo $data['status'];?>" selected>Nonaktif</option>
																		<?php } ?>
																	</select>
                                                                </div>
																
																<!--
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
																-->
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
																	<button type="button" class="btn btn-primary waves-effect waves-light" onclick=self.history.back()><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Batal </button>
                                                                    <button id="btnAdd" type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Simpan </button>
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