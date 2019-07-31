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
                <span>Data Guru</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?users=guru-create" class="tiny radius button bg-black-solid"><b><span class="fontello-minefield"></span> Create</b></a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                    $sql = ("
                        SELECT *
                            FROM users
                        WHERE users_level='guru'
                            ORDER BY users_nama ASC
                    ");
                    print_r(query_result($connect,$sql)); 
                    if (isset($_GET['users'])) {
                        if ($_GET['users'] == 'guru') {
                            
                            $no         =   1;
                            $guru       =   mysql_query("
                                SELECT * FROM users
                                    WHERE users_level='guru'
                                        ORDER BY users_nama ASC");

                            while ( $row=mysql_fetch_assoc($guru) ) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>

                        <td>
                            <?php
                                if ($row['users_noinduk'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_noinduk'];
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
                                if ($row['users_telp'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_telp'];
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($row['users_email'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_email'];
                            ?>
                        </td>
                        <td>
                            <?php
                                if ($row['users_status'] == NULL) {
                                    echo "Data Kosong";
                                }

                                echo $row['users_status'];
                            ?>
                        </td>
                        <td>
                            <a href="?guru-edit=<?php echo $row['users_id']; ?>"><span class="fontello-edit"></span> Edit</a>
                            <!-- <a href="?guru-delete=<?php echo $row['users_id']; ?>" onclick="return confirm ('Apakah anda yakin ingin menghapus?')"><span class="fontello-trash"></span> Delete</a> -->
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