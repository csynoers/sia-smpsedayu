<div class="row">
	<div class="col-md-12">		 				
		<?php 
			if (isset($_GET['create'])) {
				if ($_GET['create'] == 'nilai-tugas') {
					include('view/create_nilai_tugas.php');
					require_once('controller/create.php');
				}
			}elseif (isset($_GET['tampil'])) {
				if ($_GET['tampil'] == 'nilai-tugas') {
					include('view/tampil_nilai_tugas.php');
					include('controller/delete.php');
				}
			}elseif (isset($_GET['edit-nt'])) {
				include('controller/edit.php');
				include('view/edit_nilai_tugas.php');
			}elseif (isset($_GET['nilai_siswa'])) {
				include('view/nilai_tugas_siswa.php');
			}else {
		?>
			<div class="large-9 columns">
				<a href="?nilai=nilai-tugas&&create=nilai-tugas">
					<div class="button radius large bg-blue round" style="margin:30px">
						<h1><span class="fontello-pencil"></span></h1>
						Input Nilai Tugas
					</div>
				</a>
				<a href="?nilai=nilai-tugas&&tampil=nilai-tugas">
					<div class="button radius large bg-blue round" style="margin:10px">
						<h1><span class="fontello-search"></span></h1>
						Cari Nilai Tugas
					</div>
				</a>	
			</div>			
		<?php
			}
		?>										
	</div>
</div>