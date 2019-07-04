<?php
    session_start();
    require_once('../../config/db.php');
    /* query untuk mendapatkan mata pelajaran dan kelas */
	$sql_1= "
    SELECT
        pelajaran_nama,
        kelas.kelas_nama
    FROM pelajaran
        INNER JOIN kelas
            ON pelajaran.kelas_id=kelas.kelas_id
    WHERE 1=1
        AND pelajaran_id='{$_POST["pelajaran"]}'
    ";

    /* mendapatkan nama guru */
    $row_guru= $_SESSION;
    echo '<pre>';
    print_r($_POST);
    print_r($_SESSION);
    print_r($sql_1);
    echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../images/favicon.png">

		<title>Informasi Nilai Kelas</title>
	</head>
<body>
<center>
<div class="container" id="pcont">
	<div class="page-head">
		<h2>Laporan Nilai Kuis Siswa</h2><br>
		<h4>SMPN 1 SEDAYU</h4>
	</div>    
	<div class="cl-mcont">
<!-- ===================================== Content Here ===================================== -->
<div class="block-flat no-padding">
	<div class="content">
		<table class="no-border blue">
			<thead class="no-border">
				<tr>
					<th style="width: 5%;" class="text-center">No</th>
					<th width="8%">Nama</th>
					<th width="5%">Kelas</th>
					<th width="7%">Mata Pelajaran</th>
			
					
					<th style="width: 7%;" class="text-center">Nilai</th>
				</tr>
			</thead>
				<?php 
					if (isset($_POST['cetak-nilai'])) {
						$no 		=	1;
						$kelas 		=	$_POST['kelas'];
						$pelajaran 	=	$_POST['pelajaran'];
					
			
				

						$sql 		=	mysql_query("SELECT nilai_quis.id_nq, nilai_quis.nilai_point, users.users_id, users.users_nama, 
                            kelas.kelas_id, kelas.kelas_nama, pelajaran.pelajaran_id, 
                            pelajaran.pelajaran_nama
                           
                    FROM nilai_quis
                    INNER JOIN users ON nilai_quis.users_id=users.users_id
                    INNER JOIN kelas ON users.kelas_id=kelas.kelas_id
                    INNER JOIN pelajaran ON nilai_quis.pelajaran_id=pelajaran.pelajaran_id
                    
                    WHERE kelas.kelas_id='$kelas'
                    AND pelajaran.pelajaran_id='$pelajaran'
                    ");
					while ($data=mysql_fetch_array($sql)) {
				?>
				<tr align="center">
					<td class="text-center"><?php echo $no; ?></td>
					<td align="left">						
						<?php 
							echo $data['users_nama'];
						?>						
					</td>
					<td>
						<?php 
							echo $data['kelas_nama'];
						?>
					</td>
					<td>
						<?php 
							echo $data['pelajaran_nama'];
						?>
					</td>
				
					
					<td class="text-center">
						<?php  
							if ($data['nilai_point'] == 0) {
								echo "Data Kosong";
							}else {
								echo $data['nilai_point'];
							}
						?>
					</td>
				</tr>
				<?php 
					$no++;  
					}
				?>
		</table>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<!-- <div class="col-sm-3">
			<?php 
				$guru 	=	mysql_query("SELECT *, pelajaran.pelajaran_nama FROM users WHERE users.users_level='guru' 
											INNER JOIN pelajaran ON users.pelajaran_id=pelajaran.pelajaran_id
				 							WHERE pelajaran.pelajaran_id='$pelajaran'");
				$data 	=	mysql_fetch_array($guru);

				echo $data['guru_nama'];	
			?>
		</div> -->
		<hr/>
		<a href="../?cetak=laporan-nilai-kelas" cls='btn'><i class='fa fa-reply'></i> Kembali </a>
		<a href="cetak-nilai-kelas.php" cls='btn' onClick="window.print();return false"><i class='fa fa-print'></i> Cetak </a>
	</div>
</div>
<!-- ===================================== Content Here ===================================== -->
	</div>
</div>
</center>
<?php
		}
?>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/jquery.gritter/js/jquery.gritter.js"></script>

    <script type="text/javascript" src="../js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
    <script type="text/javascript" src="../js/behaviour/general.js"></script>
    <script src="../js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="../js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
    <script type="text/javascript" src="../js/jquery.nestable/jquery.nestable.js"></script>
    <script type="text/javascript" src="../js/bootstrap.switch/bootstrap-switch.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/jquery.select2/select2.min.js" type="text/javascript"></script>
    <script src="../js/skycons/skycons.js" type="text/javascript"></script>
    <script src="../js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.niftymodals/js/jquery.modalEffects.js"></script>   
    <script type="text/javascript" src="../js/bootstrap.summernote/dist/summernote.min.js"></script>
    <script type="text/javascript" src="../js/jquery.datatables/jquery.datatables.min.js"></script>
    <script type="text/javascript" src="../js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
    <script type="text/javascript" src="../js/jquery.datatables/jquery.datatables.min.js"></script>
  <script type="text/javascript" src="../js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>


    <script type="text/javascript">
      //Add dataTable Functions
      var functions = $('<div class="btn-group"><button class="btn btn-default btn-xs" type="button">Actions</button><button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul role="menu" class="dropdown-menu pull-right"><li><a href="#">Edit</a></li><li><a href="#">Copy</a></li><li><a href="#">Details</a></li><li class="divider"></li><li><a href="#">Remove</a></li></ul></div>');
      $("#datatable tbody tr td:last-child").each(function(){
        $(this).html("");
        functions.clone().appendTo(this);
      });
      
      //Add dataTable Icons
      var functions = $('');
      $("#datatable-icons tbody tr td:last-child").each(function(){
        $(this).html("");
        functions.clone().appendTo(this);
      });
      
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
        
       /* Formating function for row details */
       
        /*
         * Insert a 'details' column to the table
         */
        var nCloneTh = document.createElement( 'th' );
        var nCloneTd = document.createElement( 'td' );
        nCloneTd.innerHTML = '<img class="toggle-details" src="../images/plus.png" />';
        nCloneTd.className = "center";
         
        $('#datatable2 thead tr').each( function () {
            this.insertBefore( nCloneTh, this.childNodes[0] );
        } );
         
        $('#datatable2 tbody tr').each( function () {
            this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
        } );
         
        /*
         * Initialse DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#datatable2').dataTable( {
            "aoColumnDefs": [
                { "bSortable": false, "aTargets": [ 0 ] }
            ],
            "aaSorting": [[1, 'asc']]
        });
         
        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#datatable2').delegate('tbody td img','click', function () {
            var nTr = $(this).parents('tr')[0];
            if ( oTable.fnIsOpen(nTr) )
            {
                /* This row is already open - close it */
                this.src = "../images/plus.png";
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */
                this.src = "../images/minus.png";
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
            }
        } );
        
      $('.dataTables_filter input').addClass('form-control').attr('placeholder','Search');
      $('.dataTables_length select').addClass('form-control');    

        //Horizontal Icons dataTable
        $('#datatable-icons').dataTable();
      });
    </script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="../js/jquery.magnific-popup/dist/jquery.magnific-popup.min.js"></script>
   
  <script type="text/javascript">
    $(document).ready(function(){
    
      $('.image-zoom').magnificPopup({ 
        type: 'image',
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
        zoom: {
          enabled: true, // By default it's false, so don't forget to enable it
          duration: 300, // duration of the effect, in milliseconds
          easing: 'ease-in-out', // CSS transition easing function 
          opener: function(openerElement) {
            var parent = $(openerElement);
            return parent;
          }
        }
      });
      
      //Nifty Modals Init
      $('.md-trigger').modalEffects();
      
      //Summernote Editor
      $('#summernote').summernote({ 
        height: 100,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]});
    });
  </script>
  
    <script src="../js/behaviour/voice-commands.js"></script>
  <script src="../js/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.flot/jquery.flot.js"></script>
  <script type="text/javascript" src="../js/jquery.flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="../js/jquery.flot/jquery.flot.resize.js"></script>
  <script type="text/javascript" src="../js/jquery.flot/jquery.flot.labels.js"></script>
  </body>
  </html>
