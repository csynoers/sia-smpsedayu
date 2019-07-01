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
                <span>Edit Nilai Poin</span>
            </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body small-5" style="display: block;">
		<form data-abide role="form" method="POST" action=""> 
			<div class="form-group"> 
				<label>Nilai Poin</label> 
				<input type="text" value="<?php echo $row['nilai_poin']; ?>" class="form-control" name="nilai_poin" required>
			</div>
			<button class="btn btn-primary" type="submit" name="edit-raport"><span class="fa fa-edit"></span> Edit Nilai Poin</button>
		</form>
	</div>
</div>