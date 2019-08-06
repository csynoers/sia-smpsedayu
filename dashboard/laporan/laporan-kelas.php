<div class="large-12 columns">
    <div class="box">
        <div class="box-header bg-transparent">
            <!-- tools box -->
            <div class="pull-right box-tools">

                <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                </span>
                <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                </span>
            </div>
            <h3 class="box-title"><i class="fontello-th-large-outline"></i>
                <span>Cari Data Nilai Kelas</span>
            </h3>
        </div>
        <?php
                $iduser     =$_SESSION['id'];  ?> 
    <div class="box-body small-5" style="display: block;">
		<form target="_blank" data-abide method="POST" action="laporan/cetak-nilai-kelas.php" role="form" enctype="multipart/form-data"> 
			<div class="form-group"> 
				<label>Mata Pelajaran</label>
                <select name="pelajaran" class="form-control" required>
                    <?php 
                        $pelajaran  =   mysql_query("SELECT *,(SELECT COUNT(nilai.nilai_id) FROM nilai WHERE nilai.pelajaran_id=pelajaran.pelajaran_id) count_nilai FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id='{$_SESSION['id']}' HAVING count_nilai > 0");

                        while ($row=mysql_fetch_array($pelajaran)) {
                    ?>
                        <option value="<?php echo $row['pelajaran_id']; ?>"><?php echo $row['pelajaran_nama']; ?> Kelas (<?php echo $row['kelas_nama']; ?>)</option>
                    <?php
                        }
                    ?>
                </select>
            </div>
		
			<div class="name-field"> 
				<label>Judul Tugas</label>
				<select name="tugas_id" class="form-control" required>
					<?php 
						$jenis	=	mysql_query("SELECT *,(SELECT COUNT(nilai.nilai_id) FROM nilai WHERE nilai.instgs_id=instgs.instgs_id) count_nilai FROM pelajaran, kelas, instgs WHERE pelajaran.kelas_id=kelas.kelas_id AND instgs.pelajaran_id=pelajaran.pelajaran_id AND pelajaran.users_id={$_SESSION['id']} HAVING count_nilai > 0");

						while ($row=mysql_fetch_array($jenis)) {
					?>
						<option value="<?php echo $row['instgs_id']; ?>"><?php echo $row['judul']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
		
			<div class="name-field"> 
				<label>Tahun Ajaran</label>
				<select name="tahun" class="form-control" required>
					<?php 
						$tahun	=	mysql_query("SELECT *,IF(tahun.semester='1','Ganjil','Genap') AS semester_mod FROM pelajaran INNER JOIN nilai ON nilai.pelajaran_id=pelajaran.pelajaran_id LEFT JOIN tahun ON tahun.tahun_id=nilai.tahun_id WHERE 1=1 AND pelajaran.users_id={$_SESSION['id']} GROUP BY nilai.pelajaran_id,nilai.instgs_id");

						while ($row=mysql_fetch_array($tahun)) {
					?>
						<option value="<?php echo $row['tahun_id']; ?>"><?php echo $row['tahun_nama'].' (Semester '.$row['semester_mod'].')'; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<button class="btn btn-primary" type="submit" name="cetak-nilai"><span class="fa fa-search"></span> Cetak Nilai</button>
		</form>
	</div>
</div>
