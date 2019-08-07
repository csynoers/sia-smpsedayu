<?php
    /* get informasi pelajaran yang diampu */
    $pelajaran= '';
    $sql= ("SELECT DISTINCT pelajaran.pelajaran_nama FROM pelajaran WHERE pelajaran.users_id='{$_SESSION['id']}' ");
    foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
        $pelajaran .= "<span class='fontello-ok tooltipstered'> {$value['pelajaran_nama']} </span>";
    }

    /* get informasi tahun */
    $tahun= '';
    $sql= ("SELECT *,IF(tahun.semester='1','Ganjil','Genap') AS semester_mod FROM tahun WHERE 1=1 AND tahun_nama LIKE '%".date('Y')."%' AND semester='".(date('n') <= 6? 2 : 1 )."' LIMIT 1 ");
    foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
        $tahun .= "{$value['tahun_nama']} (Semester {$value['semester_mod']})";
    }

    $sql= ("SELECT *,IF(users_foto='','no_image.png',users_foto) AS users_foto_mod FROM users WHERE users_id = '{$_SESSION['id']}'");
    foreach (query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
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
                            <span>Informasi Profil</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
            
                    <div class="box-body" style="display: block;">
                        <table style="width:100%;">

                            <tbody>
                                <tr>
                                    <td rowspan="4">
                                        <center><img src="img/'.$value['users_foto_mod'].'" style="height: 200px !important"></center>
                                    </td>
                                    <td><b>Nama</b></td>
                                    <td>: '.$value['users_nama'].'</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td>: '.$value['users_alamat'].'</td>
                                </tr>
                                <tr>
                                    <td><b>Telepon</b></td>
                                    <td>: '.$value['users_telp'].'</td>
                                </tr>
                                <tr>
                                    <td><b>E-mail</b></td>
                                    <td>: '.$value['users_email'].'</td>
                                </tr>
                                <tr>
                                    <td rowspan="3">
                                        <center>
                                            <a href="?'.($value['users_level']!='siswa'? 'guru' : 'siswa' ).'-edit='.$value['users_id'].'"><span class="tiny radius fontello-edit button bg-black-solid" >Edit</span> </a>
                                        </center>
                                    </td>
                                    <td><b>Status</b></td>
                                    <td>: '.$value['users_status'].'</td>
                                </tr>
                                <tr>
                                    <td><b>Pelajaran yang diampu</b></td>
                                    <td> '.$pelajaran.'</td>
                                </tr>
                                <tr>
                                    <td><b>Tahun Ajaran</b></td>
                                    <td>: '.$tahun.'</td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- / table -->
                    </div>
                    <!-- end .timeline -->
                </div>
                <!-- box -->
            </div>
        ';
    }
?>