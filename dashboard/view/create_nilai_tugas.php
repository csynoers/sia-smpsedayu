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
                <span>Input Penilaian Tugas</span>
            </h3>
        </div>
        <div class="box-body small-5" style="display: block;">
		<form role="form" method="POST"> 
			<div class="form-group"> 
				<label>Kelas</label>
				<select name="kelas" class="form-control" required>
				<option value="0">-- Pilih --</option>
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
			<div class="form-group"> 
				<label>Mata Pelajaran</label>
				<select name="pelajaran" class="form-control" required>
					<?php 
					$iduser = $_SESSION['id'];
						$pelajaran	=	mysql_query("SELECT * FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id='$iduser'");

						while ($row=mysql_fetch_array($pelajaran)) {
					?>
						<option value="<?php echo $row['pelajaran_id']; ?>"><?php echo $row['pelajaran_nama']; ?> Kelas (<?php echo $row['kelas_nama']; ?>)</option>
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
						<option value="<?php echo $row['tahun_id']; ?>"><?php echo $row['tahun_nama'].'('.$row['semester'].')'; ?></option>
					<?php
						}
					?>
				</select>
			</div>
			<button class="btn btn-primary" type="submit" name="create-nilai"><span class="fa fa-plus"></span> Tambah Nilai Tugas</button>
		</form>
	</div>
</div>



<div class="large-12 columns">
	<div class="box">
		<table class="box-header bg-transparent"  style="width:100%">
			<thead class="no-border">
				<tr>
					<th style="width: 5%;" class="text-center">No</th>
					<th >Nama</th>
					<th style="width: 17%;" class="text-center">Nilai Poin</th>
				</tr>
			</thead>	
			<form role="form" method="post" />
				<?php
					
					if(isset($_POST['create-nilai'])) {
						
						$no 			= 1;
						$kelasnama 		= $_POST['kelas'];
						$pelajarannama 	= $_POST['pelajaran'];
						$semesternama 	= $_POST['semester'];
						$jenisnama		= '1';
						$tahunnama 		= $_POST['tahun'];
						$sql 			= mysql_query("SELECT users.users_id, users.users_nama, kelas.kelas_id, kelas.kelas_nama 
												FROM users
												INNER JOIN kelas ON users.kelas_id=kelas.kelas_id
												WHERE kelas.kelas_id=$kelasnama
												");
								while ($data=mysql_fetch_array($sql)) {
					?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td>
						<input type="hidden" class="form-control" name="users[]" id="users[]" value="<?php echo $data['users_id']; ?>">
						<?php 
							echo $data['users_nama'];
						?>
						<input type="hidden" name="pelajaran[]" id="pelajaran[]" value="<?php echo "$pelajarannama"; ?>">
						<input type="hidden" name="jenis[]" id="jenis[]" value="<?php echo "$jenisnama"; ?>">
						<input type="hidden" name="tahun[]" id="tahun[]" value="<?php echo "$tahunnama"; ?>">
					</td>
					<td width="144" class="text-center">
						<input type="text" class="form-control" name="nilai[]" id="nilai[]" />
					</td>
				</tr>
				<?php 
					$no++;  
					}
				?>		
				<tr>
					<td colspan="3" align="right" valign="baseline"><button type="submit" class="btn btn-success" name="nilai-tugas-create"><span class="fontello-minefield"></span> Proses</button></td>
				</tr>
			</form>
			<?php 
				}
			?>
		</table>
	</div>
</div>