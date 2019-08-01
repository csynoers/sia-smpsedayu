<?php 
	if (isset($_GET['users'])) {
		if ($_GET['users'] == 'admin') {
			include 'model/admin.php';
		}elseif ($_GET['users'] == 'admin-create') {
			include 'controller/create.php';
			include 'view/admin_create.php';
		}

		elseif ($_GET['users'] == 'guru') {
			include 'model/guru.php';
		}elseif ($_GET['users'] == 'guru-create') {	
			// include 'controller/create.php';
			include 'view/guru_create.php';
		}

		elseif ($_GET['users'] == 'siswa') {
			include 'model/siswa.php';
		}elseif ($_GET['users'] == 'siswa-create') {
			include 'controller/create.php';
			include 'view/siswa_create.php';
		}

		elseif ($_GET['users'] == 'swedit') {
			include 'view/swedit.php';
		}elseif ($_GET['users'] == 'siswa-create') {
			include 'controller/create.php';
			include 'view/siswa_create.php';
		}
		elseif ($_GET['users'] == 'awedit') {
			include 'view/uadmin_edit.php';
		}
	}elseif (isset($_GET['admin-edit'])) {		
		include 'controller/edit.php';
		include 'view/admin_edit.php';
	}elseif (isset($_GET['admin-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['guru-edit'])) {
		include 'controller/edit.php';
		include 'view/guru_edit.php';
	}elseif (isset($_GET['guru-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['siswa-edit'])) {
		include 'controller/edit.php';
		include 'view/siswa_edit.php';
	}elseif (isset($_GET['siswa-delete'])) {
		include 'controller/delete.php';
	}
		elseif (isset($_GET['akademik'])) {
		if ($_GET['akademik'] == 'kelas') {
			include 'model/kelas.php';
		}elseif ($_GET['akademik'] == 'kelas-create') {
			include 'controller/create.php';
			include 'view/kelas_create.php';
		}elseif ($_GET['akademik'] == 'tahun') {
			include 'model/tahun.php';
		}elseif ($_GET['akademik'] == 'tahun-create') {
			include 'controller/create.php';
			include 'view/tahun_create.php';
		}elseif ($_GET['akademik'] == 'pelajaran') {
			include 'model/pelajaran.php';
		}elseif ($_GET['akademik'] == 'pelajaran-create') {
			include 'controller/create.php';
			include 'view/pelajaran_create.php';
		}elseif ($_GET['akademik'] == 'sekolah') {
			include 'model/sekolah.php';
		}elseif ($_GET['akademik'] == 'sekolah-create') {
			include 'controller/create.php';
			include 'view/sekolah_create.php';
		}elseif ($_GET['akademik'] == 'galeri') {
			include 'model/galeri.php';
		}elseif ($_GET['akademik'] == 'galeri-create') {
			include 'controller/create.php';
			include 'view/galeri_create.php';
		}elseif ($_GET['akademik'] == 'jam') {
			include 'model/jam.php';
		}elseif ($_GET['akademik'] == 'jam-create') {
			include 'controller/create.php';
			include 'view/jam_create.php';
		}
	}

	elseif (isset($_GET['jam-edit'])) {
		include 'controller/edit.php';
		include 'view/jam_edit.php';
	}elseif (isset($_GET['jam-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['kelas-edit'])) {
		include 'controller/edit.php';
		include 'view/kelas_edit.php';
	}elseif (isset($_GET['kelas-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['semester-edit'])) {
		include 'controller/edit.php';
		include 'view/semester_edit.php';
	}elseif (isset($_GET['semester-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['tahun-edit'])) {
		include 'controller/edit.php';
		include 'view/tahun_edit.php';
	}elseif (isset($_GET['tahun-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['pelajaran-edit'])) {
		include 'controller/edit.php';
		include 'view/pelajaran_edit.php';
	}elseif (isset($_GET['pelajaran-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['sekolah-edit'])) {
		include 'controller/edit.php';
		include 'view/sekolah_edit.php';
	}elseif (isset($_GET['sekolah-delete'])) {
		include 'controller/delete.php';
	}elseif (isset($_GET['galeri-delete'])) {
		include 'controller/delete.php';
	}
		elseif (isset($_GET['modul'])) {
		if ($_GET['modul'] == 'download') {
			include 'model/download.php';
		}elseif ($_GET['modul'] == 'upload') {
			include 'controller/create.php';
			include 'view/upload.php';
		}
	}elseif (isset($_GET['modul-edit'])) {
		include 'controller/edit.php';
		include 'view/modul_edit.php';
	}elseif (isset($_GET['modul-validasi'])) {
		include 'controller/edit.php';
		include 'view/modul_validasi.php';
	}elseif (isset($_GET['modul-delete'])) {
		include 'controller/delete.php';
	}


		elseif (isset($_GET['instruksi'])) {
		if ($_GET['instruksi'] == 'tampil_instruksi') {
			include 'view/tampil_instruksi.php';
		}elseif ($_GET['instruksi'] == 'upload_instgs') {
			include 'controller/create.php';
			include 'view/upload_inst_tugas.php';
		}
		elseif ($_GET['instruksi'] == 'lihat_instruksi') {
			include 'view/lihat_instruksi.php';
		}
	}elseif (isset($_GET['instruksi-edit'])) {
		include 'controller/edit.php';
		include 'view/edit_instruksi.php';
	}elseif (isset($_GET['instruksi-delete'])) {
		include 'controller/delete.php';
	}



	elseif (isset($_GET['tugas'])) {
		if ($_GET['tugas'] == 'download_tugas') {
			include 'model/download_tugas.php';
		}elseif ($_GET['tugas'] == 'upload_tugas') {
			include 'controller/create.php';
			include 'view/upload_tugas.php';
		}
	}elseif (isset($_GET['tugas-edit'])) {
		include 'controller/edit.php';
		include 'view/tugas_edit.php';
	}elseif (isset($_GET['tugas-delete'])) {
		include 'controller/delete.php';
	}


	elseif (isset($_GET['kuis'])) {
		if ($_GET['kuis'] == 'tampil_topik') {
			include 'view/tampil_topik.php';
	}

	elseif ($_GET['kuis'] == 'tambah_topik') {
		include 'controller/create.php';
		include 'view/upload_topik.php';
	}
		

	elseif ($_GET['kuis'] == 'tampil_soal') {
		// echo 'tampil soal 1';
		include 'view/tampil_soal.php';
	}
	elseif ($_GET['kuis'] == 'soal_siswa') {
		include 'view/soal_siswa.php';
	}

	elseif ($_GET['kuis'] == 'tambah_kuis') {
		include 'view/tambah_kuis.php';
	}
	}elseif (isset($_GET['kuis-edit'])) {
		echo '1';
		include 'controller/edit.php';
		include 'view/edit_kuis.php';
	}elseif (isset($_GET['kuis-delete'])) {
		// echo 'kuis delete 2';
		include 'controller/delete.php';
	} 

	elseif ($_GET ['kuis']=='topik-siswa') {
		include 'view/topik_kuis_siswa.php';
	}


elseif (isset($_GET['soal'])) {
		if ($_GET['soal'] == 'tampil_soal') {
			// echo 'tampil soal 2';
			include 'view/tampil_soal.php';
		}elseif ($_GET['soal'] == 'tambah_soal') {
			include 'controller/create.php';
			include 'view/tambah_soal.php';
		}
		elseif ($_GET['kuis'] == 'tampil_soal') {
			// echo 'tampil soal 3';
			include 'view/tampil_soal.php';
		}
		elseif ($_GET['soal'] == 'tambah_soal') {
			include 'view/tambah_soal.php';
		}
	}elseif (isset($_GET['kuis-edit'])) {
		// echo '2';
		include 'controller/edit.php';
		include 'view/soal_edit.php';
	}elseif (isset($_GET['kuis-delete'])) {
		// echo 'kuis-delete 1';
		include 'controller/delete.php';
	}


	elseif (isset($_GET['nilai'])) {
		if ($_GET['nilai'] == 'nilai-tugas') {
			include 'model/nilai_tugas.php';
		}elseif ($_GET['nilai'] == 'nilai_quis') {
			include('model/nilai_quis.php');
		}elseif ($_GET['nilai'] == 'Ulangan3') {
			include('model/ulangan3.php');
		}elseif ($_GET['nilai'] == 'UTS') {
			include('model/uts.php');
		}elseif ($_GET['nilai'] == 'UAS') {
			include('model/uas.php');
		}elseif ($_GET['nilai'] == 'Raport') {
			include('model/raport.php');
		}elseif ($_GET['nilai'] == 'Kirim') {
			include('view/kirim_raport.php');
		}elseif ($_GET['nilai'] == 'nilai-siswa') {
			include ('view/nilai_tugas_siswa.php');
		}

	}elseif (isset($_GET['cetak'])) {
		if ($_GET['cetak'] == 'laporan-nilai-siswa') {
			include ('laporan/laporan-siswa.php');
		}elseif ($_GET['cetak'] == 'laporan-nilai-kelas') {
			include('laporan/laporan-kelas.php');
		}elseif ($_GET['cetak'] == 'laporan-nilai-kelas2') {
			include('laporan/laporan-kelas2.php');
		}	

	}elseif (isset($_GET['jadwal'])) {
		if ($_GET['jadwal'] == 'tampil') {
			include('view/jadwal_search.php');
		}elseif ($_GET['jadwal'] == 'tambah') {
			include 'controller/create.php';
			include('view/jadwal_create.php');
		}
	}elseif (isset($_GET['jadwal-edit'])) {
		include 'controller/edit.php';
		include 'view/jadwal_edit.php';
	}elseif (isset($_GET['jadwal-delete'])) {
		include 'controller/delete.php';
	}
	elseif ( isset($_GET['topik-edit']) ) {
		include 'controller/edit.php';
		include 'view/edit_topik.php';
	}elseif (isset($_GET['topik-delete'])) {
		// echo 'kuis delete 2';
		include 'controller/delete.php';
	} 
?>