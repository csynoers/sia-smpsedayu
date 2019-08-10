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
                <span>Data Instruksi Tugas</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?instruksi=upload_instgs" class="tiny radius button bg-black-solid" <?php echo ($_SESSION['level']=='siswa' ? 'style="display:none;' : Null ) ?> >
                <b><span class="fontello-minefield"></span> Upload</b>
            </a>
           <?php 
           $level = $_SESSION['level'];
           if ($level == 'guru') {
            ?>
             <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pelajaran</th>
                        <th>kelas</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Nama Guru</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>
                <form role="form" method="post" />
                
                <tbody>
                <?php 
                    if (isset($_GET['instruksi'])) {
                        if ($_GET['instruksi'] == 'tampil_instruksi') {
                            
                            $id = $_SESSION['id'];
                            $no = 1;
                            $sql = ("select *,DATE_FORMAT(instgs.tanggal_buat, '%W,  %d %b %Y') AS tanggal_buat_mod, DATE_FORMAT(instgs.tanggal_selesai, '%W,  %d %b %Y') AS tanggal_selesai_mod from pelajaran, instgs,kelas where pelajaran.kelas_id=kelas.kelas_id and pelajaran.pelajaran_id=instgs.pelajaran_id and pelajaran.users_id='$id' ");
                            // print_r($sql);
                            foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                                echo "
                                    <tr>
                                        <td>{$no}</td>
                                        <td>{$value['judul']}</td>
                                        <td>{$value['pelajaran_nama']}</td>
                                        <td>{$value['kelas_nama']}</td>
                                        <td>{$value['tanggal_buat_mod']}</td>
                                        <td>{$value['tanggal_selesai_mod']}</td>
                                        <td>{$value['username']}</td>
                                        <td>
                                            <a href='?instruksi=lihat_instruksi&id={$value['instgs_id']}'><span class='fontello-eye'></span> Tampil</a>
                                            <a href='?instruksi-edit={$value['instgs_id']}' ><span class='fontello-edit'></span> Edit</a>
                                            <!--<a href='?instruksi-delete={$value['instgs_id']}' ><span class='fontello-trash'></span> Delete</a>-->
                                        </td>
                                    </tr>
                                ";
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
                        <th>kelas</th>
                        <th>Tanggal Buat</th>
                        <th>Nama Guru</th>
                        <th>Info</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>
                <form role="form" method="post" />
                
                <tbody>
                <?php 
                    if (isset($_GET['instruksi'])) {
                        if ($_GET['instruksi'] == 'tampil_instruksi') {
                            $idu      = $_SESSION['id'];
                            print_r($_SESSION['id']);
                            $a = mysql_query("select * from users, kelas where users.kelas_id=kelas.kelas_id and users.users_id='$idu'");
                            $b = mysql_fetch_array($a);
                            $no         =   1;
                           $instgs      =   mysql_query("select * from pelajaran, instgs,kelas where pelajaran.kelas_id=kelas.kelas_id and pelajaran.pelajaran_id=instgs.pelajaran_id and kelas.kelas_id='$b[kelas_id]' ");
                            while ($row=mysql_fetch_array($instgs)) {
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
                            <?php echo $row['kelas_nama']; ?>
                        </td>
                        <td>
                            <?php
                                echo $row['tanggal_buat'];
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
                            <a href="?instruksi=lihat_instruksi"><span class="fontello-eye"></span> Tampil</a>
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