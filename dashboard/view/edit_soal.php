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
                <span>Upload soal</span>
            </h3>
        </div>
        <!-- /.box-header -->


        <div class="box-body small-5" style="display: block;">
            <!-- tambah topik -->
            <form data-abide method="POST" action="" role="form" enctype="multipart/form-data">                 
                <div class="name-field">
                    
                        <label>Pelajaran<small> required</small>
                       
                            <?php 

                                $pelajaran      =   mysql_query("SELECT * FROM pelajaran ORDER BY pelajaran_id ASC");

                                while ($row=mysql_fetch_array($pelajaran)) {
                            ?>

                            <input type="text"> value="<?php echo $_get['pelajaran_id']; ?>"><?php echo $_get['pelajaran_nama']; ?></option>
                            <?php
                                }
                            ?>

                    </label>

                    <label>Kelas</label>
                    <select name="kelas" class="form-control" required>
                        <?php 
                            $kelas  =   mysql_query("SELECT * FROM kelas");

                            while ($row=mysql_fetch_array($kelas)) {
                        ?>
                            <option value="<?php echo $row['kelas_id']; ?>"><?php echo $row['kelas_nama']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                <div class="name-field">
                    <label>jawaban A<small> required</small>
                        <input type="text" name="jawabanA" required>
                    </label>
					</div>
                
                    <div class="name-field">
             <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                </div>

				<div class="name-field">
                    <label>jawaban B<small> required</small>
                        <input type="text" name="jawabanB" required>
                    </label>
				</div>
			<div class="name-field">
                    <label>Jawaban C<small> required</small>
                        <input type="text" name="JawabanC" required>
                    </label>
			</div>
			<div class="name-field">
                    <label>jawaban D<small> required</small>
                        <input type="text" name="JawabanD" required>
                    </label>
			</div>                    
            <div class="name-field" >
                    <label>Kunci jawaban</label>
	                    <input type="radio"   id="pokemonRed" name="jawab" value="a">
                        <label for="pokemonRed">A</label>
                        <input type="radio"   id="pokemonBlue" name="jawab" value="b">
                        <label for="pokemonBlue">B</label>
	                    <input type="radio"   id="pokemonRed" name="jawab" value="c">
                        <label for="pokemonRed">C</label>
                        <input type="radio"   id="pokemonBlue" name="jawab" value="d">
                        <label for="pokemonBlue">D</label>
                 </div>
             </div>
             
        </div>
        <div class="box-body small-12" style="display: block;">
                <tr><td colspan="2" width="100%" style="padding:10px;"> Soal Kuiss</td></tr>
                <tr><td style="padding:50px;"><textarea name="soal"></textarea></td></tr>

                <button type="submit" class="tiny radius button bg-black-solid" name="update_soal" value="update_soal"><b><span class="fontello-minefield"></span> Update</b></button>
        </div>        
            </form>
    </div>
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