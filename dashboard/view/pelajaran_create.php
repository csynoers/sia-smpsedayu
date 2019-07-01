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
                    <label>Nama Mata Pelajaran<small> required</small>
                        <input type="text" name="mapel" required>
                    </label>
                    <small class="error">Nama Mata Pelajaran Harus Di Isi</small>
                </div>
                <label>Nama Guru 
                    <select name="gupel" required>
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
                <button type="submit" class="tiny radius button bg-black-solid" name="pelajaran-create"><b><span class="fontello-minefield"></span> Create</b></button>
            </form>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>