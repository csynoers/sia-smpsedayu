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
    <div class="box-body small-5" style="display: block;">
		<form data-abide method="POST" action="laporan/cetak-nilai-kelas2.php" role="form" enctype="multipart/form-data"> 
			<div class="name-field"> 
				<label>Mata Pelajaran</label>
				<select name="pelajaran" class="form-control" required>
					<?php 
                    $iduser = $_SESSION['id'];
                        $pelajaran  =   mysql_query("SELECT * FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id='$iduser'");

                        while ($row=mysql_fetch_array($pelajaran)) {
                    ?>
                        <option value="<?php echo $row['pelajaran_id']; ?>"><?php echo $row['pelajaran_nama']; ?> Kelas (<?php echo $row['kelas_nama']; ?>)</option>
                    <?php
                        }
                    ?>
				</select>
			</div>
			<div class="name-field"> 
				<label>Kelas</label>
				<select name="kelas" class="form-control" required>
					<?php 
						$idus= $_SESSION['id'];
                    
                        $kelas  =   mysql_query("SELECT * FROM pelajaran, kelas WHERE kelas.kelas_id=pelajaran.kelas_id AND pelajaran.users_id='$idus'");

                        while ($row=mysql_fetch_array($kelas)) {
					?>
						<option value="<?php echo $row['kelas_id']; ?>"><?php echo $row['kelas_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			
		
		
			<button class="btn btn-primary" type="submit" name="cetak-nilai"><span class="fa fa-search"></span> Cetak Nilai</button>
		</form>
	</div>
</div>
