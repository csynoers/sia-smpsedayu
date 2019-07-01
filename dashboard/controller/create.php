<?php 
		if (isset($_POST['admin-create'])) {
		$nama 		=	$_POST['nama'];
		$username	=	$_POST['username'];
		$password 	=	$_POST['password'];
		$email 		=	$_POST['email'];
		$telp 		=	$_POST['telp'];
		$alamat 	=	$_POST['alamat'];
		$status 	=	$_POST['status'];
		$folder 	= 	'foto';
        $tmp_name 	= 	$_FILES["foto"]["tmp_name"];
        $link 		= 	$folder."/".$_FILES["foto"]["name"];

		//Upload ke folder foto
        move_uploaded_file($tmp_name, $link);

		$admin 		=	mysql_query("INSERT INTO users (`users_id`, `users_noinduk`, `users_nama`, 
									`users_username`, `users_password`, `users_level`, `users_telp`, `users_alamat`, 
									`users_email`, `users_status`, `users_foto`, `kelas_id`) 
									VALUES (NULL, NULL, '$nama', '$username', '$password', 'admin', '$telp', '$alamat', '$email', '$status', '$link', NULL)");

		if ($admin) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?users=admin'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?users=admin'>";
		}
	}
?>

<?php 
	if (isset($_POST['guru-create'])) {
		$noinduk 	=	$_POST['noinduk'];
		$nama 		=	$_POST['nama'];
		$username	=	$_POST['username'];
		$password 	=	$_POST['password'];
		$email 		=	$_POST['email'];
		$telp 		=	$_POST['telp'];
		$alamat 	=	$_POST['alamat'];
		$status 	=	$_POST['status'];
		$gambar=$_FILES['gambar']['name'];
		$file=$_FILES['gambar'];
		$file_name=explode(".", $file['name']);
		$file_extension=$file_name[count($file_name)-1];
		$namabaru=$noinduk.'_'.$nama.'.'.$file_extension;
		if(strlen($gambar)>0){
		if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
		move_uploaded_file($_FILES['gambar']
		['tmp_name'],"img/".$namabaru);
		} }
		
		//Upload ke folder foto
        move_uploaded_file($tmp_name, $link);

		$guru 		=	mysql_query("INSERT INTO users (`users_id`, `users_noinduk`, `users_nama`, 
									`users_username`, `users_password`, `users_level`, `users_telp`, `users_alamat`, 
									`users_email`, `users_status`,`users_foto`,`kelas_id`) 
									VALUES (NULL, '$noinduk', '$nama', '$username', '$password', 'guru', '$telp', '$alamat', '$email', '$status','$namabaru',  NULL)");

		if ($guru) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?users=guru'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?users=guru'>";
		}
	}

?>

<?php 

if (isset($_POST['siswa-create'])) {
$noinduk 	=	$_POST['noinduk'];
$nama 		=	$_POST['nama'];
$username	=	$_POST['username'];
$password 	=	$_POST['password'];
$email 		=	$_POST['email'];
$telp 		=	$_POST['telp'];
$alamat 	=	$_POST['alamat'];
$status 	=	$_POST['status'];
$kelas 	 	=	$_POST['kelas'];

//Upload ke folder foto
move_uploaded_file($tmp_name, $link);

$siswa 		=	mysql_query("INSERT INTO users (`users_id`, `users_noinduk`, `users_nama`, 
`users_username`, `users_password`, `users_level`, `users_telp`, `users_alamat`, 
`users_email`, `users_status`, `kelas_id`) 
VALUES (NULL, '$noinduk', '$nama', '$username', '$password', 'siswa', '$telp', '$alamat', '$email', '$status',  '$kelas')");

		if ($siswa) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?users=siswa'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?users=siswa'>";
		}
	}
?>

<?php 
	$cekdulu= "select * from kelas where kelas_nama='$_POST[nama]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
	$prosescek= mysql_query($cekdulu);
	if (isset($_POST['kelas-create'])) {
		if (mysql_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    echo "<script>alert('Kelas Sudah Ada');history.go(-1) </script>";
	}else {
		
		$kls= $_POST['nama'];
		$kelas 		=	mysql_query("INSERT INTO kelas (`kelas_id`, `kelas_nama`) 
									VALUES ('NULL', '$kls')");}

		if ($kelas) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=kelas'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=kelas'>";
		}
	}
?>

<?php 
	
	if (isset($_POST['jam-create'])) {
		$nama 		=	$_POST['nama'];

		$jam 		=	mysql_query("INSERT INTO jam (`jam_id`, `jam_nama`) 
									VALUES (NULL, '$nama')");

		if ($jam) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=jam'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=jam'>";
		}
	}
?>

<?php 
		if (isset($_POST['pelajaran-create'])) {
		$mapel 		=$_POST['mapel'];
		$gupel		=$_POST['gupel'];
		$kepel		=$_POST['kepel'];

		$pelajaran 	=	mysql_query("INSERT INTO pelajaran VALUES (NULL, '$mapel','$gupel', $kepel)");

		if ($pelajaran) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=pelajaran'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=pelajaran'>";
		}
	}
