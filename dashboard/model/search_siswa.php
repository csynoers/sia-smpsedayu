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
                <span>Data Informasi Siswa Kelas <?php echo $_GET['q'] ?></span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?akademik=kelas-create" class="tiny radius button bg-black-solid"><b><span class="fontello-minefield"></span> Create</b></a>
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    if (isset($_GET['search-siswa'])) {
                        $no = 1;
                        $sql = ("
                            SELECT
                                *,
                                IF(tahun.semester='1','Ganjil','Genap') AS semester_mod
                            FROM users
                                INNER JOIN pbm
                                    ON pbm.user_id=users.users_id
                                INNER JOIN tahun
                                    ON tahun.tahun_id=pbm.tahun_id
                            WHERE 1=1
                                AND users.users_level='siswa'
                                AND pbm.kelas_id='{$_GET['search-siswa']}'
                            ORDER BY tahun.tahun_nama DESC
                        ");
                        print_r($sql);
                        foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                            echo '
                                <tr>
                                    <td>'.$no.'</td>`
                                    <td>'.$value['users_noinduk'].'</td>
                                    <td>'.$value['users_nama'].'</td>
                                    <td>'.$value['tahun_nama'].'</td>
                                    <td>'.$value['semester_mod'].'</td>
                                </tr>
                            ';
                            $no++;
                        }
                    }
                ?>                    
                </tbody>
            </table>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>