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
                <span>Data Mata Pelajaran</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?akademik=pelajaran-create" class="tiny radius button bg-black-solid"><b><span class="fontello-minefield"></span> Create</b></a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>kelas</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php 
                    if (isset($_GET['akademik'])) {
                        if ($_GET['akademik'] == 'pelajaran') {
                            
                            $no         =   1;
                            $pelajaran    =   mysql_query("SELECT * FROM pelajaran, users, kelas WHERE pelajaran.users_id = users.users_id AND pelajaran.kelas_id=kelas.kelas_id");
                            while ($row=mysql_fetch_array($pelajaran)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                if ($row['pelajaran_nama'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['pelajaran_nama'];
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($row['users_nama'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_nama'];
                            ?>
                        </td>
                        <td>
                            <?php 
                            if ($row ['kelas_nama'] == NULL) {
                                echo "data kosong";

                            }
                                echo $row['kelas_nama'];
                             ?>
                        </td>
                        <td>
                            <a href="?pelajaran-edit=<?php echo $row['pelajaran_id']; ?>"><span class="fontello-edit"></span> Edit</a>
                            <!-- <a href="?pelajaran-delete=<?php echo $row['pelajaran_id']; ?>" onclick="return confirm ('Apakah anda yakin ingin menghapus?')"><span class="fontello-trash"></span> Delete</a> -->
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
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>