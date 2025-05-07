<?php
include 'config/conn.php';
include 'lib/helper.php';

?>

 <script src="js/chartjs/Chart.js"></script>
 
 <div class="analytics-sparkle-area">
            <div class="container-fluid">
				<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                    Selamat datang di aplikasi penerimaan siswa baru.  <strong><?php echo $_SESSION['namalengkap']; ?></strong>
                </div>
				
				<!-- BOX INFO AREA AREA -->
		
				<?php include 'box_info.php';?>
				
				<?php include 'box_payment.php';?>
				
                <div class="row">
					<!-- Baris Pertama Dashboard -->
					<?php
						$no = 0;
						$query=mysqli_query($conn,"SELECT m_jurusan.kd_jurusan, m_jurusan.jurusan, m_jurusan.singkatan, 
													m_jurusan.program_studi, m_jurusan.udp, m_jurusan.target_siswa, 
													m_jurusan.kd_tahun, COUNT(calon_siswa.kd_jurusan) AS total_calon 
													FROM m_jurusan LEFT JOIN calon_siswa
													ON m_jurusan.kd_jurusan = calon_siswa.kd_jurusan GROUP BY m_jurusan.kd_jurusan
													ORDER BY m_jurusan.program_studi, m_jurusan.jurusan ASC");
						while($row=mysqli_fetch_array($query)){
						$no++;
						
						$persentase = 0;
						$calon = $row['total_calon'];
						$target = $row['target_siswa'];
						$persentase = $calon / $target * 100;
						
					if($no < 5){
					?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5><?php echo cutText($row['jurusan'] , 20) . ' ...' ;?></h5>
								<h6><span><?php echo "Program ".strval($row['program_studi'])." Tahun";?></span></h6>
								<h2><span class="counter"><?php echo $row['target_siswa'];?></span> <span class="tuition-fees">Target Siswa</span></h2>
                                <!--
								<h2><span class="counter"><?php echo $row['total_calon'];?></span> <span class="tuition-fees">Calon Siswa</span></h2>
								-->
                                <h2><span class="label-danger label-1 label"><?php echo $row['total_calon'];?></span> <span class="tuition-fees">Calon Siswa</span></h2>
								<span class="text-success"><?php echo round($persentase,1);?> %</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php round($persentase);?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($persentase);?>%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php 
					}elseif($no < 9){
					?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5><?php echo cutText($row['jurusan'] , 20) . ' ...';?></h5>
								<h6><span><?php echo "Program ".strval($row['program_studi'])." Tahun";?></span></h6>
								<h2><span class="counter"><?php echo $row['target_siswa'];?></span> <span class="tuition-fees">Target Siswa</span></h2>
                                <!--
								<h2><span class="counter"><?php echo $row['total_calon'];?></span> <span class="tuition-fees">Calon Siswa</span></h2>
								-->
								<h2><span class="label-danger label-1 label"><?php echo $row['total_calon'];?></span> <span class="tuition-fees">Calon Siswa</span></h2>
                                <span class="text-success"><?php echo round($persentase,1);?> %</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo round($persentase);?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($persentase);?>%;"> <span class="sr-only">20% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php 
					}else{
					?>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5><?php echo cutText($row['jurusan'] , 20) . ' ...';?></h5>
								<h6><span><?php echo "Program ".strval($row['program_studi'])." Tahun";?></span></h6>
								<h2><span class="counter"><?php echo $row['target_siswa'];?></span> <span class="tuition-fees">Target Siswa</span></h2>
								<!--
                                <h2><span class="counter"><?php echo $row['total_calon'];?></span> <span class="tuition-fees">Calon Siswa</span></h2>
								-->
								<h2><span class="label-danger label-1 label"><?php echo $row['total_calon'];?></span> <span class="tuition-fees">Calon Siswa</span></h2>
                                <span class="text-success"><?php echo round($persentase,1);?> %</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo round($persentase);?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($persentase);?>%;"> <span class="sr-only">230% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
					<?php 
						$calon = 0;
						$target = 0;
					} ?>
                </div>
            </div>
        </div>
		
		<div>
			</br>
		</div>
		
		
		<!-- GRAFIK AREA -->
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
							<div class="portlet-title">
								<div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Grafik Jumlah Siswa Berdasarkan Jurusan</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Total Perjurusan</p>
                                        </div>
                                    </div>
                                </div>
								
							</div>
							<?php include 'grafik_jurusan.php';?>
                        </div>
					</div>
                </div>
            </div>
        </div>
		<div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
							<div class="portlet-title">
								<div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Grafik Jumlah Pendaftar Perhari</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Total Siswa/i</p>
                                        </div>
                                    </div>
                                </div>
								
							</div>
							<?php include 'grafik_line_hari.php';?>
                        </div>
					</div>
                </div>
            </div>
        </div>
		<div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
							<div class="portlet-title">
								<div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Grafik Jumlah Pendaftar Perbulan</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Total Siswa/i</p>
                                        </div>
                                    </div>
                                </div>
								
							</div>
							<?php include 'grafik_line_bulan.php';?>
                        </div>
					</div>
                </div>
            </div>
        </div>
		<div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
							<div class="portlet-title">
								<div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Grafik Jumlah Siswa Berdasarkan Jenis Kelamin</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Total Siswa/i</p>
                                        </div>
                                    </div>
                                </div>
								
							</div>
							<?php include 'grafik_piejk.php';?>
                        </div>
					</div>
                </div>
            </div>
        </div>
		<div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
							<div class="portlet-title">
								<div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Grafik Jumlah Siswa Berdasarkan Jenis Kelamin dan Jurusan</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>Total Siswa/i</p>
                                        </div>
                                    </div>
                                </div>
								
							</div>
							<?php include 'grafik_bar_jk.php';?>
                        </div>
					</div>
                </div>
            </div>
        </div>
		
		