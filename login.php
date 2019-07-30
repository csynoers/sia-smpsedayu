<!-- Begin Login Proses -->
<?php
	require_once 'config/db.php';
	//Login Proses
	if(isset($_POST['signin'])){
		$user 		= 	$_POST['username'];
		$pass 		= 	md5($_POST['password']);
		$hasil 		= 	mysql_query("SELECT * FROM users WHERE users_username='$user' AND users_password='$pass'");
		$data 		= 	mysql_fetch_assoc($hasil);
		$id 		= 	$data['users_id'];
		$username 	= 	$data['users_username'];
		$password 	= 	$data['users_password'];
		$nama 		= 	$data['users_nama'];
		$level 		= 	$data['users_level'];
		$kelas 		=	$data['kelas_id'];
		$noinduk	= 	$data['users_noinduk'];
		print_r($_REQUEST);
		die();
		if($user==$username && $pass=$password){
			session_start();
			$_SESSION['id']			=	$id;
			$_SESSION['username']	=	$username;
			$_SESSION['nama']		=	$nama;
			$_SESSION['level']		=	$level;
			$_SESSION['kelas']		=	$kelas;
			$_SESSION['noinduk']	=	$noinduk;

			header('Location: dashboard/');
		}else {
			header('Location: index.php');
		}
	}
?>
