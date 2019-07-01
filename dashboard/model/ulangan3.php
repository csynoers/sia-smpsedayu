<div class="row">
	<div class="col-md-12">		 				
		<?php 
			if (isset($_GET['create'])) {
				if ($_GET['create'] == 'Ulangan3') {
					include('view/create_ulangan3.php');
					require_once('controller/create.php');
				}
			}elseif (isset($_GET['tampil'])) {
				if ($_GET['tampil'] == 'Ulangan3') {
					include('view/tampil_uh3.php');
					include('controller/delete.php');
				}
			}elseif (isset($_GET['edit-ulangan3'])) {
				include('controller/edit.php');
				include('view/edit_nilai_uh3.php');
			}else {
		?>
				<div class="large-9 columns">
					<a href="?nilai=Ulangan3&&create=Ulangan3">
						<div class="button radius large bg-blue round" style="margin:30px">
							<h1><span class="fontello-pencil"></span></h1>
							Input Nilai Ulangan 3
						</div>
					</a>
					<a href="?nilai=Ulangan3&&tampil=Ulangan3">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-search"></span></h1>
							Cari Nilai Ulangan 3
						</div>
					</a>
				</div>				
		<?php
			}
		?>										
	</div>
</div>