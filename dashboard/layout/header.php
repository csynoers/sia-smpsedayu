<?php
// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pembelajaran</title>

    <link rel="stylesheet" href="assets/css/foundation.css" />

    <!-- Custom styles for this template -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css"> -->

    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dripicon.css">
    <link rel="stylesheet" href="assets/css/typicons.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/css/theme.css">

    <link href="assets/js/validate/validate.css" rel="stylesheet">
    <link href="assets/js/idealform/css/jquery.idealforms.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/js/date-dropdown/jquery.datetimepicker.css" />

    <!-- pace loader -->
    <script src="assets/js/pace/pace.js"></script>
    <link href="assets/js/pace/themes/orange/pace-theme-flash.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/js/slicknav/slicknav.css" />

    <link rel="stylesheet" href="assets/js/dropZone/downloads/css/dropzone.css" />
    <link href="assets/css/table.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/vendor/modernizr.js"></script>

</head>

<body>
    <!-- preloader -->
   <!--  <div id="preloader">
        <div id="status">&nbsp;</div>
    </div> -->
    <!-- End of preloader -->

    <div class="off-canvas-wrap" data-offcanvas>
        <!-- Right sidemenu -->
            <div id="skin-select">
                <!--      Toggle sidemenu icon button -->
                <a id="toggle">
                    <span class="fa icon-menu"></span>
                </a>
                <!--      End of Toggle sidemenu icon button -->

                <div class="skin-part">
                    <div id="tree-wrap">
                        <!-- Profile -->
                        <div class="profile">
                            <img alt="" class="" src="img/logo.png">
                            <h3><a href="index.php" style="color:#ffffff;"><b>E-learning</b></a></h3>
                        </div>
                        <!-- End of Profile -->
		 <?php 
                //$_SESSION['id']         =   $id;
                $v_user = $_SESSION['id'];
               
                            $no         =   1;
                            $user      =   mysql_query("SELECT * FROM users WHERE users_id = '".$v_user."' ");
                            $row=mysql_fetch_array($user);
                ?>
                        <!-- Menu sidebar begin-->
                        <div class="side-bar">
                            <ul id="menu-showhide" class="topnav slicknav">
							 <?php
                                if ($row['users_nama'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo  "<center><img src='img/$row[users_foto]' width='200' height='100'></center>";
                            ?>
							  <table  class="" style="width:100%">
					
                    <tr>
                        
						
                        <th width="30%">Nama</th>
                        <td>
                            <?php
                                if ($row['users_nama'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_nama'];
                            ?>
                        </td>
                     

                        <!-- 
                      
                        <th>Action</th> -->
                    </tr>
                    <tr>
                       <th>Alamat</th>
                    
                    <td>
                            <?php
                                if ($row['user_alamat'] == NULL) {
                                   
                                }

                                echo $row['users_alamat'];
                            ?>
                        </td>

                     </tr>
                     <tr>
                    <th>Telepon</th>  
                    <td>
                            <?php
                                if ($row['users_telp'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_telp'];
                            ?>
                        </td>  
                    </tr>
                <tr>
                    <th>E-mail</th>
                    <td>
                            <?php
                                if ($row['users_email'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_email'];
                            ?>
                        </td>
                      </tr>
                      <TR>
                      <th>Status</th>
                        <td>
                            <?php
                                if ($row['pelajaran_nama'] == NULL) {
                                    echo "";
                                }

                                echo $row['users_status'];
                            ?>
                        </td>
                    <tr>
                       <td>
                            <a href="?guru-edit=<?php echo $row['users_id']; ?>"><span class="tiny radius fontello-edit button bg-black-solid" >Edit</span> </a>
                       </td>
                    </tr>
                <?php
                            $no++;
                            
                        
                    ?>                    
                </tbody>
                </div>
            </table>
                                <li>
                                        <a id="menu-select" class="tooltip-tip" href="../index.php" title="Dashboard">
                                            <i class="icon-home"></i>
                                            <span>Home</span>
                                        </a>
                                    </li>
                                    
                                    <?php 
                                        if (isset($_SESSION['level'])) {
                                            if ($_SESSION['level'] == 'admin') {
                                    ?>
                                    <li>
                                        <a class="tooltip-tip" href="#">
                                            <i class="fontello-users-outline"></i>
                                            <span>Users</span>
                                        </a>
                                        <ul>
                                            <!-- <li>
                                                <a href="?users=admin"><span class="fontello-user"></span> Admin</a>
                                            </li> -->
                                            <li>
                                                <a href="?users=guru"><span class="fontello-user"></span> Guru</a>
                                            </li>
                                            <li>
                                                <a href="?users=siswa"><span class="fontello-user"></span> Siswa</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#">
                                            <i class="fontello-college"></i>
                                            <span>Akademik</span>
                                        </a>
                                        <ul>
                                            <!-- <li>
                                                <a href="?akademik=jam"><span class="fontello-clock"></span> Jam Pelajaran</a>
                                            </li> -->
                                            <li>
                                                <a href="?akademik=kelas"><span class="fontello-library"></span> Kelas</a>
                                            </li>
                                            <!-- <li>
                                                <a href="?akademik=semester"><span class="fontello-doc-text"></span> Semester</a>
                                            </li> -->
                                            <li>
                                                <a href="?akademik=tahun"><span class="fontello-globe-alt"></span> Tahun Ajaran</a>
                                            </li>
                                            <li>
                                                <a href="?akademik=pelajaran"><span class="fontello-star-filled"></span> Mata Pelajaran</a>
                                            </li>
                                            <!-- <li>
                                                <a href="?akademik=galeri"><span class="fontello-camera"></span> Galeri</a>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <!-- <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-calendar"></i>
                                            <span>Jadwal Pelajaran</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?jadwal=tambah" title="Black Skin"><span class="fontello-plus"></span> Tambah Jadwal</a>
                                            </li>
                                            <li>
                                                <a href="?jadwal=tampil" title="Black Skin"><span class="fontello-search"></span> Tampil Jadwal</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <!-- <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-print"></i>
                                            <span>Modul</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?modul=upload" title="Black Skin"><span class="fontello-upload"></span> Upload</a>
                                            </li>
                                            <li>
                                                <a href="?modul=download" title="White Skin"><span class="fontello-download"></span> Download</a>
                                            </li>
                                            <li>
                                                <a href="?modul=tugas_siswa" title="White Skin"><span class="fontello-download"></span> Tugas Siswa</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-desktop"></i>
                                            <span>Tugas</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?modul=quiz" title="Black Skin"><span class="fontello-doc-text"> Tugas</span></a>
                                            </li>
                                            <li>
                                                <a href="?modul=inst_quiz" title="Black Skin"><span class="fontello-info"> Instruksi Tugas</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-pencil"></i>
                                            <span>Nilai</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?nilai=Ulangan1"><span class="fontello-snow"></span> UH 1</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=Ulangan2"><span class="fontello-snow"></span> UH 2</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=Ulangan3"><span class="fontello-snow"></span> UH 3</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=UTS"><span class="fontello-snow"></span> Ujian Tengah Semester</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=UAS"><span class="fontello-snow"></span> Ujian Akhir Semester</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=Raport"><span class="fontello-snow"></span>Raport</a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    
                                    <?php
                                            }elseif ($_SESSION['level'] == 'guru') {
                                    ?>
									 <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-chat"></i>
                                            <span>Forum</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="../dashboard/chat/chat_guru.php" title="Black Skin"><span class="fontello-chat"></span>Forum</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-desktop"></i>
                                            <span>Materi</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?modul=download" title="Black Skin"><span class="fontello-upload"></span> Upload Materi</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-print"></i>
                                            <span>Tugas</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?instruksi=tampil_instruksi" title="Black Skin"><span class="fontello-upload"></span> Upload Instruksi Tugas</a>
                                            </li>
                                            <li>
                                                <a href="?tugas=download_tugas" title="White Skin"><span class="fontello-download"></span> Download Tugas Siswa</a>
                                            </li>
                                        </ul>
                                    </li>
                                   <!-- Jadwal Pelajaran -->
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-pencil"></i>
                                            <span>Nilai</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?nilai=nilai-tugas"><span class="fontello-snow"></span> Upload Nilai Tugas</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=nilai_quis"><span class="fontello-snow"></span> Nilai Kuis Siswa</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <!-- Print Nilai -->
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-doc"></i>
                                            <span>Kuis</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?kuis=tampil_topik"><span class="fontello-plus">Buat kuis</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                     <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-pencil"></i>
                                            <span>Laporan</span>
                                        </a>
                                        <ul>
                                           <li>
                                                 <a class="tooltip-tip" href="?cetak=laporan-nilai-kelas"><span class="fontello-plus">Nilai Tugas</span></a>

                                            </li>
                                            
                                            <li>
                                                 <a href="?cetak=laporan-nilai-kelas2"><span class="fontello-plus">Nilai Kuis</span></a>
                                            </li>
                                            
                                        </ul>
                                    </li>
									
                                    <?php
                                            }elseif ($_SESSION['level'] == 'siswa') {
                                    ?>
                                    <!-- <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-calendar"></i>
                                            <span>Jadwal Pelajaran</span>
                                        </a>
                                        <ul>                                            
                                            <li>
                                                <a href="?jadwal=tampil" title="Black Skin"><span class="fontello-search"></span> Tampil Jadwal</a>
                                            </li>
                                        </ul>
                                    </li> -->
									 <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-chat"></i>
                                            <span>Forum</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="../dashboard/chat/chat_siswa.php" title="Black Skin"><span class="fontello-chat"></span>Forum</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Materi">
                                            <i class="fontello-desktop"></i>
                                            <span>Materi</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?modul=download" title="White Skin"><span class="fontello-download"></span> Download Materi</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-print"></i>
                                            <span>Tugas</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?instruksi=tampil_instruksi" title="Black Skin"><span class="fontello-attention"></span> instruksi Tugas</a>
                                            </li>
                                            <li>
                                                <a href="?tugas=download_tugas" title="Black Skin"><span class="fontello-upload"></span> Upload Tugas</a>
                                            </li>
                                        </ul>
                                    </li>
                                     <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-clipboard"></i>
                                            <span>Kuis</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?kuis=tampil_topik"><span class="fontello-snow">Lihat Kuis</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="tooltip-tip" href="#" title="Mail">
                                            <i class="fontello-pencil"></i>
                                            <span>Nilai</span>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="?nilai=nilai-siswa"><span class="fontello-snow"></span> Nilai Tugas</a>
                                            </li>
                                            <li>
                                                <a href="?nilai=nilai_quis"><span class="fontello-snow"></span> Nilai Kuis</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                            }
                                        }
                                    ?>
                            </ul>
                        </div>
                        <!-- end of Menu sidebar  -->
                        <ul class="bottom-list-menu">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end of Rightsidemenu -->