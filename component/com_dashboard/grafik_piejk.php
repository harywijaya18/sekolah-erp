	<?php 
	//include '/../../config/conn.php';
	?>
	
	<!--<script src="js/chartjs/Chart.js"></script>-->
	
	<div style="width: 900px;margin: 0px auto;">
		<canvas id="chartJK"></canvas>
	</div>

	<br/>
	<br/>
	
	<?php
	$no = 0;
	$querypie = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as jumlah_siswa, jenis_kelamin
									FROM calon_siswa
									WHERE NULLIF(jenis_kelamin, '') IS NOT NULL
									GROUP BY jenis_kelamin
									ORDER BY jenis_kelamin ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowpie = mysqli_num_rows($querypie);
	?>
	
	<script>
		var ctx = document.getElementById("chartJK").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Laki-laki", "Perempuan"],
				datasets: [{
					label: '',
					data: [
					<?php
					while($datapie=mysqli_fetch_array($querypie)){
					$no++;
						if($sumrowpie == $no){
							echo $datapie['jumlah_siswa'];
						}else{
							echo $datapie['jumlah_siswa'];
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
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(54, 162, 235, 1)',
					'rgba(255, 99, 132, 1)'
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