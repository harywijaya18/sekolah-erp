<div id="ModalAdd" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Form Tambah Pegawai</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
									<form action="?module=<?php echo $_GET['module'];?>&aksi=simpan" class="dropzone dropzone-custom needsclick add-professors" method="POST">
                                    <div class="modal-body">            
                                            <div class="form-group">
												<input name="nip" id="nip" type="text" class="form-control" placeholder="NIP Pegawai" required autocomplete="off">
                                            </div>
											<div class="form-group">
												<input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Pegawai" required autocomplete="off">
                                            </div>
											<select id="level" class="form-control" required name="level">
												<option value="">- Pilih Level -</option>
												<option value="struktural">Struktural</option>
												<option value="admin_psb">Admin PSB</option>
												<option value="panitia_psb">Panitia PSB</option>
												<option value="it">IT</option>
												<option value="guru">Guru</option>
											</select>
                                                            
                                    </div>
                                    <div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i> Batal</button>
										<button type="submit" class="btn btn-primary"><i class="fa fa-check edu-checked-pro" aria-hidden="true"></i> Simpan</button>
                                    </div>
									</form>
                                </div>
                            </div>
                        </div>					