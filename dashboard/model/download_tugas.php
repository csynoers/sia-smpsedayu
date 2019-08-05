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
                <span>Data Tugas Siswa</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?tugas=upload_tugas" class="tiny radius button bg-black-solid"
            <?php
                $level  =   $_SESSION['level'];
                if ($level == 'guru') {echo 'style="display:none;"';}  ?> >
                <b><span class="fontello-minefield"></span> Upload</b></a>
            <table id="example" class="display" style="width:100%">

                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Judul</th>
                        <th>Pelajaran</th>
                        <th>Nama Siswa</th>
                        <th>kelas</th>
                        <th>Tanggal Tugas</th>
                        <th width="30%" <?php if ($level == 'siswa') {
                                echo 'style="display:none;"';
                            }  ?>>Action</th>
                    </tr>
                </thead>

                <tbody>


<?php

$level = $_SESSION['level']; 
if ($level=='guru') {
 ?>    
                <?php 
                    if (isset($_GET['tugas'])) {
                        if ($_GET['tugas'] == 'download_tugas') {
                            $id= $_SESSION ['id'];
                            $no         =   1;
                            $users      =   $_GET['siswa'];

                            $tugas      =   mysql_query("SELECT *, 
                                                pelajaran.pelajaran_nama,
                                                users.users_nama, kelas.kelas_nama,
                                                DATE_FORMAT(tugas.tanggal_tugas, '%W,  %d %b %Y') AS tanggal_tugas_mod
                                            FROM tugas 
                                            INNER JOIN pelajaran on pelajaran.pelajaran_id=tugas.pelajaran_id
                                            INNER JOIN users on users.users_id=tugas.users_id 
                                            INNER JOIN kelas on kelas.kelas_id=tugas.kelas_id
                                            ORDER BY pelajaran.pelajaran_nama 
                                                 ");

                            while ($row=mysql_fetch_array($tugas)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                echo $row['judul'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['pelajaran_nama'];
                            ?>
                        </td>
                           
                        <td>
                            <?php
                                echo $row['users_nama'];
                            ?>
                        </td>
                        <th>
                            <?php echo $row['kelas_nama'] ?>
                        </th>
                        <td>
                            <?php
                                echo $row['tanggal_tugas_mod'];
                            ?>
                        </td>
                        
                        <td>
                            <a href="./files/<?php echo $row['file']; ?>" <?php if ($level == 'siswa') {
                                echo 'style="display:none;"';
                            }  ?>><span class="fontello-download"></span> Download</a>
                            
                        </td>
                    </tr>
                <?php
                            $no++;
                            }
                        }
                    }
                ?>



            <?php  } elseif ($level=='siswa') {?>    
                <?php 
                    if (isset($_GET['tugas'])) {
                        if ($_GET['tugas'] == 'download_tugas') {
                            
                            $no         =   1;
                            $idu        =   $_SESSION['id'];
                            $tgs     =   mysql_query("SELECT * 
                                                    FROM tugas, pelajaran, kelas, users WHERE tugas.pelajaran_id = pelajaran.pelajaran_id AND tugas.kelas_id=kelas.kelas_id AND tugas.users_id=users.users_id AND users.users_id = '$idu' ");

                            while ($ro=mysql_fetch_array($tgs)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                echo $ro['judul'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $ro['pelajaran_nama'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $ro['users_nama'];
                            ?>
                        </td>
                        <td>
                            <?php echo $ro['kelas_nama']; ?>
                        </td>
                        <td>
                            <?php
                                echo $ro['tanggal_tugas'];
                            ?>
                        </td>
                        
                        <td>
                            <a href="<?php echo $row['file']; ?>" <?php if ($level == 'siswa') {
                                echo 'style="display:none;"';
                            }  ?>><span class="fontello-download"></span> Download</a>
                            
                        </td>
                    </tr>
                <?php
                            $no++;
                            }
                        }
                    }
                ?>

                <?php } ?>

                </tbody>
            </table>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>