?>

<?php 
	
	if (isset($_POST['semester-create'])) {
		$nama 		=	$_POST['nama'];

		$semester 	=	mysql_query("INSERT INTO semester (`semester_id`, `semester_nama`) 
									VALUES (NULL, '$nama')");

		if ($semester) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=semester'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=semester'>";
		}
	}
?>

<?php 
	
	if (isset($_POST['tahun-create'])) {
		$nama 		=	$_POST['nama'];
		$tahun 	 	=	mysql_query("INSERT INTO tahun (`tahun_id`, `tahun_nama`) 
									VALUES (NULL, '$nama')");
		if ($tahun) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=tahun'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=tahun'>";
		}
	}
?>

<?php 
	
	if (isset($_POST['sekolah-create'])) {
		$nama 		=	$_POST['nama'];
		$telp 		=	$_POST['telp'];
		$alamat		=	$_POST['alamat'];
		$akreditasi	=	$_POST['akreditasi'];

		$sekolah	=	mysql_query("INSERT INTO sekolah (`sekolah_id`, `sekolah_nama`, `sekolah_telp`, `sekolah_alamat`, `sekolah_akreditasi`) 
									VALUES (NULL, '$nama', '$telp', '$alamat', '$akreditasi')");

		if ($sekolah) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=sekolah'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=sekolah'>";
		}
	}
?>

<?php 
	//Upload Materi
	if(isset($_POST['upload'])){
        $allowed_ext    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
        $file_name      = $_FILES['file']['name'];
        $file_ext       = strtolower(end(explode('.', $file_name)));
        $file_size      = $_FILES['file']['size'];
        $file_tmp       = $_FILES['file']['tmp_name'];
        
        $nama           = $_POST['nama'];
        $username       = $_POST['username'];
        $pelajaran 		= $_POST['pelajaran'];
        $tgl            = date("Y-m-d");
        
        if(in_array($file_ext, $allowed_ext) === true){
            if($file_size < 20440700){
                $lokasi = 'files/'.$nama.'.'.$file_ext;
                move_uploaded_file($file_tmp, $lokasi);
                $in = mysql_query("INSERT INTO modul VALUES(NULL, '$tgl', '$nama','$pelajaran', '$file_ext', '$file_size', '$lokasi','Belum Valid','$username')");
                if($in){
                	echo "
						<div class='large-12 columns'>
							<div class='box bg-light-green'>
								<div class='box-header bg-light-green'>
									<div class='pull-right box-tools'>
										<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
									</div>
									<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
										<span class='text-white'>SUCCESS</span>
									</h3>
								</div>
								<div class='box-body ' style='display: block;'>
									<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
								</div>
							</div>
						</div>";
                    echo "<meta http-equiv='refresh' content='0;URL= ?modul=download '/>";
                }else{
                    echo "
						<div class='large-12 columns'>
							<div class='box bg-light-yellow'>
								<div class='box-header bg-light-yellow'>
									<div class='pull-right box-tools'>
										<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
									</div>
									<h3 class='box-title '><i class='text-white  fontello-warning'></i>
										<span class='text-white'>Warning</span>
									</h3>
								</div>
								<div class='box-body ' style='display: block;'>
									<p class='text-white'><strong>Warning!</strong> Data Gagal Di Upload.</p>
								</div>
							</div>
						</div>";
                }
            }else{
                echo "
				<div class='large-12 columns'>
					<div class='box bg-light-yellow'>
						<div class='box-header bg-light-yellow'>
							<div class='pull-right box-tools'>
								<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
							</div>
							<h3 class='box-title '><i class='text-white  fontello-warning'></i>
								<span class='text-white'>Warning</span>
							</h3>
						</div>
						<div class='box-body ' style='display: block;'>
							<p class='text-white'><strong>Warning!</strong> Ukuran File Terlalu Besar !</p>
						</div>
					</div>
				</div>";
            }
        }else{
            echo "
				<div class='large-12 columns'>
					<div class='box bg-light-yellow'>
						<div class='box-header bg-light-yellow'>
							<div class='pull-right box-tools'>
								<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
							</div>
							<h3 class='box-title '><i class='text-white  fontello-warning'></i>
								<span class='text-white'>Warning</span>
							</h3>
						</div>
						<div class='box-body ' style='display: block;'>
							<p class='text-white'><strong>Warning!</strong> Tipe File Tidak Di Izinkan !</p>
						</div>
					</div>
				</div>";
        }
    }
