<?php
	include 'config/conn.php';
	$kd_sekolah =$_GET['id'];
	$query  = mysqli_query($conn,"SELECT * FROM m_sekolah WHERE kd_sekolah = '$kd_sekolah'");
	$data=mysqli_fetch_array($query);
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Form Edit Asal Sekolah (SMP)</a></li>
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
                                                                    <input type="hidden"  class="form-control" name="kd_sekolah" id="kdsekolah" value="<?php echo $data['kd_sekolah'];?>"  />
																	<input name="nama_sekolah" id="namasekolah" type="text" class="form-control" placeholder="Nama Sekolah" value="<?php echo $data['nama_sekolah'];?>" required autocomplete="off">
                                                                </div>
																<div class="form-group">
                                                                    <input name="npsn_sekolah" id="npsnsekolah" type="text" class="form-control" placeholder="NPSN Sekolah" value="<?php echo $data['npsn'];?>" onkeypress="return hanyaAngka(event)" autocomplete="off">
                                                                </div>
																<div class="form-group">
                                                                    <input name="singkatan" id="singkatansekolah" type="text" class="form-control" placeholder="Singkatan Sekolah" value="<?php echo $data['singkatan'];?>" autocomplete="off">
                                                                </div>
																<div class="form-group">
                                                                    <input name="alamat_sekolah" id="alamatsekolah" type="text" class="form-control" placeholder="Alamat Sekolah" value="<?php echo $data['alamat_sekolah'];?>" autocomplete="off">
                                                                </div>
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
 
<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>