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
                <span>Data Upload</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">                 
                <div class="name-field">
                    <label>Nama Modul<small>required</small>
                        <input type="text" name="nama" value="<?php echo $row['nama_file']; ?>" required>
                    </label>
                    <small class="error">Nama Modul Harus Di Isi</small>
                </div>
                <div class="form-group"> 
                    <label>Mata Pelajaran</label>
                    <select name="pelajaran" class="form-control" required>
                        <?php
                            $sql = ("SELECT * FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id='{$_SESSION['id']}'");
                            foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                                echo "<option value='{$value['pelajaran_id']}' ".($value['pelajaran_id']==$row['pelajaran_id'] ? 'selected' : NULL)."> {$value['pelajaran_nama']} Kelas ({$value['kelas_nama']})</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="name-field">
                    <label>File <a href="./files/<?php echo $row['file'] ?>"><?php echo $row['file'] ?></a></label>
                </div>
                <div class="name-field">
                    <label>Update File<small>&nbsp</small>
                        <input type="file" name="file">
                    </label>
                    <small class="error" style="display:block">
                        File type: .doc, .docx, .ppt, .pptx, .pdf & xls <br>
                        File max: 10 MB 
                    </small>
                </div>
                <input type="text" name="id" value="<?php echo $row['id'] ?>">
                <button type="submit" class="tiny radius button bg-black-solid" name="modul-update"><b><span class="fontello-minefield"></span> Update</b></button>
            </form>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>