?>


<?php 

	if(isset($_POST['upload_instgs'])){
        $judul			= $_POST['judul'];
        $pelajaran 		= $_POST['pelajaran'];
        $info           = $_POST['info'];
        $username       = $_POST['username'];
        $kls 			= $_POST['kelas'];
        $tgl            = date("Y-m-d");
        $tgl_selesai    = $_POST['tgl_selesai'];

		$instgs 	=	mysql_query("INSERT INTO instgs VALUES(NULL, '$judul', '$pelajaran', '$tgl','$tgl_selesai' ,'$username', '$info', '$kls')");

		if ($instgs) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?instruksi=tampil_instruksi'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?instruksi=tampil_instruksi'>";
		}
	}
?>


<?php 

	if(isset($_POST['upload_topik'])){
        $judul			= $_POST['judul']  ;
        $pelajaran 		= $_POST['pelajaran'];
        $kelas          = $_POST['kelas'];
        $username       = $_POST['username'];
        $info			= $_POST['info'];
        $tgl            = date("Y-m-d");
		$tgl_selesai	= $_POST['tgl_selesai'];
		$jam			= $_POST['jam'];
		$menit			= $_POST['menit'];
		$detik			= $_POST['detik'];

		$instgs 	=	mysql_query("INSERT INTO topik_kuis VALUES(NULL, '$judul','$kelas', '$pelajaran', '$tgl' ,'$tgl_selesai','$jam','$menit','$detik','$username', '$info')");

		if ($instgs) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?kuis=tampil_topik'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?kuis=tampil_topik'>";
		}
	}
?>



<?php 

	if(isset($_POST['upload_soal'])){
        $idpel		=$_POST['pelajaran_id'];
        $soal 		= $_POST['soal'];
        $jaw1 		= $_POST['pil_a'];
        $jaw2 		= $_POST['pil_b'];
        $jaw3 		= $_POST['pil_c'];
        $jaw4 		= $_POST['pil_d'];
        $kunci      = $_POST['kunci'];
        $users_id 		=$_POST['users_id'];
        $kelas_id 		=$_POST['kelas_id'];
      	$id_topik 		= $_POST['id_topik'];
        $s 	=	mysql_query("INSERT INTO kuis VALUES (NULL, '$idpel', '$soal', '$jaw1', '$jaw2', '$jaw3', '$jaw4', '$kunci', '$users_id', '$kelas_id', '$id_topik');");

		if ($s) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?soal=tampil_soal&idpel=$idpel&idkel=$kelas_id&idtopik=$id_topik'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?soal=tampil_soal&idpel=$pelajaran_id&idkel=$kelas_id&idtopik=$id_topik'>";
		}
	}
?>





<?php 
	//Upload Tugas
	if(isset($_POST['upload_tugas'])){
        $allowed_ext    = array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip');
        $file_name      = $_FILES['file']['name'];
        $file_ext       = strtolower(end(explode('.', $file_name)));
        $file_size      = $_FILES['file']['size'];
        $file_tmp       = $_FILES['file']['tmp_name'];
        $kls 			=$_POST ['kepel'];
        $judul           = $_POST['nama'];
        $siswa 		= $_POST['username'];
        $pelajaran 		= $_POST['pelajaran'];
        $tgl            = date("Y-m-d");
        $id = $_POST['id'];
        
        if(in_array($file_ext, $allowed_ext) === true){
            if($file_size < 20440700){
                $lokasi = 'files/'.$judul.'.'.$file_ext;
                move_uploaded_file($file_tmp, $lokasi);
                $in = mysql_query("INSERT INTO tugas VALUES(NULL, '$judul', '$pelajaran', '$siswa', '$tgl', '$lokasi','$kls')");
                if($in){
                	echo "
						<div class='large-12 columns'>
							<div class='box bg-light-green'>
								<div class='box-header bg-light-green'>
									<div class='pull-right box-tools'>
										<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
									</div>
									<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
										<span class='text-white'>SUCCESS</span>
									</h3>
								</div>
								<div class='box-body ' style='display: block;'>
									<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
								</div>
							</div>
						</div>";
                    echo "<meta http-equiv='refresh' content='0;URL= ?tugas=download_tugas '/>";
                }else{
                    echo "
						<div class='large-12 columns'>
							<div class='box bg-light-yellow'>
								<div class='box-header bg-light-yellow'>
									<div class='pull-right box-tools'>
										<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
									</div>
									<h3 class='box-title '><i class='text-white  fontello-warning'></i>
										<span class='text-white'>Warning</span>
									</h3>
								</div>
								<div class='box-body ' style='display: block;'>
									<p class='text-white'><strong>Warning!</strong> Data Gagal Di Upload.</p>
								</div>
							</div>
						</div>";
                }
            }else{
                echo "
				<div class='large-12 columns'>
					<div class='box bg-light-yellow'>
						<div class='box-header bg-light-yellow'>
							<div class='pull-right box-tools'>
								<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
							</div>
							<h3 class='box-title '><i class='text-white  fontello-warning'></i>
								<span class='text-white'>Warning</span>
							</h3>
						</div>
						<div class='box-body ' style='display: block;'>
							<p class='text-white'><strong>Warning!</strong> Ukuran File Terlalu Besar !</p>
						</div>
					</div>
				</div>";
            }
        }else{
            echo "
				<div class='large-12 columns'>
					<div class='box bg-light-yellow'>
						<div class='box-header bg-light-yellow'>
							<div class='pull-right box-tools'>
								<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
							</div>
							<h3 class='box-title '><i class='text-white  fontello-warning'></i>
								<span class='text-white'>Warning</span>
							</h3>
						</div>
						<div class='box-body ' style='display: block;'>
							<p class='text-white'><strong>Warning!</strong> Tipe File Tidak Di Izinkan !</p>
						</div>
					</div>
				</div>";
        }
    }
