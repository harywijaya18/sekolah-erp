<?php
include 'config/conn.php';

if($_GET['aksi']=='') {
?>

<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<form action="?module=<?php echo $_GET['module'];?>&aksi=cari" enctype="multipart/form-data" method="POST">
                            <div class="breadcome-list">
                                <div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="breadcome-heading">
                                            <label>Masukan NISN / Kode Daftar / Nama untuk mencari Calon Siswa </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <div class="breadcome-heading">
                                            
                                                <input type="text" name="idcari" id="idcari" placeholder="Search..." class="search-int form-control">
                                                
												
                                            
                                        </div>
                                    </div>
									
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <ul class="breadcome-heading">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                        </ul>
                                    </div>
									
                                </div>
                            </div>
						</form>
                        </div>
                    </div>
                </div>
            </div>

<?php } elseif($_GET['aksi']=='cari') { 

include 'detail_view.php';

?>

		
<?php } ?>