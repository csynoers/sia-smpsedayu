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
                <span>Data Soal Kuis TEEEE</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body " style="display: block;">
            <a href="?kuis=tambah_topik" class="tiny radius button bg-black-solid"
            <?php
                $level  =   $_SESSION['level'];
                if ($level == 'siswa') {echo 'style="display:none;"';}  ?> >
                <b><span class="fontello-minefield"></span> Tambah</b></a>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>Judul</th>
                        <th>Pelajaran</th>
                        <th>Kelas</th>
                        <th>Tanggal Buat</th>
                        <th>Nama Guru</th>
                        <th>Info</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>
                <form role="form" method="post" />
                
                <tbody>
                <?php 
                $no              =   1;
                $topik_kuis      =   mysql_query("SELECT * FROM topik_kuis");
                 while ($row=mysql_fetch_array($topik_kuis)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                 echo $row['judul'];
                            ?>
                        </td>
                        <td>
                            <?php echo $row['pelajaran_nama'] ?>
                        </td>
                        <td>
                            <?php echo $row['kelas_nama'] ?>
                        </td>
                        <td>
                            <?php
                                echo $row['tanggal_buat'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['username'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['info'];
                            ?>
                        </td>
                        <td> 
                            <a href="?soal=tampil_soal&idpel=<?php echo $row['pelajaran_id']; ?>&idkel=<?php echo $row['kelas_id']; ?>&idtopik=<?php echo $row['id_topik']; ?>"><span class="fontello-eye-outline" ></span>lihat soal</a>
                            <a href="?kuis-edit=<?php echo $row['pelajaran_id']; ?>" <?php if ($level == 'siswa') {
                                echo 'style="display:none;"';
                            }  ?>><span class="fontello-edit"></span>edit</a>
                            <a href="?kuis-delete=<?php echo $row['pelajaran_id']; ?>" <?php if ($level == 'siswa') {
                                echo "style='display:none;'";
                            } ?>><span class="fontello-trash"></span>hapus</a>
                        </td>
                    </tr>
                <?php
                {
     }           $no++;
                }
                     
                ?>                    
                </tbody>
            </table>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>