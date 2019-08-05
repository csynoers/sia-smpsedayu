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
                <span>Data Materi Pembelajaran</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?modul=upload" class="tiny radius button bg-black-solid"
            <?php
                $level  =   $_SESSION['level'];

                if ($level == 'siswa') {echo 'style="display:none;"';}  ?> >
                <b><span class="fontello-minefield"></span> Upload</b></a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Judul</th>
                        <th>Pelajaran</th>
                        <th>Kelas</th>
                        <th>Tipe File</th>
                        <th>Ukuran File</th>
                        <th>Nama Guru</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                     $level  =   $_SESSION['level'];
                     $iduser = $_SESSION['id'];
                    if (isset($_GET['modul'])) {
                        if ($_GET['modul'] == 'download') {
                            $iduser = $_SESSION['id'];
                            $Vkelas = $_SESSION['kelas_id'];
                            $no = 1;
                            $sql = ("
                                SELECT *
                                FROM modul 
                                    INNER JOIN pelajaran on pelajaran.pelajaran_id=modul.pelajaran_id
                                    INNER JOIN kelas on pelajaran.kelas_id=kelas.kelas_id
                                WHERE 1=1
                                    AND pelajaran.users_id='$iduser'
                            ");

                            foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                                echo "
                                    <tr>
                                        <td>{$no}</td>
                                        <td>{$value['nama_file']}</td>
                                        <td>{$value['pelajaran_nama']}</td>
                                        <td>{$value['kelas_nama']}</td>
                                        <td>{$value['tipe_file']}</td>
                                        <td>".round(($value['ukuran_file'] / (1024*1000)),1)." MB</td>
                                        <td>{$value['username']}</td>
                                        <td>
                                            <a target='_bank' href='./files/{$value['file']}'><span class='fontello-download'></span> Download</a>
                                            <a href='?modul-edit={$value['id']}' ".($level == 'siswa' ? "style='display:none'" : NULL )."><span class='fontello-edit'></span> Edit</a>
                                            <a href='?modul-delete={$value['id']}' ".($level == 'siswa' ? "style='display:none'" : NULL )."><span class='fontello-trash'></span> Delete</a>
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
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>