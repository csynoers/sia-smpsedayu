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


        <div class="box-body" style="display: block;">
            <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">                 
                <div class="name-field small-5">
                    <label>Judul Instruksi<small> required</small>
                        <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required>
                    </label>
                    <small class="error">Nama File Harus Di Isi</small>
                </div>
                <div class="name-field small-5">
                    <label>Pelajaran<small> required</small>
                        <select name="pelajaran" class="form-control" required>
                            <?php
                                $sql = ("SELECT * FROM pelajaran, kelas WHERE pelajaran.kelas_id=kelas.kelas_id AND pelajaran.users_id='{$_SESSION['id']}'");
                                foreach ( query_result($connect, $sql)['fetch_assoc'] as $key => $value) {
                                    echo "<option value='{$value['pelajaran_id']}' ".($value['pelajaran_id']==$row['pelajaran_id']? 'selected' : NULL)."> {$value['pelajaran_nama']} Kelas ({$value['kelas_nama']})</option>";
                                }
                            ?>
                        </select>
                    </label>
                </div>

                <input type="hidden" name="username" value="<?php 
                                                    if (isset($_SESSION['nama'])) {
                                                        echo $_SESSION['nama'];
                                                     } 
                ?>">
                <div class="name-field small-5">
                    <label>Tanggal Selesai
                        <input value="<?php echo $row['tanggal_selesai'] ?>" type="date" name="tgl_selesai" required>
                    </label>
                </div>
                <div class="name-field small-12">
                    <label for="">Instruksi</label>
                    <textarea name="info"><?php echo $row['info'];?></textarea>
                </div>
                <hr>
                <button type="submit" class="tiny radius button bg-black-solid" name="update_instgs"><b><span class="fontello-minefield"></span> Update</b></button>
            </form>
        </div>    
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>

<script src="../dashboard/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

            if ( typeof CKEDITOR == 'undefined' )
            {
                document.write(
                    'CKEditor not found');
            }
            else
            {
                var editor = CKEDITOR.replace( 'info' );    

                
                CKFinder.setupCKEditor( editor, '' ) ;

                
            }
    </script>