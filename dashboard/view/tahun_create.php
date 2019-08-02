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
                <span>Data Tahun</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body small-5" style="display: block;">
            <form data-abide method="POST" action="" role="form">                 
                <div class="name-field">
                    <label>Nama Tahun<small> required</small>
                        <input type="text" name="nama" required>
                    </label>
                    <small class="error">Nama Tahun Harus Di Isi</small>
                </div>
                <div class="name-field">
                    <label>Pilih Semester</label>
                    <input type="radio" name="pokemon" value="1" id="pokemonRed" required="">
                    <label for="pokemonRed">Ganjil</label>
                    <input type="radio" name="pokemon" value="2" id="pokemonBlue" required="">
                    <label for="pokemonBlue">Genap</label>
                    <small class="error">Semester harus dipilih</small>
                </div>
                <button type="submit" class="tiny radius button bg-black-solid" name="tahun-create"><b><span class="fontello-minefield">
                    
                </span> Create</b></button>
            </form>
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>