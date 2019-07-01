<div class="row">
	<div class="col-md-12">		 				
		<?php 
			if (isset($_GET['create'])) {
				if ($_GET['create'] == 'UAS') {
					include('view/create_uas.php');
					require_once('controller/create.php');
				}
			}elseif (isset($_GET['tampil'])) {
				if ($_GET['tampil'] == 'UAS') {
					include('view/tampil_uas.php');
					include('controller/delete.php');
				}
			}elseif (isset($_GET['edit-uas'])) {
				include('controller/edit.php');
				include('view/edit_nilai_uas.php');
			}else {
		?>
				<div class="large-9 columns">
					<a href="?nilai=UAS&&create=UAS">
						<div class="button radius large bg-blue round" style="margin:30px">
							<h1><span class="fontello-pencil"></span></h1>
							Input Nilai UAS
						</div>
					</a>
					<a href="?nilai=UAS&&tampil=UAS">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-search"></span></h1>
							Cari Nilai UAS
						</div>
					</a>
				</div>			
		<?php
			}
		?>										
	</div>
</div>