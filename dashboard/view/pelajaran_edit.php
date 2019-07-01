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
        <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form">                 
                <div class="name-field">
                        <?php 
                            $id_mapel = $_GET['pelajaran-edit'];
                            $mapel      =   mysql_query("SELECT * FROM pelajaran WHERE pelajaran.pelajaran_id='$id_mapel' ");

                            while ($r=mysql_fetch_array($mapel)) {
                        ?>
                    <label>Nama Mata Pelajaran<small> required</small>
                        <input type="hidden" name="pelajaran_id" value="<?php echo $_GET['pelajaran-edit']; ?>">
                        <input type="text" name="mapel" value="<?php echo $r['pelajaran_nama']; ?>">
                    <?php } ?>
                    </label>
                    <small class="error">Nama Mata Pelajaran Harus Di Isi</small>
                </div>
                <label>Nama Guru 
                    <select name="gupel" required>
                  <?php
                            $id_mapel = $_GET['pelajaran-edit'];
                            $gr      =   mysql_query("SELECT * FROM users, pelajaran WHERE users.users_level='guru' AND pelajaran.users_id=users.users_id AND pelajaran.pelajaran_id='$id_mapel'  ORDER BY users_nama ASC");

                            while ($ro=mysql_fetch_array($gr)) {
                        ?>
                    <option value="<?php echo $ro['users_id']; ?>"><?php echo $ro['users_nama']; ?></option>
                    <?php } ?>
                        <?php 
                            $gupel      =   mysql_query("SELECT * FROM users WHERE users_level='guru' ORDER BY users_nama ASC");

                            while ($row=mysql_fetch_array($gupel)) {
                        ?>
                        <option value="<?php echo $row['users_id']; ?>"><?php echo $row['users_nama']; ?></option>
                        <?php
                            }
                        ?>
                     </select>
                </label>
                <label>Kelas 
                    <select name="kepel" required>
                        <?php 
                            $kepel      =   mysql_query("SELECT * FROM kelas WHERE kelas_nama");

                            while ($row=mysql_fetch_array($kepel)) {
                        ?>
                        <option value="<?php echo $row['kelas_id']; ?>"><?php echo $row['kelas_nama']; ?></option>
                        <?php
                            }
                        ?>
                     </select>
                </label>  
                <button type="submit" class="tiny radius button bg-black-solid" name="pelajaran-update"><b><span class="fontello-minefield"></span> Update</b></button>
            </form>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>