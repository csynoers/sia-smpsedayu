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
                <span>Upload Tugas</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">                 
                <div class="name-field">
    
                    <input type="hidden" name="username" class="form-control" value="<?php 
                                                    if (isset($_SESSION['id'])) {
                                                        echo $_SESSION['id'];
                                                     } 
                                                ?>">

                    <label>Nama File<small> required</small>
                        <input type="text" name="nama" required>
                    </label>
                    <small class="error">Nama File Harus Di Isi</small>
                </div>
                <div class="name-field"> 
                <label>Kelas</label>
                <select name="kepel" class="form-control">
                    <?php 
                    $id= $_SESSION['kelas'];
                    
                        $kelas  =   mysql_query("SELECT * FROM kelas WHERE kelas.kelas_id='$id'");

                        while ($row=mysql_fetch_array($kelas)) {
                    ?>
                        <option value="<?php echo $row['kelas_id']; ?>"><?php echo $row['kelas_nama']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
                <div class="name-field">
                <label>Nama File<small> required</small>
                <select name="pelajaran" requires>
                            <?php 
                                $iduser = $_SESSION['id'];
                              $pelajaran  =   mysql_query("SELECT * FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id");

                            while ($row=mysql_fetch_array($pelajaran)) {
                        ?>
                            <option value="<?php echo $row['pelajaran_id']; ?>"><?php echo $row['pelajaran_nama']; ?> Kelas (<?php echo $row['kelas_nama']; ?>)</option>
                            <?php
                                }
                            ?>
                    <div>
                    <label>Pilih <small>required</small>
                        <input type="file" name="file" required>
                    </label>
                    
                    <small class="error">File Harus Di Isi</small>
                </div>
                <button type="submit" class="tiny radius button bg-black-solid" name="upload_tugas"><b><span class="fontello-minefield"></span> Upload</b></button>
            </form>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>