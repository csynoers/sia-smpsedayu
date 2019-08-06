<?php
	session_start();
	require_once('../../config/db.php');

	/* query untuk mendapatkan mata pelajaran dan kelas */
	$sql_1= "
		SELECT
			pelajaran_nama,
			kelas.kelas_nama
		FROM pelajaran
			INNER JOIN kelas
				ON pelajaran.kelas_id=kelas.kelas_id
		WHERE 1=1
			AND pelajaran_id='{$_POST["pelajaran"]}'
	";
	$result_sql_1	= mysql_query( $sql_1 );
	$row_1 			= mysql_fetch_assoc( $result_sql_1 );

	/* query untuk mendapatkan tahun ajaran */
	$sql_2= "
		SELECT
			tahun.tahun_nama,
			IF(tahun.semester='1','Ganjil','Genap') AS semester_mod
		FROM tahun
		WHERE 1=1
			AND tahun.tahun_id='{$_POST["tahun"]}'
	";
	$result_sql_2	= mysql_query( $sql_2 );
	$row_2 			= mysql_fetch_assoc( $result_sql_2 );

	/* mendapatkan nama guru */
	$row_guru= $_SESSION;

	/* mendapatkan informasi tugas */
	$sql= ("SELECT * FROM instgs WHERE instgs_id='{$_POST['tugas_id']}' ");
	$tugas= query_result($connect, $sql)['fetch_assoc'][0];
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
				<table class="table">
					<tbody>
						<tr>
							<td style="padding-top: 2em;"><img style="width: 100px;" src="../img/logo.jpg" alt="Logo Smp Negeri 1 Sedayu"></td>
							<td class="text-center">
								<h4><strong>SMP NEGERI 1 SEDAYU</strong></h4>
								<h6><strong>Jl. Pedes - Nulis, Panggang, Argomulyo, Kec. Sedayu, Bantul, Daerah Istimewa Yogyakarta 55752</strong></h6>
								<table class="text-left" width="100%">
									<tr>
										<td colspan="4" class="text-center"><strong>Data Nilai Tugas Siswa :</strong></td>
									</tr>
									<tr>
										<td width="20%">Mata Pelajaran</td>
										<td width="30%"> : <?php echo $row_1["pelajaran_nama"] ?></td>
										<td width="20%">Tahun Ajaran</td>
										<td width="30%"> : <?php echo $row_2["tahun_nama"] ?></td>
									</tr>
									<tr>
										<td width="20%">Judul Tugas</td>
										<td width="30%"> : <?php echo $tugas["judul"] ?></td>
										<td width="20%">Semester</td>
										<td width="30%"> : <?php echo $row_2["semester_mod"] ?></td>
									</tr>
									<tr>
										<td>Kelas</td>
										<td> : <?php echo $row_1["kelas_nama"] ?></td>
										<td>Nama Guru</td>
										<td> : <?php echo $row_guru["nama"] ?></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- end /.table -->
				<hr>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th align="left">No</th>
								<th align="left">NIS</th>
								<th align="left">Nama</th>
								<th align="left">Nilai Poin</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if (isset($_POST['cetak-nilai'])) {
									$no 		=	1;
									$pelajaran_id 	=	$_POST['pelajaran'];
									$instgs_id 		=	$_POST['tugas_id'];
									$tahun_id 		=	$_POST['tahun'];
									$sql= mysql_query("SELECT * FROM nilai LEFT JOIN users ON users.users_id=nilai.users_id WHERE nilai.pelajaran_id='{$pelajaran_id}' AND nilai.instgs_id='{$instgs_id}' AND nilai.tahun_id='{$tahun_id}' ");
									while ($data=mysql_fetch_array($sql))
									{
										echo '
											<tr>
												<td align="left">'.$no.'</td>
												<td align="left">'.$data['users_noinduk'].'</td>
												<td align="left">'.$data['users_nama'].'</td>
												<td align="left">'.($data['nilai_poin'] == 0 ? "Data Kosong" : $data['nilai_poin'] ).'</td>
											</tr>
										';
										$no++;  
									}
								}
							?>
						</tbody>
					</table>
					<!-- end /.table -->
				</div>
			</center>
		</div>
		<!-- end /#DivIdToPrint -->
		<script>
			/* var printContents = document.getElementById('DivIdToPrint').innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
			setTimeout(function(){window.close();},10); */
		</script>
	</body>
</html>
