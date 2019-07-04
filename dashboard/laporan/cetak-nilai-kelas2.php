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

		<title>Informasi Nilai Kelas</title>
	</head>
<body>
<center>
<div class="container" id="pcont">
	<div class="page-head">
		<h2>Laporan Nilai Kuis Siswa</h2><br>
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
			
					
					<th style="width: 7%;" class="text-center">Nilai</th>
				</tr>
			</thead>
				<?php 
					if (isset($_POST['cetak-nilai'])) {
						$no 		=	1;
						$kelas 		=	$_POST['kelas'];
						$pelajaran 	=	$_POST['pelajaran'];
					
			
				

						$sql 		=	mysql_query("SELECT nilai_quis.id_nq, nilai_quis.nilai_point, users.users_id, users.users_nama, 
                            kelas.kelas_id, kelas.kelas_nama, pelajaran.pelajaran_id, 
                            pelajaran.pelajaran_nama
                           
                    FROM nilai_quis
                    INNER JOIN users ON nilai_quis.users_id=users.users_id
                    INNER JOIN kelas ON users.kelas_id=kelas.kelas_id
                    INNER JOIN pelajaran ON nilai_quis.pelajaran_id=pelajaran.pelajaran_id
                    
                    WHERE kelas.kelas_id='$kelas'
                    AND pelajaran.pelajaran_id='$pelajaran'
                    ");
					while ($data=mysql_fetch_array($sql)) {
				?>
				<tr align="center">
					<td class="text-center"><?php echo $no; ?></td>
					<td align="left">						
						<?php 
							echo $data['users_nama'];
						?>						
					</td>
					<td>
						<?php 
							echo $data['kelas_nama'];
						?>
					</td>
					<td>
						<?php 
							echo $data['pelajaran_nama'];
						?>
					</td>
				
					
					<td class="text-center">
						<?php  
							if ($data['nilai_point'] == 0) {
								echo "Data Kosong";
							}else {
								echo $data['nilai_point'];
							}
						?>
					</td>
				</tr>
				<?php 
					$no++;  
					}
				?>
		</table>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<!-- <div class="col-sm-3">
			<?php 
				$guru 	=	mysql_query("SELECT *, pelajaran.pelajaran_nama FROM users WHERE users.users_level='guru' 
											INNER JOIN pelajaran ON users.pelajaran_id=pelajaran.pelajaran_id
				 							WHERE pelajaran.pelajaran_id='$pelajaran'");
				$data 	=	mysql_fetch_array($guru);

				echo $data['guru_nama'];	
			?>
		</div> -->
		<hr/>
		<a href="../?cetak=laporan-nilai-kelas" cls='btn'><i class='fa fa-reply'></i> Kembali </a>
		<a href="cetak-nilai-kelas.php" cls='btn' onClick="window.print();return false"><i class='fa fa-print'></i> Cetak </a>
	</div>
</div>
<!-- ===================================== Content Here ===================================== -->
	</div>
</div>
</center>
<?php
		}
?>
    </body>
</html>
