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
                <span>Cari Data Nilai Siswa</span>
            </h3>
        </div>
    <div class="box-body small-5" style="display: block;">
		<form data-abide method="POST" action="laporan/cetak-nilai-siswa.php" role="form" enctype="multipart/form-data"> 
			<div class="name-field"> 
				<label>Nama Siswa</label>
				<select name="siswa" class="form-control" required>
					<?php 
						$siswa	=	mysql_query("SELECT * FROM users WHERE users.users_level='siswa'");

						while ($row=mysql_fetch_array($siswa)) {
					?>
						<option value="<?php echo $row['users_id']; ?>"><?php echo $row ['users_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="name-field"> 
				<label>Jenis Nilai</label>
				<select name="jenis" class="form-control" required>
					<?php 
						$jenis	=	mysql_query("SELECT * FROM jenis");

						while ($row=mysql_fetch_array($jenis)) {
					?>
						<option value="<?php echo $row['jenis_id']; ?>"><?php echo $row['jenis_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="name-field"> 
				<label>Semester</label>
				<select name="semester" class="form-control" required>
					<?php 
						$semester	=	mysql_query("SELECT * FROM semester");

						while ($row=mysql_fetch_array($semester)) {
					?>
						<option value="<?php echo $row['semester_id']; ?>"><?php echo $row['semester_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="name-field"> 
				<label>Tahun Ajaran</label>
				<select name="tahun" class="form-control" required>
					<?php 
						$tahun	=	mysql_query("SELECT * FROM tahun");

						while ($row=mysql_fetch_array($tahun)) {
					?>
						<option value="<?php echo $row['tahun_id']; ?>"><?php echo $row['tahun_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<button class="btn btn-primary" type="submit" name="cetak-nilai"><span class="fa fa-search"></span> Cetak Nilai</button>
		</form>
	</div>
</div>
