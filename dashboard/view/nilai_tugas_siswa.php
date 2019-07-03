<?php
    session_start();
    if(isset($_POST['cek-nilai'])) {
        echo '
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
                                <th class="text-center" '.($_SESSION['level']=='siswa' ? 'style="display:none;"' : null ).'>Action</th>
                            </tr>
                        </thead>
                        ';
                        $no = 1;
                        $sql = "
                            SELECT
                                nilai.nilai_id,
                                nilai.nilai_poin,
                                users.users_nama,
                                kelas.kelas_nama,
                                pelajaran.pelajaran_nama,
                                tahun.tahun_nama
                            FROM nilai
                                LEFT JOIN users
                                    ON nilai.users_id=users.users_id
                                LEFT JOIN kelas
                                    ON users.kelas_id=kelas.kelas_id
                                LEFT JOIN pelajaran
                                    ON kelas.kelas_id=pelajaran.kelas_id
                                LEFT JOIN tahun
                                    ON nilai.tahun_id=tahun.tahun_id
                            WHERE 1=1
                                AND users.users_id='{$_SESSION["id"]}'
                                AND nilai.pelajaran_id='{$_POST["pelajaran"]}'
                                AND nilai.tahun_id='{$_POST["tahun"]}'
                                GROUP BY nilai.nilai_id
                        ";

                        $sql = mysql_query( $sql );
                        while ($data=mysql_fetch_assoc($sql))
                        {
                            echo '
                                <tr>
                                    <td class="text-center">'.$no.'</td>
                                    <td>'.$data['users_nama'].'</td>
                                    <td>'.$data['kelas_nama'].'</td>
                                    <td>'.$data['pelajaran_nama'].'</td>
                                    <td>'.$data['tahun_nama'].'</td>
                                    <td class="text-center">'.($data['nilai_poin'] == 0 ? '0' : $data['nilai_poin'] ).'</td>
                                    <td class="text-center" width="17%">
                                        <a href="?nilai=Ulangan1&&edit-ulangan1='.$data['nilai_id'].'" '.($_SESSION['level']=='siswa' ? 'style="display:none;"' : null ).'><span class="fontello-edit"></span> Edit</a>
                                        <a href="?nilai=Ulangan1&&tampil=Ulangan1&&del-ulangan1='.$data['nilai_id'].'" '.($_SESSION['level']=='siswa' ? 'style="display:none;"' : null ).'><span class="fontello-trash"></span> Delete</a>
                                    </td>
                                </tr>
                            ';
                            $no++;  
                        }
                    echo '
                    </table>
                    <hr/>        
                </div>
            </div>
            <!-- end /.block-flat -->
        ';
    }
    else {
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
                                    $pelajaran = mysql_query("
                                        SELECT
                                            pelajaran.pelajaran_id,
                                            pelajaran.pelajaran_nama,
                                            kelas.kelas_nama
                                        FROM pelajaran
                                            INNER JOIN kelas
                                                ON pelajaran.kelas_id=kelas.kelas_id
                                            INNER JOIN users
                                                ON kelas.kelas_id=users.kelas_id
                                        WHERE 1=1
                                            AND users.users_id='{$_SESSION["id"]}'
                                            GROUP BY kelas.kelas_id,pelajaran.pelajaran_id
                                    ");
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

