<div id="ModalAdd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Form Tambah Jadwal Promosi</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
									<form action="?module=<?php echo $_GET['module'];?>&aksi=simpan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                    <div class="modal-body">            
											<div class="form-group data-custon-pick data-custom-mg" id="data_5">
												<label>Tanggal Promosi</label>
												<div class="input-daterange" id="datepicker">
													<input type="text" class="form-control" name="tanggalpromo" placeholder="Tanggal Promosi" required autocomplete="off"/>
												</div>
											</div>
											<div class="form-group data-custon-pick data-custom-mg">
												<label>Keterangan</label>
												<input name="ket" id="ket" type="text" class="form-control" placeholder="Keterangan" autocomplete="off">
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