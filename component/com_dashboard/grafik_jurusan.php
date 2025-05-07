	<?php 
	//include '/../../config/conn.php';
	?>
	
	<!--<script src="js/chartjs/Chart.js"></script>-->
	
	<div style="width: 900px;margin: 0px auto;">
		<canvas id="chartJurusan"></canvas>
	</div>

	<br/>
	<br/>
	
	<?php
	$no = 0;
	$nojurbar =0;
	$strjurbar ="";
	$queryjurbar = mysqli_query($conn,"SELECT * FROM m_jurusan ORDER BY program_studi, jurusan ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowjurbar = mysqli_num_rows($queryjurbar);
	
	$querybar = mysqli_query($conn,"SELECT * FROM m_jurusan ORDER BY program_studi, jurusan ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrow = mysqli_num_rows($querybar);
	?>
	
	<script>
		var ctx = document.getElementById("chartJurusan").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
					<?php
					while($datajurbar=mysqli_fetch_array($queryjurbar)){
					$nojurbar++;
						if($sumrowjurbar == $nojurbar){
							$strjurbar = strval($datajurbar['singkatan']);
							echo "\"$strjurbar\"";
							
						}else{
							$strjurbar = strval($datajurbar['singkatan']);
							echo "\"$strjurbar\"";
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
					while($databar=mysqli_fetch_array($querybar)){
					$no++;
						if($sumrow == $no){
							$jumlah_siswa = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as total_siswa, m_jurusan.jurusan
																	FROM calon_siswa
																	LEFT JOIN m_jurusan
																	ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																	WHERE calon_siswa.kd_jurusan = '$databar[kd_jurusan]'");
							$data=mysqli_fetch_array($jumlah_siswa);
							echo $data['total_siswa'];
						}else{
							$jumlah_siswa = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as total_siswa, m_jurusan.jurusan
																	FROM calon_siswa
																	LEFT JOIN m_jurusan
																	ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
																	WHERE calon_siswa.kd_jurusan = '$databar[kd_jurusan]'");
							$data=mysqli_fetch_array($jumlah_siswa);
							echo $data['total_siswa'];
							?>
							,
						<?php
						}
						?>
										
					<?php
					}
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)'
					],
					borderWidth: 1
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