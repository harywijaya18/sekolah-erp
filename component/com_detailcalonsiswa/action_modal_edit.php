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
    $sql = mysqli_query($conn, "SELECT * from transaksi_psb where no_bayar='$id'");
    while ($row = mysqli_fetch_array($sql)){       
?>

<!-- Modal -->
			
              <form role="form" method="POST" action="?module=det_csiswa&aksi=edit&id=<?php echo $row['kd_siswa'];?>">
			  		<div class="form-group row">
						<label class="col-sm-4 col-form-label">Tanggal Bayar</label>
						<div class="col-sm-8">
							<div class="form-group data-custon-pick data-custom-mg" id="data_5">
								<div class="input-daterange" id="datepicker">
									<input type="text" class="form-control" name="tanggalbayar" placeholder="Tanggal Bayar" value="<?php echo date("d-m-Y", strtotime($row['tanggal_buat']));?>" required autocomplete="off" disabled/>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
                    </div>
				  <div class="form-group row">
					<label class="col-sm-4 col-form-label">Nomor Bayar</label>
					<div class="col-sm-8">
						<input type="hidden" class="form-control" value="<?php echo $row['kd_siswa'];?>" name="kd_siswa" id="kdsiswa">
						<input type="hidden" class="form-control" value="<?php echo $row['no_bayar'];?>" name="no_bayar" id="nobayar">
						<input type="text" class="form-control" value="<?php echo $row['no_bayar'];?>" name="display_bayar" id="displaybayar" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
					<label class="col-sm-4 col-form-label">Jumlah Bayar</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" value="<?php echo $row['jumlah_bayar'];?>" name="jumlah_bayar">
                    </div>
                  </div>
                  <div class="modal-footer">
                  <button class="btn btn-danger pull-left" data-dismiss="modal">Batal</a></button>
                  <button type="submit" class="btn btn-primary pull-right">Simpan</a></button>
                  </div>            
            </form>
        <?php } }
?>