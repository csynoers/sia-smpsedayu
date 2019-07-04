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

		<!--======================== Custom styles for this template ========================== -->
		<link href="../css/style.css" rel="stylesheet" />
	</head>
	<body>
		<div id="DivIdToPrint" class="container">
			<center>
				<div class="container" id="pcont">
					<div class="page-head">
						<h2>Laporan Nilai Tugas Siswa</h2><br>
						<h4>SMPN 1 SEDAYU</h4>
					</div>    
					<div class="cl-mcont">
						<!-- ===================================== Content Here ===================================== -->
						<div class="block-flat no-padding">
							<div class="content">
								<table class="no-border blue">
									<thead class="no-border">
										<tr>
											<th style="width: 5%;" class="text-center">No</th>
											<th width="8%">Nama</th>
											<th width="5%">Kelas</th>
											<th width="7%">Mata Pelajaran</th>
									
											<th width="7%">Tahun</th>
											<th style="width: 7%;" class="text-center">Nilai Poin</th>
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
								<hr/>
								<a href="../?cetak=laporan-nilai-kelas" cls="btn" class="btn btn-info"><i class="fa fa-reply"></i> Kembali </a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="cetak-nilai-kelas.php" cls="btn" onclick="window.print();return false" class="btn btn-primary"><i class="fa fa-print"></i> Cetak </a>
							</div>
						</div>
						<!-- ===================================== Content Here ===================================== -->
					</div>
				</div>
			</center>
		</div>
		<!-- end /#DivIdToPrint -->
<?php
		}
?>
		<script>
			var printContents = document.getElementById('DivIdToPrint').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
			setTimeout(function(){window.close();},10);
		</script>
	</body>
</html>
