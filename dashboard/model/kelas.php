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
                <span>Data Kelas</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?akademik=kelas-create" class="tiny radius button bg-black-solid"><b><span class="fontello-minefield"></span> Create</b></a>
            <table id="example" class="display">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Nama</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    if (isset($_GET['akademik'])) {
                        if ($_GET['akademik'] == 'kelas') {
                            $no = 1;
                            $sql = ("SELECT * FROM kelas WHERE kelas_nama");
                            foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                                echo '
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$value['kelas_nama'].'</td>
                                        <td>
                                            <a href="?kelas-edit='.$value['kelas_id'].'"><span class="fontello-edit"></span> Edit</a>&nbsp||&nbsp<a href="?search-siswa='.$value['kelas_id'].'&q='.$value['kelas_nama'].'"><span class="fontello-search"></span> Lihat Siswa Kelas Ini</a>
                                            <!-- <a href="?kelas-delete='.$value['kelas_id'].'" onclick="return confirm (\'Apakah anda yakin ingin menghapus?\')"><span class="fontello-trash"></span> Delete</a> -->
                                        </td>
                                    </tr>
                                ';
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