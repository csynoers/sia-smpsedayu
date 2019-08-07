<?php
    session_start();
    if(isset($_POST['cek-nilai'])) {
        /* get informasi header */
        $sql = ("SELECT *,IF(tahun.semester='1','Ganjil','Genap') AS semester_mod FROM nilai LEFT JOIN pelajaran ON pelajaran.pelajaran_id=nilai.pelajaran_id LEFT JOIN kelas ON kelas.kelas_id=pelajaran.kelas_id LEFT JOIN tahun ON tahun.tahun_id=nilai.tahun_id LEFT JOIN instgs ON instgs.instgs_id=nilai.instgs_id LEFT JOIN users ON users.users_id=nilai.users_id WHERE 1=1 AND nilai.users_id='{$_SESSION["id"]}' AND pelajaran.pelajaran_id='{$_POST["pelajaran"]}' AND tahun.tahun_id='{$_POST["tahun"]}' ORDER BY nilai.nilai_id ASC LIMIT 1");
        $header= query_result($connect, $sql)['fetch_assoc'][0]; 
        echo '
            <div class="block-flat no-padding">
                <div class="content">
                    <table>
                        <tr>
                            <td><b>Mata Pelajaran</b></td>
                            <td>: '.$header['pelajaran_nama'].'</td>
                            <td><b>Tahun Ajaran</b></td>
                            <td>: '.$header['tahun_nama'].'</td>
                        </tr>
                        <tr>
                            <td><b>Nama Guru</b></td>
                            <td>: '.$header['username'].'</td>
                            <td><b>Semester</b></td>
                            <td>: '.$header['semester_mod'].'</td>
                        </tr>
                    </table>
                    <table class="no-border blue">
                        <thead class="no-border">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Judul Tugas</th>
                                <th style="width: 7%;" class="text-center">Nilai Poin</th>
                                '.($_SESSION['level']=='siswa' ? '<th class="text-center" style="display:none;" >Action</th>' : null ).'
                            </tr>
                        </thead>
                        ';
                        $no = 1;
                        $sql = ("SELECT *,IF(tahun.semester='1','Ganjil','Genap') AS semester_mod FROM nilai LEFT JOIN pelajaran ON pelajaran.pelajaran_id=nilai.pelajaran_id LEFT JOIN kelas ON kelas.kelas_id=pelajaran.kelas_id LEFT JOIN tahun ON tahun.tahun_id=nilai.tahun_id LEFT JOIN instgs ON instgs.instgs_id=nilai.instgs_id LEFT JOIN users ON users.users_id=nilai.users_id WHERE 1=1 AND nilai.users_id='{$_SESSION["id"]}' AND pelajaran.pelajaran_id='{$_POST["pelajaran"]}' AND tahun.tahun_id='{$_POST["tahun"]}'");

                        $sql = mysql_query( $sql );
                        while ($data=mysql_fetch_assoc($sql))
                        {
                            echo '
                                <tr>
                                    <td class="text-center">'.$no.'</td>
                                    <td>'.$data['users_nama'].'</td>
                                    <td>'.$data['judul'].'</td>
                                    <td class="text-center">'.($data['nilai_poin'] == 0 ? '0' : $data['nilai_poin'] ).'</td>
                                    '.($_SESSION['level']!='siswa'
                                        ?
                                            '
                                                <td class="text-center" width="17%">
                                                    <a href="?nilai=Ulangan1&&edit-ulangan1='.$data['nilai_id'].'" ><span class="fontello-edit"></span> Edit</a>
                                                    <a href="?nilai=Ulangan1&&tampil=Ulangan1&&del-ulangan1='.$data['nilai_id'].'" ><span class="fontello-trash"></span> Delete</a>
                                                </td>
                                            ' 
                                        : NULL
                                    ).'
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
                                    $pelajaran = mysql_query("SELECT * FROM nilai LEFT JOIN pelajaran ON pelajaran.pelajaran_id=nilai.pelajaran_id LEFT JOIN kelas ON kelas.kelas_id=pelajaran.kelas_id WHERE 1=1 AND nilai.users_id='{$_SESSION["id"]}' GROUP BY pelajaran.pelajaran_nama");
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
                                    $tahun  =   mysql_query("SELECT *,IF(tahun.semester='1','Ganjil','Genap') AS semester_mod FROM nilai LEFT JOIN pelajaran ON pelajaran.pelajaran_id=nilai.pelajaran_id LEFT JOIN kelas ON kelas.kelas_id=pelajaran.kelas_id LEFT JOIN tahun ON tahun.tahun_id=nilai.tahun_id WHERE 1=1 AND nilai.users_id='{$_SESSION["id"]}' GROUP BY tahun.tahun_nama");
                                    while ($row=mysql_fetch_assoc($tahun))
                                    {
                                        echo '<option value="'.$row['tahun_id'].'"> '.$row['tahun_nama'].' (Semester '.$row['semester_mod'].')'.'</option>';
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

