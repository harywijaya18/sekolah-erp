<div id="ModalAdd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Form Tambah Voucher</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
									<form action="?module=<?php echo $_GET['module'];?>&aksi=simpan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                    <div class="modal-body">            
                                            <div class="form-group data-custon-pick data-custom-mg">
												<label>Nama Voucher</label>
												<input name="voucher" id="voucher" type="text" class="form-control" placeholder="Nama Voucher" required autocomplete="off">
                                            </div>
											<div class="form-group data-custon-pick data-custom-mg">
												<label>Nominal Voucher</label>
												<input name="nominal" id="nominal" type="text" class="form-control" placeholder="Nominal Voucher" required autocomplete="off">
                                            </div>
                                            <div class="form-group data-custon-pick data-custom-mg">
												<label>Jumlah Stok Voucher</label>
												<input name="stok" id="stok" type="text" class="form-control" placeholder="Jumlah Stok Voucher" required autocomplete="off">
                                            </div>
											<div class="form-group data-custon-pick data-custom-mg" id="data_5">
												<label>Jangka Waktu Voucher</label>
												<div class="input-daterange input-group" id="datepicker">
													<input type="text" class="form-control" name="startdate" value="" placeholder="Start Date" required autocomplete="off"/>
													<span class="input-group-addon">s/d</span>
													<input type="text" class="form-control" name="enddate" value="" placeholder="End Date" required autocomplete="off"/>
												</div>
											</div>
											<!--<div class="form-group data-custon-pick data-custom-mg">
												<label>Keterangan</label>
												<input name="ket" id="ket" type="text" class="form-control" placeholder="Keterangan" autocomplete="off">
                                            </div>-->
											<div class="form-group data-custon-pick data-custom-mg">
												<label>Jurusan</label> </br>
												<label><input type="checkbox" name="AKT" value="AKT"> AKT </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="APK" value="APK"> APK </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="PMS" value="PMS"> PMS </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="PBS" value="PBS"> PBS </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="APH" value="APH"> APH </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="JB" value="JB"> JB </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="UPW" value="UPW"> UPW </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="BB" value="BB"> BB </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="KCK" value="KCK"> KCK </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="MLOG" value="MLOG"> MLOG </label>&nbsp;&nbsp;
												<label><input type="checkbox" name="HR" value="HR"> HR </label>&nbsp;&nbsp;
                                            </div>
                                    </div>
                                    <div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Batal</button>
										<button type="submit" class="btn btn-primary"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Simpan</button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>					