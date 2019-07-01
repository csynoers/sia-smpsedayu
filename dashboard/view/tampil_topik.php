<div class="large-12 columns">
    <div class="box">
        <div class="box-header bg-transparent">
            <!-- tools box -->
            <div class="pull-right box-tools">

                <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                </span>
                <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                </span>
            </div>
            <h3 class="box-title"><i class="fontello-th-large-outline"></i>
                <span>Data Soal Kuis</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?kuis=tambah_topik" class="tiny radius button bg-black-solid"
            <?php
                $level  =   $_SESSION['level'];
                if ($level == 'siswa') {echo 'style="display:none;"';}  ?> >
                <b><span class="fontello-minefield"></span> Tambah</b></a>
            
             <?php 
           $level = $_SESSION['level'];
           if ($level == 'guru') {
            ?>

            <table id="footable-res2" class="display" style="width:100%">
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
                <form role="form" method="post" />
                
                <tbody>
                <?php 
             
                    if (isset($_GET['kuis'])) {
                        if ($_GET['kuis'] == 'tampil_topik') {
                        $iduser = $_SESSION['id'];
                        $no         =   1;
                        $topik_kuis      =   mysql_query("select * from topik_kuis, pelajaran, kelas where topik_kuis.pelajaran_id=pelajaran.pelajaran_id and topik_kuis.kelas_id=kelas.kelas_id and pelajaran.users_id='$iduser'");

                            while ($row=mysql_fetch_array($topik_kuis)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                 echo $row['judul'];
                            ?>
                        </td>
                        <td>
                            <?php echo $row['pelajaran_nama'] ?>
                        </td>
                        <td>
                            <?php echo $row['kelas_nama'] ?>
                        </td>
                        <td>
                            <?php
                                echo $row['tanggal_buat'];
                            ?>
                        </td>
						<td>
                            <?php
                                echo $row['tanggal_selesai'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['username'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['info'];
                            ?>
                        </td>
                        <td> 
                            <a href="?soal=tampil_soal&idpel=<?php echo $row['pelajaran_id']; ?>&idkel=<?php echo $row['kelas_id']; ?>&idtopik=<?php echo $row['id_topik']; ?>"><span class="fontello-eye-outline" ></span>lihat soal</a>
                            <a href="?kuis-edit=<?php echo $row['pelajaran_id']; ?>" <?php if ($level == 'siswa') {
                                echo 'style="display:none;"';
                            }  ?>><span class="fontello-edit"></span>edit</a>
                            <a href="?kuis-delete=<?php echo $row['pelajaran_id']; ?>" <?php if ($level == 'siswa') {
                                echo "style='display:none;'";
                            } ?>><span class="fontello-trash"></span>hapus</a>
                        </td>
                    </tr>
                <?php
                            $no++;
                            }
                        }
                    }
                ?>

                </tbody>
            </table>
             <?php }elseif ($level == 'siswa') { ?>

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
                <form role="form" method="post" />
                
                <tbody>
                <?php 
             
                    if (isset($_GET['kuis'])) {
                        if ($_GET['kuis'] == 'tampil_topik') {
                        $iduser = $_SESSION['id'];
                        $no         =   1;
                        $topik_kuis      =   mysql_query("SELECT * FROM topik_kuis, kelas, pelajaran, users 
                                                            WHERE topik_kuis.kelas_id=kelas.kelas_id AND topik_kuis.pelajaran_id=pelajaran.pelajaran_id 
                                                            AND kelas.kelas_id=users.kelas_id AND users.users_id='$iduser' ");

                            while ($row=mysql_fetch_array($topik_kuis)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                 echo $row['judul'];
                            ?>
                        </td>
                        <td>
                            <?php echo $row['pelajaran_nama'] ?>
                        </td>
                        <td>
                            <?php echo $row['kelas_nama'] ?>
                        </td>
                        <td>
                            <?php
                                echo $row['tanggal_buat'];
                            ?>
                        </td>
						<td>
                            <?php
                                echo $row['tanggal_selesai'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['username'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['info'];
                            ?>
                        </td>
                        <td> 
                        <span class="status-metro status-disabled" title="Disabled">
                        <?php 
                        $idtop = $row['id_topik'];
                        $cek_siswa = mysql_query("SELECT * FROM nilai_quis WHERE nilai_quis.id_topik='$idtop' ");
                         $info_siswa = mysql_fetch_array($cek_siswa);

                        if ($info_siswa[dikerjakan]== 1 ) {
                            echo "Sudah Dikerjakan";
                        }

                        else{ ?>
                        </span>
                        <a href="?kuis=soal_siswa&usersid=<?php echo $row[users_id]; ?>&idpel=<?php echo $row[pelajaran_id]; ?>&idkel=<?php echo $row[kelas_id]; ?>&idtopik=<?php echo $row[id_topik]; ?>&jam=<?php echo $row[jam]; ?>&menit=<?php echo $row[menit]; ?>&detik=<?php echo $row[detik]; ?>"><span class="fontello-eye-outline" ></span>Kerjakan soal</a>
                                 <?php 
                                      } ?> 
                            <a href="?kuis-edit=<?php echo $row['pelajaran_id']; ?>" <?php if ($level == 'siswa') {
                                echo 'style="display:none;"';
                            }  ?>><span class="fontello-edit"></span>edit</a>
                            <a href="?kuis-delete=<?php echo $row['pelajaran_id']; ?>" <?php if ($level == 'siswa') {
                                echo "style='display:none;'";
                            } ?>><span class="fontello-trash"></span>hapus</a>
                        </td>
                    </tr>
                <?php
                            $no++;
                            }
                        }
                    }
                ?>

                </tbody>
            </table>

            <?php } ?>




        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>