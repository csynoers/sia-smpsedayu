<?php
    session_start();
    if(isset($_POST['cek-nilai'])) {

    ?>
    <div class="block-flat no-padding">
        <div class="content">
            <table class="no-border blue">
                <thead class="no-border">
                    <tr>
                        <th style="width: 5%;" class="text-center">No</th>
                        <th width="15%">Nama</th>
                        <th width="5%">Kelas</th>
                        <th width="7%">Mata Pelajaran</th>
                        
                        <th width="7%">Tahun</th>
                        <th style="width: 7%;" class="text-center">Nilai Poin</th>
                        <th class="text-center" 
                        <?php $level  =   $_SESSION['level'];
                                if ($level == 'siswa') {
                                    echo 'style="display:none;"';
                                }  ?>
                        >Action</th>
                    </tr>
                </thead>    
                <form role="form" method="post">
                    <?php
                            $id     =$_SESSION ['id'];
                            $no = 1;
                        
                            $pelajarannama = $_POST['pelajaran'];
                            $jenisnama      =   '1';
                            $tahunnama = $_POST['tahun'];
                            $f= mysql_query("select * from users where users_id='$id'");
                            $g=mysql_fetch_assoc($f);
                            $sql = mysql_query("SELECT nilai.nilai_id, nilai.nilai_poin, users.users_id, users.users_nama, 
                                                        kelas.kelas_id, kelas.kelas_nama, pelajaran.pelajaran_id, 
                                                        pelajaran.pelajaran_nama, 
                                                        tahun.tahun_id, tahun.tahun_nama, jenis.jenis_id, jenis.jenis_nama
                                                FROM nilai
                                                INNER JOIN users ON nilai.users_id=users.users_id
                                                INNER JOIN kelas ON users.kelas_id=kelas.kelas_id
                                                INNER JOIN pelajaran ON nilai.pelajaran_id=pelajaran.pelajaran_id
                                                INNER JOIN tahun ON nilai.tahun_id=tahun.tahun_id
                                                INNER JOIN jenis ON nilai.jenis_id=jenis.jenis_id
                                                WHERE kelas.kelas_id='$g[kelas_id]' 
                                                AND pelajaran.pelajaran_id='$pelajarannama'
                                                AND tahun.tahun_id='$tahunnama'
                                                AND users.users_id='$id'
                                                    
                                                ");
                            while ($data=mysql_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td>                        
                            <?php 
                                echo $data['users_nama'];
                            ?>                      
                        </td>
                        <td>
                            <?php 
                                echo $data['kelas_nama'];
                            ?>
                        </td>
                        <td>
                            <?php 
                                echo $data['pelajaran_nama'];
                            ?>
                        </td>
                        
                        <td>
                            <?php 
                                echo $data['tahun_nama'];
                            ?>
                        </td>
                        <td class="text-center">
                            <?php  
                                if ($data['nilai_poin'] == 0) {
                                    echo "0";
                                }else {
                                    echo $data['nilai_poin'];
                                }
                            ?>
                        </td>
                    
                        <td class="text-center" width="17%">
                            <a href="?nilai=Ulangan1&&edit-ulangan1=<?php echo $data['nilai_id']; ?>"
                            <?php if ($level == 'siswa') {
                                    echo 'style="display:none;"';
                                }  ?>
                            ><span class="fontello-edit"></span> Edit</a>
                            <a href="?nilai=Ulangan1&&tampil=Ulangan1&&del-ulangan1=<?php echo $data['nilai_id']; ?>"
                            <?php if ($level == 'siswa') {
                                    echo 'style="display:none;"';
                                }  ?>
                            ><span class="fontello-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php 
                        $no++;  
                        }
                    ?>
                </form>
            </table>
            <hr/>        
        </div>
    </div>
    <?php 
    }
    else {
        echo "SELECT * FROM pelajaran, kelas WHERE kelas.kelas_id=pelajaran.kelas_id AND pelajaran.users_id='{$_SESSION["id"]}'";
        echo '
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
                            <span>Cari Data Nilai Tugas</span>
                        </h3>
                    </div>
                    <!-- end /.box-header -->
                    <div class="box-body small-5" style="display: block;">
                        <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">                 
                            <div class="form-group"> 
                                <label>Mata Pelajaran</label>
                                <select name="pelajaran" class="form-control" required>';
                                    $iduser = $_SESSION['id'];
                                    $pelajaran  =   mysql_query("SELECT * FROM pelajaran, kelas WHERE kelas.kelas_id=pelajaran.kelas_id AND pelajaran.users_id='{$iduser}'");
                                    while ($row=mysql_fetch_assoc($pelajaran))
                                    {
                                        echo '<option value="'.$row['pelajaran_id'].'"> '.$row['pelajaran_nama'].' Kelas ('.$row['kelas_nama'].')</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                            <div class="name-field"> 
                                <label>Tahun Ajaran</label>
                                <select name="tahun" class="form-control" required>';
                                    $tahun  =   mysql_query("SELECT * FROM tahun");
                                    while ($row=mysql_fetch_assoc($tahun))
                                    {
                                        echo '<option value="'.$row['tahun_id'].'"> '.$row['tahun_nama'].'</option>';
                                    }
                                    echo '
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit" name="cek-nilai"><span class="fa fa-search"></span> Cari Nilai Tugas</button>
                        </form>
                    </div>
                    <!-- end /.box-body -->
                </div>
                <!-- end /.box -->
            </div>
            <!-- end /.large-12 -->
        ';
    }

