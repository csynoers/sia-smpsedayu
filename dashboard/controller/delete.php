<?php 

	if (isset($_GET['admin-delete'])) {
		$id			=	$_GET['admin-delete'];

		$delete 	=	mysql_query("DELETE FROM users WHERE users_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?users=admin '/>";
		}
	}elseif (isset($_GET['guru-delete'])) {
		$id			=	$_GET['guru-delete'];

		$delete 	=	mysql_query("DELETE FROM users WHERE users_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?users=guru '/>";
		}
	}elseif (isset($_GET['siswa-delete'])) {
		$id			=	$_GET['siswa-delete'];

		$delete 	=	mysql_query("DELETE FROM users WHERE users_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?users=siswa '/>";
		}
	}elseif (isset($_GET['kelas-delete'])) {
		$id			=	$_GET['kelas-delete'];

		$delete 	=	mysql_query("DELETE FROM kelas WHERE kelas_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=kelas '/>";
		}
	}elseif (isset($_GET['semester-delete'])) {
		$id			=	$_GET['semester-delete'];

		$delete 	=	mysql_query("DELETE FROM semester WHERE semester_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=semester '/>";
		}
	}elseif (isset($_GET['tahun-delete'])) {
		$id			=	$_GET['tahun-delete'];

		$delete 	=	mysql_query("DELETE FROM tahun WHERE tahun_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=tahun '/>";
		}
	}elseif (isset($_GET['pelajaran-delete'])) {
		$id			=	$_GET['pelajaran-delete'];

		$delete 	=	mysql_query("DELETE FROM pelajaran WHERE pelajaran_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=pelajaran '/>";
		}
	}elseif (isset($_GET['sekolah-delete'])) {
		$id			=	$_GET['sekolah-delete'];

		$delete 	=	mysql_query("DELETE FROM sekolah WHERE sekolah_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=sekolah '/>";
		}
	}elseif (isset($_GET['modul-delete'])) {
		$id			=	$_GET['modul-delete'];

		$delete 	=	mysql_query("DELETE FROM modul WHERE id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?modul=download '/>";
		}
	}elseif (isset($_GET['instruksi-delete'])) {
		$id			=	$_GET['instruksi-delete'];

		$delete 	=	mysql_query("DELETE FROM instgs WHERE instgs_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?instruksi=tampil_instruksi '/>";
		}
	}elseif (isset($_GET['jadwal-delete'])) {
		$id			=	$_GET['jadwal-delete'];

		$delete 	=	mysql_query("DELETE FROM jadwal WHERE jadwal_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?jadwal=tampil '/>";
		}
	}elseif (isset($_GET['galeri-delete'])) {
		$id			=	$_GET['galeri-delete'];

		$delete 	=	mysql_query("DELETE FROM galeri WHERE galeri_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=galeri '/>";
		}
	}elseif (isset($_GET['jam-delete'])) {
		$id			=	$_GET['jam-delete'];

		$delete 	=	mysql_query("DELETE FROM jam WHERE jam_id = '$id'");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?akademik=jam '/>";
		}
	}elseif (isset($_GET['del-ulangan1'])) {
		$id	=	$_GET['del-ulangan1'];

		$delete 	=	mysql_query("DELETE FROM nilai WHERE nilai_id = $id");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?nilai=Ulangan1 '/>";
		}
	}elseif (isset($_GET['del-ulangan2'])) {
		$id	=	$_GET['del-ulangan2'];

		$delete 	=	mysql_query("DELETE FROM nilai WHERE nilai_id = $id");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?nilai=Ulangan2 '/>";
		}
	}elseif (isset($_GET['del-ulangan3'])) {
		$id	=	$_GET['del-ulangan3'];

		$delete 	=	mysql_query("DELETE FROM nilai WHERE nilai_id = $id");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?nilai=Ulangan3 '/>";
		}
	}elseif (isset($_GET['del-uts'])) {
		$id	=	$_GET['del-uts'];

		$delete 	=	mysql_query("DELETE FROM nilai WHERE nilai_id = $id");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?nilai=UTS '/>";
		}
	}elseif (isset($_GET['del-uas'])) {
		$id	=	$_GET['del-uas'];

		$delete 	=	mysql_query("DELETE FROM nilai WHERE nilai_id = $id");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?nilai=UAS '/>";
		}
	}elseif (isset($_GET['del-raport'])) {
		$id	=	$_GET['del-raport'];

		$delete 	=	mysql_query("DELETE FROM nilai WHERE nilai_id = $id");
		if ($delete) {
			echo "<meta http-equiv='refresh' content='0;URL= ?nilai=Raport '/>";
		}
	}
	elseif ( isset($_GET['kuis-delete']) ) {
		echo '<pre>';
		print_r($_REQUEST);
		echo '</pre>';
		echo "<script>alert('Data Soal Berhasil Dihapus');</script>";
	}
?>