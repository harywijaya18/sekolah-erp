	<?php 
	include '/../../config/conn.php';
	?>
	
	<script type="text/javascript" src="chartjs/Chart.js"></script>
	
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
	
	$querytotaljk1 = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as jumlah_siswa, 
									calon_siswa.jenis_kelamin, calon_siswa.kd_jurusan, m_jurusan.jurusan
									FROM calon_siswa
                                    LEFT JOIN m_jurusan
                                    ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
									GROUP BY kd_jurusan, jenis_kelamin
									ORDER BY jenis_kelamin ASC");
	//$databar=mysqli_fetch_array($querybar);
	$sumrowtotaljk1 = mysqli_num_rows($querytotaljk1);
	
	$querytotaljk2 = mysqli_query($conn,"SELECT COUNT(calon_siswa.kd_siswa) as jumlah_siswa, 
									calon_siswa.jenis_kelamin, calon_siswa.kd_jurusan, m_jurusan.jurusan
									FROM calon_siswa
                                    LEFT JOIN m_jurusan
                                    ON calon_siswa.kd_jurusan = m_jurusan.kd_jurusan
									GROUP BY kd_jurusan, jenis_kelamin
									ORDER BY jenis_kelamin ASC");
									
	$sumrowtotaljk2 = mysqli_num_rows($querytotaljk2);
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
						while($dtjkjur1=mysqli_fetch_array($querytotaljk1)){
						$nojumlahjk1++;
							if($dtjkjur1['jenis_kelamin'] == "L"){
								if($sumrowtotaljk1 == $nojumlahjk1){
									echo $dtjkjur1['jumlah_siswa'];
								}else{
									echo $dtjkjur1['jumlah_siswa'];
									?>
									,
									<?php
								}
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
						while($dtjkjur2=mysqli_fetch_array($querytotaljk2)){
						$nojumlahjk2++;
							if($dtjkjur2['jenis_kelamin'] == "P"){
								if($sumrowtotaljk2 == $nojumlahjk2){
									echo $dtjkjur2['jumlah_siswa'];
								}else{
									echo $dtjkjur2['jumlah_siswa'];
									?>
									,
									<?php
								}
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