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
                <span>Users Profile</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form"> 
                <div class="name-field">
                    <label>Nama 
                        <input type="text" name="nama" value="<?php echo $row['users_nama']; ?>" required>
                    </label>
                    <small class="error">Nama Harus Di Isi</small>
                </div>
                <div class="name-field">
                    <label>Username 
                        <input type="text" name="username" value="<?php echo $row['users_username']; ?>" required>
                    </label>
                    <small class="error">Username Harus Di Isi</small>
                </div>
                <div class="name-field">
                    <label>E-mail 
                        <input type="email" name="email" value="<?php echo $row['users_email']; ?>" required>
                    </label>
                    <small class="error">E-mail Harus Di Isi</small>
                </div>
                <div class="name-field">
                    <label>Telepon 
                        <input type="text" name="telp" value="<?php echo $row['users_telp']; ?>" required>
                    </label>
                    <small class="error">Telepon Harus Di Isi</small>
                </div>
                <div class="name-field">
                    <label>Alamat 
                        <textarea name="alamat" required><?php echo $row['users_alamat']; ?></textarea>
                    </label>
                    <small class="error">Alamat Harus Di Isi</small>
                </div>
                 <div class="name-field">
                    <label>Pilih foto
                        <input type="file" name="file" required>
                    </label>
                    <small class="error">File Harus Di Isi</small>
                </div>
                <button type="submit" class="tiny radius button bg-black-solid" name="admin-update"><b><span class="fontello-minefield"></span> Update</b></button>
            </form>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>