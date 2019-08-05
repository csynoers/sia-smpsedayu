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
				<?php
					$sql= ("
					SELECT *,
						IF(tahun.semester='1','Ganjil','Genap') AS semester_mod
					FROM tahun
					WHERE 1=1
						AND tahun_nama LIKE '%".date('Y')."%'
						AND semester='".(date('n') <= 6? 2 : 1 )."'
						LIMIT 1
					");
					$row_tahun= query_result($connect, $sql)['fetch_assoc'][0];
				?>
                <span>Input Penilaian Tugas Tahun Ajaran <?php echo $row_tahun['tahun_nama'].' (Semester '.$row_tahun['semester_mod'].')' ?></span>
            </h3>
        </div>
        <div class="box-body small-5" style="display: block;">
		<form role="form" method="POST">
			<div class="form-group"> 
				<label>Mata Pelajaran</label>
				<select name="pelajaran" class="form-control" required>
					<?php
						$sql = ("SELECT * FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id='{$_SESSION['id']}'");
						foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
							echo '<option value="'.$value['pelajaran_id'].'" '.(empty($_POST['pelajaran'])? NULL : ($_POST['pelajaran']==$value['pelajaran_id']? 'selected' : NULL ) ).'> '.$value['pelajaran_nama'].' Kelas ('.$value['kelas_nama'].')</option>';
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
					<th style="width: 5%;" class="text-center">NIS</th>
					<th >Nama</th>
					<th style="width: 17%;" class="text-center">Nilai Poin</th>
				</tr>
			</thead>	
			<form role="form" method="post" >
				<?php
					if(isset($_POST['create-nilai'])) {
						
						$no 			= 1;
						// $kelasnama 		= $_POST['kelas'];
						// $pelajarannama 	= $_POST['pelajaran'];
						// $semesternama 	= $_POST['semester'];
						// $jenisnama		= '1';
						// $tahunnama 		= $_POST['tahun'];
						$sql 			= ("
							SELECT
								users.users_id,
								users.users_noinduk,
								users.users_nama,
								pbm_o.kelas_id,
								(
									SELECT pbm.kelas_id
									FROM pbm
									WHERE pbm.user_id=pbm_o.user_id
									ORDER BY pbm.pbm_id DESC LIMIT 1
								) AS kelas_id_mod
							FROM pbm AS pbm_o
								INNER JOIN users
									ON users.users_id=pbm_o.user_id
							WHERE 1=1
								AND pbm_o.kelas_id= (
									SELECT pelajaran.kelas_id
										FROM pelajaran
									WHERE 1=1
										AND pelajaran.pelajaran_id='{$_POST['pelajaran']}'
									)
								HAVING kelas_id_mod=pbm_o.kelas_id
							ORDER BY users.users_nama ASC 
						");
						foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $data) {
					?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td class="text-center"><?php echo $data['users_noinduk']; ?></td>
					<td>
						<input type="hidden" class="form-control" name="users[]" id="users[]" value="<?php echo $data['users_id']; ?>">
						<?php 
							echo $data['users_nama'];
						?>
						<!-- <input type="hidden" name="pelajaran[]" id="pelajaran[]" value="<?php echo "$pelajarannama"; ?>"> -->
						<!-- <input type="hidden" name="jenis[]" id="jenis[]" value="<?php echo "$jenisnama"; ?>"> -->
						<!-- <input type="hidden" name="tahun[]" id="tahun[]" value="<?php echo "$tahunnama"; ?>"> -->
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