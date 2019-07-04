<?php
	require_once('../../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../images/favicon.png">

		<title>Informasi Nilai Kelas</title>
		
		<!--======================== Bootstrap core CSS ========================== -->
		<link href="../assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div id="DivIdToPrint" class="container">
			<center>
				<div class="row">
					<table>
						<tr>
							<td><img style="width: 100px;" src="../img/logo.jpg" alt="Logo Smp Negeri 1 Sedayu"></td>
							<td>
								<h2>Laporan Nilai Tugas</h2><br>
								<h4>SMP NEGERI 1 SEDAYU</h4>
								<h4>Jl. Pedes - Nulis, Panggang, Argomulyo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752</h4>
							</td>
						</tr>
					</table>
				</div>
				<hr>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th >No</th>
								<th >Nama</th>
								<th >Kelas</th>
								<th >Mata Pelajaran</th>
								<th >Tahun</th>
								<th >Nilai Poin</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if (isset($_POST['cetak-nilai'])) {
									$no 		=	1;
									$pelajaran 	=	$_POST['pelajaran'];
									$jenis 		=	$_POST['jenis'];
									$tahun 		=	$_POST['tahun'];
									$sql 		=	mysql_query("
										SELECT
											users.users_nama,
											pelajaran.pelajaran_nama,
											nilai.nilai_poin,
											jenis.jenis_nama,
											tahun.tahun_nama,
											kelas.kelas_id,
											kelas.kelas_nama 
										FROM nilai
											INNER JOIN users
												ON nilai.users_id=users.users_id
											INNER JOIN kelas
												ON users.kelas_id=kelas.kelas_id
											INNER JOIN pelajaran
												ON nilai.pelajaran_id=pelajaran.pelajaran_id
											INNER JOIN jenis
												ON nilai.jenis_id=jenis.jenis_id
											INNER JOIN tahun
												ON nilai.tahun_id=tahun.tahun_id
										WHERE jenis.jenis_id='$jenis' 
											AND tahun.tahun_id='$tahun' 
											AND pelajaran.pelajaran_id='$pelajaran'
											GROUP BY users.users_nama");
									while ($data=mysql_fetch_array($sql))
									{
										echo '
											<tr align="center">
												<td class="text-center">'.$no.'</td>
												<td align="left">'.$data['users_nama'].'</td>
												<td>'.$data['kelas_nama'].'</td>
												<td>'.$data['pelajaran_nama'].'</td>
												<td>'.$data['tahun_nama'].'</td>
												<td class="text-center">'.($data['nilai_poin'] == 0 ? "Data Kosong" : $data['nilai_poin'] ).'</td>
											</tr>
										';
										$no++;  
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</center>
		</div>
		<!-- end /#DivIdToPrint -->
		<script>
			// var printContents = document.getElementById('DivIdToPrint').innerHTML;
			// var originalContents = document.body.innerHTML;
			// document.body.innerHTML = printContents;
			// window.print();
			// document.body.innerHTML = originalContents;
			// setTimeout(function(){window.close();},10);
		</script>
	</body>
</html>
