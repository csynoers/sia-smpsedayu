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

    /* mendapatkan nama guru */
    $row_guru= $_SESSION;
    echo '<pre>';
    print_r($_POST);
    print_r($_SESSION);
    print_r($sql_1);
    echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../images/favicon.png">

		<title>Informasi Nilai Kuis</title>
		
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
										<td colspan="4" class="text-center"><strong>Data Nilai Kuis Siswa :</strong></td>
									</tr>
									<tr>
										<td width="20%">Mata Pelajaran</td>
										<td width="30%"> : <?php echo $row_1["pelajaran_nama"] ?></td>
										<td width="20%">&nbsp</td>
										<td width="30%">&nbsp</td>
									</tr>
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
            </center>
        </div>
    </body>
</html>