?>


<?php 

	if (isset($_POST['jadwal-create'])) {
		$hari 		=	$_POST['hari'];
		$jam 		=	$_POST['jam'];
		$pelajaran  =	$_POST['pelajaran'];
		$kelas 		=	$_POST['kelas'];

		$jadwal 	=	mysql_query("INSERT INTO jadwal (`jadwal_id`, `jadwal_hari`, `jam_id`, `pelajaran_id`, `kelas_id`) 
									VALUES (NULL, '$hari', '$jam', '$pelajaran', '$kelas')");

		if ($jadwal) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?jadwal=tambah'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?jadwal=tambah'>";
		}
	}
?>

<?php 
	
	if (isset($_POST['galeri-create'])) {
		$nama 		=	$_POST['nama'];
		$folder 	= 	'galeri';
        $tmp_name 	= 	$_FILES["foto"]["tmp_name"];
        $link 		= 	$folder."/".$_FILES["foto"]["name"];

		//Upload ke folder foto
        move_uploaded_file($tmp_name, $link);

		$galeri 		=	mysql_query("INSERT INTO galeri (`galeri_id`, `galeri_nama`, `galeri_link`) 
									VALUES (NULL, '$nama', '$link')");

		if ($galeri) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=galeri'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='1;URL=?akademik=galeri'>";
		}
	}

	if (isset($_POST['nilai-tugas-create'])) {
	$siswa 		=	$_POST['users'];
	$pelajaran	=	$_POST['pelajaran'];
	$jenis 		=	$_POST['jenis'];
	$tahun 		=	$_POST['tahun'];
	$nilaipoin	=	$_POST['nilai'];
	$jumlahdata =	count($siswa);

	for($x=0;$x<$jumlahdata;$x++) {
			$tugas	=	mysql_query("INSERT INTO nilai
										VALUES (NULL, '$siswa[$x]', '$pelajaran[$x]', '$jenis[$x]', '$tahun[$x]', '$nilaipoin[$x]')");	
	
	if ($tugas) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='0;URL=?nilai=nilai-tugas'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' >";
		}
	}
}
		
?>

<?php

	if (isset($_POST['uh2-proses'])) {
	$siswa 		=	$_POST['users'];
	$pelajaran	=	$_POST['pelajaran'];
	$semester 	=	$_POST['semester'];
	$jenis 		=	$_POST['jenis'];
	$tahun 		=	$_POST['tahun'];
	$nilaipoin	=	$_POST['nilai'];
	$jumlahdata =	count($siswa);

	for($x=0;$x<$jumlahdata;$x++) {
			$ulangan2	=	mysql_query("INSERT INTO nilai(nilai_id, users_id, pelajaran_id, semester_id, jenis_id, tahun_id, nilai_poin) 
										VALUES (NULL, '$siswa[$x]', '$pelajaran[$x]', '$semester[$x]', '$jenis[$x]', '$tahun[$x]', '$nilaipoin[$x]')");	
	
	if ($ulangan2) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='0;URL=?nilai=Ulangan2'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh'>";
		}
	}
}
		
?>

