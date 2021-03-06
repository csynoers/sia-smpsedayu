<?php

    if(isset($_POST['cek-nilai'])) {

?>

<div class="large-12 columns">
    <div class="box">
        <div class="box-body " style="display: block;">
            <table id="exampleX" class="display" style="width:100%">
                <?php
                    $sql= ("SELECT pelajaran.pelajaran_nama,kelas.kelas_nama,(SELECT tahun.tahun_nama FROM tahun WHERE tahun_id='{$_POST['tahun']}') AS tahun_nama,(SELECT IF(tahun.semester='1','Ganjil','Genap') FROM tahun WHERE tahun_id='{$_POST['tahun']}') AS semester FROM pelajaran INNER JOIN kelas ON kelas.kelas_id=pelajaran.kelas_id WHERE pelajaran.pelajaran_id='{$_POST['pelajaran']}'");
                    $row= query_result($connect, $sql)['fetch_assoc'][0];
                    echo "
                    <tr>
                        <td><strong>Kelas</strong></td>
                        <td>: {$row['kelas_nama']}</td>
                        <td><strong>Tahun Ajaran</strong></td>
                        <td>: {$row['tahun_nama']}</td>
                    </tr>
                    <tr>
                        <td><strong>Mata Pelajaran</strong></td>
                        <td>: {$row['pelajaran_nama']}</td>
                        <td><strong>Semester</strong></td>
                        <td>: {$row['semester']}</td>
                    </tr>";

                ?>
            </table>
            <hr>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <!-- <th>Kelas</th> -->
                        <!-- <th>Mata Pelajaran</th> -->
                        <th>Judul Tugas</th>
                        <!-- <th>Tahun</th> -->
                        <!-- <th>Semester</th> -->
                        <th class="text-center">Nilai Poin</th>
                    </tr>
                </thead>    
                <form role="form" method="post" >
                <?php
                    $no = 1;
                    $sql = ("
                        SELECT nilai.*,
                            users.users_noinduk,
                            users.users_nama,
                            pelajaran.pelajaran_nama,
                            kelas.kelas_nama,
                            tahun.tahun_nama,
                            IF(tahun.semester='1','Ganjil','Genap') AS semester_mod,
                            instgs.judul
                        FROM nilai
                            LEFT JOIN users
                                ON users.users_id=nilai.users_id
                            LEFT JOIN tahun
                                ON tahun.tahun_id=nilai.tahun_id
                            LEFT JOIN pelajaran
                                ON pelajaran.pelajaran_id=nilai.pelajaran_id
                            LEFT JOIN kelas
                                ON kelas.kelas_id=pelajaran.kelas_id
                            LEFT JOIN instgs
                                ON instgs.instgs_id=nilai.instgs_id
                        WHERE 1=1
                            AND nilai.pelajaran_id='{$_POST['pelajaran']}'
                            AND nilai.tahun_id='{$_POST['tahun']}'
                    ");
                    foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                        echo "
                            <tr>
                                <td>{$no}</td>
                                <td>{$value['users_noinduk']}</td>
                                <td>{$value['users_nama']}</td>
                                <!--<td>{$value['kelas_nama']}</td>-->
                                <!--<td>{$value['pelajaran_nama']}</td>-->
                                <td>{$value['judul']}</td>
                                <!--<td>{$value['tahun_nama']}</td>-->
                                <!--<td>{$value['semester_mod']}</td>-->
                                <td><center>{$value['nilai_poin']}<center></td>
                            </tr>
                        ";
                        $no++;  
                    }
                    ?>
                </form>
            </table>
            <hr/>        
        </div>
    </div>
</div>
<?php 
    }else {
?>
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
    <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">
            <div class="form-group"> 
                <label>Mata Pelajaran</label>
                <select name="pelajaran" class="form-control" required>
                    <?php 
                        $sql = ("
                            SELECT *
                            FROM nilai
                                LEFT JOIN pelajaran
                                    ON pelajaran.pelajaran_id=nilai.pelajaran_id
                                LEFT JOIN kelas
                                    ON kelas.kelas_id=pelajaran.kelas_id
                            WHERE 1=1
                                AND pelajaran.users_id='{$_SESSION['id']}'
                                GROUP BY nilai.pelajaran_id
                        ");
                        foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $row) {
                            echo '<option value="'.$row['pelajaran_id'].'"> '.$row['pelajaran_nama'].' Kelas ('.$row['kelas_nama'].')</option>';
                        }
                    ?>
                </select>
            </div>
             <div class="name-field"> 
                <label>Tahun Ajaran</label>
                <select name="tahun" class="form-control" required>
                    <?php 
                        $sql = ("
                            SELECT *,
                                IF(tahun.semester='1','Ganjil','Genap') AS semester_mod
                            FROM nilai
                                LEFT JOIN pelajaran
                                    ON pelajaran.pelajaran_id=nilai.pelajaran_id
                                LEFT JOIN kelas
                                    ON kelas.kelas_id=pelajaran.kelas_id
                                LEFT JOIN tahun
                                    ON tahun.tahun_id=nilai.tahun_id
                            WHERE 1=1
                                AND pelajaran.users_id='31'
                                GROUP BY nilai.tahun_id
                        ");
                        foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $row) {
                            echo '<option value="'.$row['tahun_id'].'"> '.$row['tahun_nama'].' ('.$row['semester_mod'].')</option>';
                        }
                    ?>
                </select>
            </div> 
            <button class="btn btn-primary" type="submit" name="cek-nilai"><span class="fa fa-search"></span> Cari Nilai Tugas</button>
        </form>
    </div>
</div>

<?php
    }
?>      

