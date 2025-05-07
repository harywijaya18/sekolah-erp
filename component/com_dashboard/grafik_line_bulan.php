	<?php 
	//include '/../../config/conn.php';
	?>
	
	<!--<script type="text/javascript" src="chartjs/Chart.js"></script>-->
	
	<div style="width: 900px;margin: 0px auto;">
		<canvas id="chartBulan"></canvas>
	</div>

	<br/>
	<br/>
	
	<?php
	$nolinebulan =0;
	$nojumlahbulan = 0;
	$strbulan ="";
	$querylinebulan = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) total_siswa, date_format(tanggal_buat, '%M %Y') as tanggal_buat
									FROM calon_siswa
									GROUP BY date_format(tanggal_buat, '%Y %m')
									ORDER BY date_format(tanggal_buat, '%Y %m') ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowlinebulan = mysqli_num_rows($querylinebulan);
	
	$querytotalbulan = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) total_siswa, date_format(tanggal_buat, '%M-%Y') as tanggal_buat
									FROM calon_siswa
									GROUP BY date_format(tanggal_buat, '%Y %m')
									ORDER BY date_format(tanggal_buat, '%Y %m') ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowtotalbulan = mysqli_num_rows($querytotalbulan);
	?>
	
	<script>
		var ctx = document.getElementById("chartBulan").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [
				<?php
				while($bulanline=mysqli_fetch_array($querylinebulan)){
				$nolinebulan++;
					if($sumrowlinebulan == $nolinebulan){
						$strbulan = strval($bulanline['tanggal_buat']);
						echo "\"$strbulan\"";
						
					}else{
						$strbulan = strval($bulanline['tanggal_buat']);
						echo "\"$strbulan\"";
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
					while($jumlahlinebulan=mysqli_fetch_array($querytotalbulan)){
					$nojumlahbulan++;
						if($sumrowtotalbulan == $nojumlahbulan){
							echo $jumlahlinebulan['total_siswa'];
						}else{
							echo $jumlahlinebulan['total_siswa'];
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
					'#3e95cd',
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