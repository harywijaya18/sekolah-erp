	<?php 
	//include '/../../config/conn.php';
	?>
	
	<!--<script type="text/javascript" src="chartjs/Chart.js"></script>-->
	
	<div style="width: 900px;margin: 0px auto;">
		<canvas id="chartLine"></canvas>
	</div>

	<br/>
	<br/>
	
	<?php
	$noline =0;
	$nojumlah = 0;
	$strtgl ="";
	$queryline = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) total_siswa, date_format(tanggal_buat, '%d-%m-%Y') as tanggal_buat
									FROM calon_siswa
									GROUP BY date_format(tanggal_buat, '%Y %m %d')
									ORDER BY date_format(tanggal_buat, '%Y %m %d') ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowline = mysqli_num_rows($queryline);
	
	$querytotal = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) total_siswa, date_format(tanggal_buat, '%d%m%Y') as tanggal_buat
									FROM calon_siswa
									GROUP BY date_format(tanggal_buat, '%Y %m %d')
									ORDER BY date_format(tanggal_buat, '%Y %m %d') ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowtotal = mysqli_num_rows($querytotal);
	?>
	
	<script>
		var ctx = document.getElementById("chartLine").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
				<?php
				while($tanggalline=mysqli_fetch_array($queryline)){
				$noline++;
					if($sumrowline == $noline){
						$strtgl = strval($tanggalline['tanggal_buat']);
						echo "\"$strtgl\"";
						
					}else{
						$strtgl = strval($tanggalline['tanggal_buat']);
						echo "\"$strtgl\"";
						?>
						,
					<?php
					}
					
				}
				?>
				],
				datasets: [{
					label: '',
					data: [
					<?php
					while($jumlahline=mysqli_fetch_array($querytotal)){
					$nojumlah++;
						if($sumrowtotal == $nojumlah){
							echo $jumlahline['total_siswa'];
						}else{
							echo $jumlahline['total_siswa'];
							?>
							,
						<?php
						}
						?>
										
					<?php
					}
					?>
					],
					borderColor: [
					'#ff8d03',
					],
					//fill: false
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>