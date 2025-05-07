	<?php 
	//include '/../../config/conn.php';
	?>
	
	<!--<script type="text/javascript" src="chartjs/Chart.js"></script>-->
	
	<div style="width: 900px;margin: 0px auto;">
		<canvas id="chartBarJK"></canvas>
	</div>

	<br/>
	<br/>
	
	<?php
	$nobarjk =0;
	$nojumlahjk1 = 0;
	$nojumlahjk2 = 0;
	$strjurjk ="";
	$strtotkl1 ="";
	$strtotkl2 ="";
	$querybarjk = mysqli_query($conn,"SELECT * FROM m_jurusan ORDER BY program_studi, jurusan ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowbarjk = mysqli_num_rows($querybarjk);
	
	$querybarjur1 = mysqli_query($conn,"SELECT * FROM m_jurusan ORDER BY program_studi, jurusan ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowbarjur1 = mysqli_num_rows($querybarjur1);
	
	$querybarjur2 = mysqli_query($conn,"SELECT * FROM m_jurusan ORDER BY program_studi, jurusan ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowbarjur2 = mysqli_num_rows($querybarjur2);
	
	
	?>
	
	<script>
		var ctx = document.getElementById("chartBarJK").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
				<?php
				while($jkbar=mysqli_fetch_array($querybarjk)){
				$nobarjk++;
					if($sumrowbarjk == $nobarjk){
						$strjurjk = strval($jkbar['singkatan']);
						echo "\"$strjurjk\"";
						
					}else{
						$strjurjk = strval($jkbar['singkatan']);
						echo "\"$strjurjk\"";
						?>
						,
					<?php
					}
					
				}
				?>
				],
				datasets: [
					{
					  label: "Laki-Laki",
					  backgroundColor: "rgba(54, 162, 235, 0.5)",
					  borderColor : "rgba(54, 162, 235, 1)",
					  borderWidth: 1,
					  data: [
						<?php
						while($dtjur1=mysqli_fetch_array($querybarjur1)){
						$nojumlahjk1++;
							if($sumrowbarjur1 == $nojumlahjk1){
								$jumlah_siswaL = mysqli_query($conn,"SELECT calon_siswa.kd_jurusan, COUNT(calon_siswa.kd_siswa) as total_siswa
																	FROM calon_siswa
																	WHERE kd_jurusan = '$dtjur1[kd_jurusan]' AND jenis_kelamin ='L'");
								$datajumjk=mysqli_fetch_array($jumlah_siswaL);
								echo $datajumjk['total_siswa'];
							}else{
								$jumlah_siswaL = mysqli_query($conn,"SELECT calon_siswa.kd_jurusan, COUNT(calon_siswa.kd_siswa) as total_siswa
																	FROM calon_siswa
																	WHERE kd_jurusan = '$dtjur1[kd_jurusan]' AND jenis_kelamin ='L'");
								$datajumjk=mysqli_fetch_array($jumlah_siswaL);
								echo $datajumjk['total_siswa'];
								?>
								,
								<?php
							}
						}
						?>
					  ]
					}, {
					  label: "Perempuan",
					  backgroundColor: "rgba(255, 99, 132, 0.5)",
					  borderColor : "rgba(255, 99, 132, 1)",
					  borderWidth: 1,
					  data: [
						<?php
						while($dtjur2=mysqli_fetch_array($querybarjur2)){
						$nojumlahjk2++;
							if($sumrowbarjur2 == $nojumlahjk2){
								$jumlah_siswaP = mysqli_query($conn,"SELECT calon_siswa.kd_jurusan, COUNT(calon_siswa.kd_siswa) as total_siswa
																	FROM calon_siswa
																	WHERE kd_jurusan = '$dtjur2[kd_jurusan]' AND jenis_kelamin ='P'");
								$datajumjk=mysqli_fetch_array($jumlah_siswaP);
								echo $datajumjk['total_siswa'];
							}else{
								$jumlah_siswaP = mysqli_query($conn,"SELECT calon_siswa.kd_jurusan, COUNT(calon_siswa.kd_siswa) as total_siswa
																	FROM calon_siswa
																	WHERE kd_jurusan = '$dtjur2[kd_jurusan]' AND jenis_kelamin ='P'");
								$datajumjk=mysqli_fetch_array($jumlah_siswaP);
								echo $datajumjk['total_siswa'];
								?>
								,
								<?php
							}
						}
						?>
					  ]
					}
 
				]
					
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