<?php

	if (isset($_POST['uh3-proses'])) {
	$siswa 		=	$_POST['users'];
	$pelajaran	=	$_POST['pelajaran'];
	$semester 	=	$_POST['semester'];
	$jenis 		=	$_POST['jenis'];
	$tahun 		=	$_POST['tahun'];
	$nilaipoin	=	$_POST['nilai'];
	$jumlahdata =	count($siswa);

	for($x=0;$x<$jumlahdata;$x++) {
			$ulangan3	=	mysql_query("INSERT INTO nilai(nilai_id, users_id, pelajaran_id, semester_id, jenis_id, tahun_id, nilai_poin) 
										VALUES (NULL, '$siswa[$x]', '$pelajaran[$x]', '$semester[$x]', '$jenis[$x]', '$tahun[$x]', '$nilaipoin[$x]')");	
	
	if ($ulangan3) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='0;URL=?nilai=Ulangan3'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' >";
		}
	}
}
		
?>

<?php

	if (isset($_POST['uts-proses'])) {
	$siswa 		=	$_POST['users'];
	$pelajaran	=	$_POST['pelajaran'];
	$semester 	=	$_POST['semester'];
	$jenis 		=	$_POST['jenis'];
	$tahun 		=	$_POST['tahun'];
	$nilaipoin	=	$_POST['nilai'];
	$jumlahdata =	count($siswa);

	for($x=0;$x<$jumlahdata;$x++) {
			$uts	=	mysql_query("INSERT INTO nilai(nilai_id, users_id, pelajaran_id, semester_id, jenis_id, tahun_id, nilai_poin) 
										VALUES (NULL, '$siswa[$x]', '$pelajaran[$x]', '$semester[$x]', '$jenis[$x]', '$tahun[$x]', '$nilaipoin[$x]')");	
	
	if ($uts) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='0;URL=?nilai=UTS'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' >";
		}
	}
}
		
?>

<?php


if (isset($_POST['uas-proses'])) {
	$siswa 		=	$_POST['users'];
	$pelajaran	=	$_POST['pelajaran'];
	$semester 	=	$_POST['semester'];
	$jenis 		=	$_POST['jenis'];
	$tahun 		=	$_POST['tahun'];
	$nilaipoin	=	$_POST['nilai'];
	$jumlahdata =	count($siswa);

	for($x=0;$x<$jumlahdata;$x++) {
			$uas	=	mysql_query("INSERT INTO nilai(nilai_id, users_id, pelajaran_id, semester_id, jenis_id, tahun_id, nilai_poin) 
										VALUES (NULL, '$siswa[$x]', '$pelajaran[$x]', '$semester[$x]', '$jenis[$x]', '$tahun[$x]', '$nilaipoin[$x]')");	
	
	if ($uas) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='0;URL=?nilai=UAS'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' >";
		}
	}
}
		
?>

<?php


if (isset($_POST['raport-proses'])) {
	$siswa 		=	$_POST['users'];
	$pelajaran	=	$_POST['pelajaran'];
	$semester 	=	$_POST['semester'];
	$jenis 		=	$_POST['jenis'];
	$tahun 		=	$_POST['tahun'];
	$nilaipoin	=	$_POST['nilai'];
	$jumlahdata =	count($siswa);

	for($x=0;$x<$jumlahdata;$x++) {
			$uas	=	mysql_query("INSERT INTO nilai(nilai_id, users_id, pelajaran_id, semester_id, jenis_id, tahun_id, nilai_poin) 
										VALUES (NULL, '$siswa[$x]', '$pelajaran[$x]', '$semester[$x]', '$jenis[$x]', '$tahun[$x]', '$nilaipoin[$x]')");	
	
	if ($uas) {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-green'>
					<div class='box-header bg-light-green'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  icon-thumbs-up'></i>
							<span class='text-white'>SUCCESS</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Well done!</strong> You successfully read this important alert message.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' content='0;URL=?nilai=Raport'>";
		}else {
			echo "
			<div class='large-12 columns'>
				<div class='box bg-light-yellow'>
					<div class='box-header bg-light-yellow'>
						<div class='pull-right box-tools'>
							<span class='box-btn' data-widget='remove'><i class='icon-cross'></i></span>
						</div>
						<h3 class='box-title '><i class='text-white  fontello-warning'></i>
							<span class='text-white'>Warning</span>
						</h3>
					</div>
					<div class='box-body ' style='display: block;'>
						<p class='text-white'><strong>Warning!</strong> Best check yo self, you're not looking too good.</p>
					</div>
				</div>
			</div>";
			echo "<meta http-equiv='refresh' >";
		}
	}
}
		
?>

<?php

?>