<div class="large-12 columns">
    <div class="box">
        <div class="box-header bg-transparent">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                <span class="box-btn" data-widget="remove"><i class="icon-cross"></i></span>
            </div>
            <h3 class="box-title"><i class="fontello-th-large-outline"></i><span>Data Soal Kuis</span></h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body " style="display: block;">
            <a href="?kuis=tambah_topik" class="tiny radius button bg-black-solid" <?php echo ($_SESSION['level']=='siswa') ? 'style="display:none;"' : null ; ?> >
                <b><span class="fontello-minefield"></span> Tambah</b>
            </a>
            
            <?php 
                $level = $_SESSION['level'];
                if ($level == 'guru'){
                    echo '
                        <table id="footable-res2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Nama Guru</th>
                                    <th>Info</th>
                                    <th style="width: 203px !important">Action</th>
                                </tr>
                            </thead>
                    
                            <form role="form" method="post">
                            
                            <tbody>
                            ';
                            if (isset($_GET['kuis']))
                            {
                                if ($_GET['kuis'] == 'tampil_topik')
                                {
                                    $iduser = $_SESSION['id'];
                                    $no         =   1;
                                    $topik_kuis      =   mysql_query("select *,DATE_FORMAT(topik_kuis.tanggal_buat, '%W,  %d %b %Y') AS tanggal_buat_mod,DATE_FORMAT(topik_kuis.tanggal_selesai, '%W,  %d %b %Y') AS tanggal_selesai_mod from topik_kuis, pelajaran, kelas where topik_kuis.pelajaran_id=pelajaran.pelajaran_id and topik_kuis.kelas_id=kelas.kelas_id and pelajaran.users_id='$iduser'");

                                    while ($row=mysql_fetch_assoc($topik_kuis)) {
                                        echo '
                                            <tr>
                                                <td>'.$no.'</td>
                                                <td>'.$row['judul'].'</td>
                                                <td>'.$row['pelajaran_nama'].'</td>
                                                <td>'.$row['kelas_nama'].'</td>
                                                <td>'.$row['tanggal_buat_mod'].'</td>
                                                <td>'.$row['tanggal_selesai_mod'].'</td>
                                                <td>'.$row['username'].'</td>
                                                <td>'.$row['info'].'</td>
                                                <td> 
                                                    <a href="?soal=tampil_soal&idpel='.$row['pelajaran_id'].'&idkel='.$row['kelas_id'].'&idtopik='.$row['id_topik'].'"><span class="fontello-eye-outline" ></span>lihat soal</a>
                                                    <a href="?topik-edit='.$row['id_topik'].'" '.( ($level == 'siswa') ?  'style="display:none;"' : null ).'><span class="fontello-edit"></span>edit</a>
                                                    <a href="?topik-delete='.$row['id_topik'].'" '.( ($level == 'siswa') ?  'style="display:none;"' : null ).'><span class="fontello-trash"></span>hapus</a>
                                                </td>
                                            </tr>
                                        ';
                                        $no++;
                                    }
                                }
                            }
                            echo '
                            </tbody>
                        </table>
                    ';
                }
                elseif ($level == 'siswa')
                {
                    echo '
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th>Judul</th>
                                <th>Pelajaran</th>
                                <th>Kelas</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Nama Guru</th>
                                <th>Info</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <!--<form role="form" method="post" />-->
                            <tbody>
                            ';
                            if (isset($_GET['kuis']))
                            {
                                if ($_GET['kuis'] == 'tampil_topik')
                                {
                                    $no =1;
                                    $sql      =   ("SELECT *,DATE_FORMAT(topik_kuis.tanggal_buat, '%W,  %d %b %Y') AS tanggal_buat_mod,DATE_FORMAT(topik_kuis.tanggal_selesai, '%W,  %d %b %Y') AS tanggal_selesai_mod FROM topik_kuis INNER JOIN pelajaran ON pelajaran.pelajaran_id=topik_kuis.pelajaran_id WHERE 1 AND topik_kuis.kelas_id=(SELECT pbm.kelas_id FROM pbm WHERE pbm.user_id='{$_SESSION['id']}' ORDER BY pbm.tahun_id DESC LIMIT 1) ");
                                    foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $row) {
                                        echo '
                                        <tr>
                                            <td>'.$no.'</td>
                                            <td>'.$row['judul'].'</td>
                                            <td>'.$row['pelajaran_nama'].'</td>
                                            <td>'.$row['kelas_nama'].'</td>
                                            <td>'.$row['tanggal_buat'].'</td>
                                            <td>'.$row['tanggal_selesai'].'</td>
                                            <td>'.$row['username'].'</td>
                                            <td>'.$row['info'].'</td>
                                            <td> 
                                                <span class="status-metro status-disabled" title="Disabled">
                                                ';
                                                $cek_siswa = mysql_query("SELECT * FROM nilai_quis WHERE id_topik='{$row['id_topik']}' AND users_id='{$iduser}' ");
                                                $info_siswa = mysql_fetch_assoc($cek_siswa);
                        
                                                if ($info_siswa['dikerjakan'] >= 1 ) {
                                                    echo "Sudah Dikerjakan";
                                                
                                                }else{
                                                    echo '
                                                </span>
                                                <a href="?kuis=soal_siswa&usersid='.$row['users_id'].'&idpel='.$row['pelajaran_id'].'&idkel='.$row['kelas_id'].'&idtopik='.$row['id_topik'].'&jam='.$row['jam'].'&menit='.$row['menit'].'&detik='.$row['detik'].'"><span class="fontello-eye-outline" ></span>Kerjakan soal</a>
                                                ';

                                                }
                                                
                                                echo '
                                                <a href="?kuis-edit='.$row['pelajaran_id'].'" '.( ($level == 'siswa') ?  'style="display:none;"' : null ).'><span class="fontello-edit"></span>edit</a>
                                                <a href="?kuis-delete='.$row['pelajaran_id'].'" '.( ($level == 'siswa') ?  'style="display:none;"' : null ).'><span class="fontello-trash"></span>hapus</a>
                                            </td>
                                        </tr>
                                        ';
                                        $no++;
                                    }
                                }
                            }
                            echo '
                            </tbody>
                    </table>
                    ';
                }
            ?>
        </div>
        <!-- end /.box-body  -->
    </div>
    <!-- box -->
</div>