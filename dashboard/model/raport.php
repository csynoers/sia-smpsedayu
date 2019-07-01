<div class="row">
	<div class="col-md-12">		 				
		<?php 
			if (isset($_GET['create'])) {
				if ($_GET['create'] == 'Raport') {
					include('view/create_raport.php');
					require_once('controller/create.php');
				}
			}elseif (isset($_GET['tampil'])) {
				if ($_GET['tampil'] == 'Raport') {
					include('view/tampil_raport.php');
					include('controller/delete.php');
				}elseif ($_GET['tampil'] == 'DetailRaport') {
					include('view/tampil_detail_raport.php');
					include('controller/delete.php');
				}
			}elseif (isset($_GET['edit-raport'])) {
				include('controller/edit.php');
				include('view/edit_nilai_raport.php');
			}else {
		?>

				<div class="large-9 columns">
					<a href="?nilai=Raport&&create=Raport">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-pencil"></span></h1>
							Input Nilai Raport
						</div>
					</a>
					<a href="?nilai=Raport&&tampil=DetailRaport">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-search"></span></h1>
							Cari Nilai MaPel
						</div>
					</a>
					<a href="?nilai=Raport&&tampil=Raport">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-search"></span></h1>
							Cari Nilai Raport
						</div>
					</a>
					<a href="?nilai=Kirim">
						<div class="button radius large bg-blue round" style="margin:10px">
							<h1><span class="fontello-mail"></span></h1>
							Kirim Nilai Raport
						</div>
					</a>
				</div>	
		<?php
			}
		?>										
	</div>
</div>