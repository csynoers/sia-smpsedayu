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
                <span>Data Tahun Ajaran</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?akademik=tahun-create" class="tiny radius button bg-black-solid"><b><span class="fontello-minefield"></span> Create</b></a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Nama</th>
                        <th>Semester</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    if (isset($_GET['akademik'])) {
                        if ($_GET['akademik'] == 'tahun') {
                            $no         =   1;
                            $sql= ("SELECT *,IF(semester='1', 'Ganjil','Genap') AS semester_mod FROM tahun ORDER BY tahun_nama ASC");
                            foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                                echo '
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$value['tahun_nama'].'</td>
                                        <td>'.$value['semester_mod'].'</td>
                                        <td>
                                            <a href="?tahun-edit='.$value['tahun_id'].'"><span class="fontello-edit"></span> Edit</a>
                                            <!-- <a href="?tahun-delete='.$value['tahun_id'].'" onclick="return confirm (\'Apakah anda yakin ingin menghapus?\')"><span class="fontello-trash"></span> Delete</a> -->
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