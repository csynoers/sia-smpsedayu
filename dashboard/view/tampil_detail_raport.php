<?php

	if(isset($_POST['cek-nilai'])) {
?>
<div class="block-flat no-padding">
	<div class="content">
		<table class="no-border blue">
			<thead class="no-border">
				<tr>
					<th style="width: 5%;" class="text-center">No</th>
					<th width="15%">Nama</th>
					<th width="5%">Kelas</th>
					<th width="7%">Mata Pelajaran</th>
					<th width="6%">Semester</th>
					<th width="7%">Tahun</th>
					<th style="width: 7%;" class="text-center">Nilai Poin</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>	
			<form role="form" method="post" />
				<?php
						
						$no = 1;
						$kelasnama = $_POST['kelas'];
						$pelajarannama = $_POST['pelajaran'];
						$semesternama = $_POST['semester'];
						$tahunnama = $_POST['tahun'];
						$sql = mysql_query("SELECT nilai.nilai_id, users.users_nama, pelajaran.pelajaran_nama, nilai.nilai_poin,
													kelas.kelas_nama, semester.semester_nama, tahun.tahun_nama
										FROM nilai 
										INNER JOIN users ON nilai.users_id=users.users_id
										INNER JOIN kelas ON users.kelas_id=kelas.kelas_id
										INNER JOIN pelajaran ON nilai.pelajaran_id=pelajaran.pelajaran_id
										INNER JOIN jenis ON nilai.jenis_id=jenis.jenis_id
										INNER JOIN semester ON nilai.semester_id=semester.semester_id
										INNER JOIN tahun ON nilai.tahun_id=tahun.tahun_id
										WHERE jenis.jenis_id=6 AND kelas.kelas_id='$kelasnama' AND pelajaran.pelajaran_id='$pelajarannama' 
										AND semester.semester_id='$semesternama' AND tahun.tahun_id='$tahunnama'
										GROUP BY users.users_nama");
						while ($data=mysql_fetch_array($sql)) {
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td>						
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
					<td>
						<?php 
							echo $data['semester_nama'];
						?>
					</td>
					<td>
						<?php 
							echo $data['tahun_nama'];
						?>
					</td>
					<td>
						<?php 
							echo $data['nilai_poin'];
						?>
					</td>
					<td class="text-center" width="17%">
						<a href="?nilai=Raport&&edit-raport=<?php echo $data['nilai_id']; ?>"><span class="fontello-edit"></span> Edit</a>
						<a href="?nilai=Raport&&tampil=Raport&&del-raport=<?php echo $data['nilai_id']; ?>"><span class="fontello"></span> Delete</a>
					</td>
				</tr>
				<?php 
					$no++;  
					}
				?>
			</form>
		</table>
		<hr/>
		<a href="?nilai=Raport" class="tiny button"><span class="fontello-reply"></span> Back</a>		
	</div>
</div>
<?php 
	}else {
?>
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
                <span>Cari Data Nilai Raport</span>
            </h3>
        </div>
	<div class="content">
		<form role="form" method="POST"> 
			<div class="form-group"> 
				<label>Kelas</label>
				<select name="kelas" class="form-control">
					<?php 
						$kelas	=	mysql_query("SELECT * FROM kelas");

						while ($row=mysql_fetch_array($kelas)) {
					?>
						<option value="<?php echo $row['kelas_id']; ?>"><?php echo $row['kelas_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group"> 
				<label>Mata Pelajaran</label>
				<select name="pelajaran" class="form-control" required>
					<?php 
						$pelajaran	=	mysql_query("SELECT * FROM pelajaran");

						while ($row=mysql_fetch_array($pelajaran)) {
					?>
						<option value="<?php echo $row['pelajaran_id']; ?>"><?php echo $row['pelajaran_nama']; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<div class="form-group"> 
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
			<div class="form-group"> 
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
			<button class="btn btn-primary" type="submit" name="cek-nilai"><span class="fa fa-search"></span> Cari Nilai Raport</button>
		</form>
	</div>
</div>
<?php
	}
?>		
