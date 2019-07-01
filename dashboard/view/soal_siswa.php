
<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) AND empty($_SESSION['id']) ){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>


 <center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
 echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=143></a>
             </div>";
  echo "<input type=button class=simplebtn value='LOGIN DI SINI' onclick=location.href='index.php'></a></center>";
}
else{
?>

<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
	     <script type="text/javascript">
        $(document).ready(function() {
              /** Membuat Waktu Mulai Hitung Mundur Dengan 
                * var detik = 0,
                * var menit = 1,
                * var jam = 1
              */
              var detik = document.getElementById("detik").value;
              var menit = document.getElementById("menit").value;
              var jam   = document.getElementById("jam").value;
              
             /**
               * Membuat function hitung() sebagai Penghitungan Waktu
             */
            function hitung() {
                /** setTimout(hitung, 1000) digunakan untuk 
                    * mengulang atau merefresh halaman selama 1000 (1 detik) 
                */
                setTimeout(hitung,1000);
  
               /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
               if(menit < 10 && jam == 0){
                     var peringatan = 'style="color:red"';
               };
 
               /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
               $('#timer').html(
                      '<h3 align="center"'+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h3><hr>'
                );
  
                /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
                detik --;
 
                /** Jika var detik < 0
                    * var detik akan dikembalikan ke 59
                    * Menit akan Berkurang 1
                */
                if(detik < 0) {
                    detik = 59;
                    menit --;
 
                    /** Jika menit < 0
                        * Maka menit akan dikembali ke 59
                        * Jam akan Berkurang 1
                    */
                    if(menit < 0) {
                        menit = 59;
                        jam --;
 
                        /** Jika var jam < 0
                            * clearInterval() Memberhentikan Interval dan submit secara otomatis
                        */
                        if(jam < 0) {                                                                 
                            clearInterval(); 
							var frmSoal = document.getElementById("frmSoal");
							frmSoal.submit();							
                        } 
                    } 
                } 
            }           
            /** Menjalankan Function Hitung Waktu Mundur */
            hitung();
      }); 
      // ]]>
    </script>



<div class="row" style="margin-top:-20px">

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
                                <h3 class="box-title"><i class="fontello-clipboard"></i>
                                    <span>Soal Siswa</span>
                                </h3>
                            </div>
							<div id='timer'></div>
                            <!-- /.box-header -->
                            <div class="box-body " style="display: block;">
                            <?php 
                            $idpel = $_GET[idpel];
                            $idkel = $_GET[idkel];
                            $kelpel=mysql_query("SELECT * FROM Pelajaran, kelas 
                            							 WHERE Pelajaran.pelajaran_id='$idpel' AND kelas.kelas_id='$idkel' 
                            							 ");
                            while ($ro=mysql_fetch_array($kelpel)) {
                            	
                            ?>
							
						<h5>Nama Pelajaran: <?php echo $ro['pelajaran_nama']; ?></h5>
						<h5> kelas        : <?php echo $ro['kelas_nama']; ?></h5>

						<?php } ?>
						 <div id='timer'></div>
    <div class="container">
        <div class="row">
		<?php           
			$jam=$_GET["jam"];
			$menit=$_GET["menit"];
			$detik=$_GET["detik"];		
            
            ?>
            <form action='?nilai=nilai_quis' method='post' id='formulir'>
			<input type="hidden" id="jam" value=<?php echo $jam; ?>>
		   <input type="hidden" id="menit" value=<?php echo $menit; ?>>
		   <input type="hidden" id="detik" value=<?php echo $detik; ?>>
            <input type="hidden" name="idpel" value="<?php echo $_GET[idpel]; ?>">

<?php
			include "../../config/db.php";
			$cek_siswa = mysql_query("SELECT * FROM siswa_mengerjakan WHERE id_topik='$_GET[idtopik]' AND users_id='$_GET[usersid]'");
			$info_siswa = mysql_fetch_array($cek_siswa);
			if ($info_siswa[hits]<= 0){
			    mysql_query("INSERT INTO siswa_mengerjakan (id_topik,users_id,hits)
			                                        VALUES ('$_GET[idtopik]','$_GET[usersid]',hits+1)");
			}
			elseif ($info_siswa[hits] > 0){
			    
			}

			$soal = mysql_query("SELECT * FROM kuis where id_topik='$_GET[idtopik]' ORDER BY rand()");
			$pilganda = mysql_num_rows($soal);
			if (!empty($pilganda)){
			    echo "
			    <input type='hidden' name='id_topik' value='$_GET[idtopik]'>
			<input type='hidden' name='id_kel' value='$_GET[idkel]'>
			    ";

$no = 1;
while($s = mysql_fetch_array($soal)){
    echo "<div class='col-md-6'><table style='width: 1040px;'>";
    echo "<tr>
    <td ><h7>$no. ".$s['soal_kuis']."</h7></td>
    </tr>";
    echo "<tr>
    <td><input type=radio style='margin-right:10px;' name=soal_pilganda[".$s['id_kuis']."] value='A'>A. ".$s['pil_a']."</td>

    </tr>";
    echo "<tr>
    <td><input type=radio style='margin-right:10px;' name=soal_pilganda[".$s['id_kuis']."] value='B'>B. ".$s['pil_b']."</td>
    </tr>";
    echo "<tr>
    <td><input type=radio style='margin-right:10px;' name=soal_pilganda[".$s['id_kuis']."] value='C'>C. ".$s['pil_c']."</td>

    </tr>";
    echo "<tr>
    <td><input type=radio style='margin-right:10px;' name=soal_pilganda[".$s['id_kuis']."] value='D'>D. ".$s['pil_d']."</td>
    </tr>";
echo "</table></div>";    
    $no++;
}

$jumlahsoal = $no - 1;
echo "<input type='hidden' name='jumlahsoalpilganda' value='$jumlahsoal'>";
}
elseif (empty($pilganda)){
    echo "<script>window.alert('Maaf belum ada soal di Topik Ini.');
            window.location=(href='?kuis=tampil_topik')</script>";
}
?>
<br><p class='garisbawah'></p>
<h6>Apakah anda sudah yakin dengan jawaban anda dan ingin menyimpannya?  <button type='submit'>Ya</button></h6>

</form>
        </div>
    </div>




<?php
}
?>

    </div>
    <!-- end .timeline -->


</div>
<!-- box -->
</div>
</div>
<!-- End of Container Begin -->
