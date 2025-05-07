<?php
// Turn off all error reporting
error_reporting(0);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

include '../../config/conn.php';
//include $url_server.'/sekolah/config/conn.php';
//include 'lib/random.php';

//$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link = "http://" . $_SERVER['SERVER_NAME'];

if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $sql = mysqli_query($conn, "SELECT * from m_voucher where kd_voucher='$id'");
    while ($row = mysqli_fetch_array($sql)){       
?>

<!-- Modal -->
			
              <form role="form" method="POST" action="?module=voucher&aksi=edit&id=<?php echo $row['kd_voucher'];?>">
			  		
					  <div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama Voucher</label>
						<div class="col-sm-8">
							<div class="form-group data-custon-pick data-custom-mg" id="data_5">
								<div class="input-daterange" id="datepicker">
									<input type="hidden" class="form-control" value="<?php echo $row['kd_voucher'];?>" name="kd_voucher">
									<input type="text" class="form-control" value="<?php echo $row['voucher'];?>" name="voucher">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
                    </div>
				  <div class="form-group row">
					<label class="col-sm-4 col-form-label">Nominal Voucher</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" value="<?php echo $row['nominal_voucher'];?>" name="nominal_voucher">
                    </div>
                  </div>
                  <div class="form-group row">
					<label class="col-sm-4 col-form-label">Stok Voucher</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" value="<?php echo $row['stok_voucher'];?>" name="stok_voucher">
                    </div>
                  </div>
				  <div class="form-group row">
					<label class="col-sm-8 col-form-label">Jangka Waktu Voucher</label>
						<div class="input-daterange input-group" id="datepicker">
							<input type="text" class="form-control" name="startdate" value="<?php echo $row['tanggal_awal'];?>" placeholder="Start Date" required autocomplete="off"/>
							<span class="input-group-addon">s/d</span>
							<input type="text" class="form-control" name="enddate" value="<?php echo $row['tanggal_akhir'];?>" placeholder="End Date" required autocomplete="off"/>
						</div>
				  </div>
				  
				  <div class="form-group row">
				  		<div class="form-group data-custon-pick data-custom-mg">
							<label>Jurusan</label> </br>
								<?php
									$jurusan = explode(",",$row['keterangan']) ;
									$jumlahJurusan = count($jurusan);
									$x=0; 
									while($x <= $jumlahJurusan){ 
										
									$namaJurusan = trim($jurusan[$x]); 
									$jumTrim = strlen($namaJurusan);		
									$x++;	
								?>

								
								<?php 
								if($namaJurusan == "AKT")
								{ 
									$checkedAKT ="checked";
								}
								if($namaJurusan == "APK")
								{ 
									$checkedAPK ="checked";
								}
								if($namaJurusan == "PMS")
								{ 
									$checkedPMS ="checked";
								}
								if($namaJurusan == "PBS")
								{ 
									$checkedPBS ="checked";
								}
								if($namaJurusan == "APH")
								{ 
									$checkedAPH ="checked";
								}
								if($namaJurusan == "JB")
								{ 
									$checkedJB ="checked";
								}
								if($namaJurusan == "UPW")
								{ 
									$checkedUPW ="checked";
								}
								if($namaJurusan == "BB")
								{ 
									$checkedBB ="checked";
								}
								if($namaJurusan == "KCK")
								{ 
									$checkedKCK ="checked";
								}
								if($namaJurusan == "MLOG")
								{ 
									$checkedMLOG ="checked";
								}
								if($namaJurusan == "HR")
								{ 
									$checkedHR ="checked";
								}
								?>

								<?php	

								}
								?>
								<label><input type="checkbox" name="AKT" value="AKT" <?php echo $checkedAKT; ?>> AKT </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="APK" value="APK" <?php echo $checkedAPK; ?>> APK </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="PMS" value="PMS" <?php echo $checkedPMS; ?>> PMS </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="PBS" value="PBS" <?php echo $checkedPBS; ?>> PBS </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="APH" value="APH" <?php echo $checkedAPH; ?>> APH </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="JB" value="JB" <?php echo $checkedJB; ?>> JB </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="UPW" value="UPW" <?php echo $checkedUPW; ?>> UPW </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="BB" value="BB" <?php echo $checkedBB; ?>> BB </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="KCK" value="KCK" <?php echo $checkedKCK; ?>> KCK </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="MLOG" value="MLOG" <?php echo $checkedMLOG; ?>> MLOG </label>&nbsp;&nbsp;
								<label><input type="checkbox" name="HR" value="HR" <?php echo $checkedHR; ?>> HR </label>&nbsp;&nbsp;
						</div>
				   </div>
                  <div class="modal-footer">
                  <button class="btn btn-danger pull-left" data-dismiss="modal">Batal</a></button>
                  <button type="submit" class="btn btn-primary pull-right">Simpan</a></button>
                  </div>            
            </form>
        <?php } }
?>