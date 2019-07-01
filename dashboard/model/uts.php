<div class="row">
	<div class="col-md-12">		 				
		<?php 
			if (isset($_GET['create'])) {
				if ($_GET['create'] == 'UTS') {
					include('view/create_uts.php');
					require_once('controller/create.php');
				}
			}elseif (isset($_GET['tampil'])) {
				if ($_GET['tampil'] == 'UTS') {
					include('view/tampil_uts.php');
					include('controller/delete.php');
				}
			}elseif (isset($_GET['edit-uts'])) {
				include('controller/edit.php');
				include('view/edit_nilai_uts.php');
			}else {
		?>
				<div class="large-9 columns">
					<a href="?nilai=UTS&&create=UTS">
						<div class="button radius large bg-blue round" style="margin:30px">
							<h1><span class="fontello-pencil"></span></h1>
							Input Nilai UTS
						</div>
					</a>
					<a href="?nilai=UTS&&tampil=UTS">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-search"></span></h1>
							Cari Nilai UTS
						</div>
					</a>
				</div>			
		<?php
			}
		?>										
	</div>
</div>