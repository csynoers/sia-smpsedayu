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
                <span>Rentang Tugas</span>
            </h3>
        </div>
        <!-- /.box-header -->


        <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">                 
              
                    <input type="hidden" name="username" value="<?php 
                                                    if (isset($_SESSION['nama'])) {
                                                        echo $_SESSION['nama'];
                                                     } 
                                                ?>">
                <div class="name-field"> 
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                    <?php 
                    $idus= $_SESSION['id'];
                    
                        $kelas  =   mysql_query("SELECT * FROM pelajaran, kelas WHERE kelas.kelas_id=pelajaran.kelas_id AND pelajaran.users_id='$idus'");

                        while ($row=mysql_fetch_array($kelas)) {
                    ?>
                        <option value="<?php echo $row['kelas_id']; ?>"><?php echo $row['kelas_nama']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
             <label>Tanggal Selesai
                        <input type="date" name="tgl_selesai" required>
                    </label>
                   
                </div>
        </div>

        <div class="box-body small-12" style="display: block;">
               
                <button type="submit" class="tiny radius button bg-black-solid" name="nilai_tugas"><b><span class="fontello-minefield"></span> Upload</b></button>
        </div>        
            </form>
           
                
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