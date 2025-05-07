<div id="ModalAdd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Form Tambah Tahun Pelajaran</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
									<form action="?module=<?php echo $_GET['module'];?>&aksi=simpan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                    <div class="modal-body">            
                                            <div class="form-group">
												<input name="tahun_ajaran" id="tahunajaran" type="text" class="form-control" placeholder="Tahun Ajaran" required>
                                            </div>
											<div class="form-group">
												<select name="status" id="statustapel" class="form-control">
													<!-- <option value="none" selected="" disabled="">Pilih Status</option> -->
													<option value="Y" selected>Aktif</option>
													<option value="T">Nonaktif</option>
												</select>
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