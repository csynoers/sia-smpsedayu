<?php
session_start();
error_reporting(0);

if (empty($_SESSION['username']) AND empty($_SESSION['id'])){
  echo "<link href='css/screen.css' rel='stylesheet' type='text/css'><link href='css/reset.css' rel='stylesheet' type='text/css'>


 <center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman</b><br>
  <center>anda harus <b>Login</b> dahulu!<br><br>";
 echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=143></a>
             </div>";
  echo "<input type=button class=simplebtn value='LOGIN DI SINI' onclick=location.href='index.php'></a></center>";
}
else{
include "config/db.php";

$soal = mysql_query("SELECT * FROM kuis where id_topik='$_POST[id_topik]'");
$pilganda = mysql_num_rows($soal);


//jika soal hanya pilihan ganda
if (!empty($pilganda)){
    //jika ada inputan soal pilganda
if(!empty($_POST['soal_pilganda'])){
    $benar = 0;
    $salah = 0;
    foreach($_POST['soal_pilganda'] as $key => $value){
    $cek = mysql_query("SELECT * FROM kuis WHERE id_kuis=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['kunci'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}

$jumlah = $_POST['jumlahsoalpilganda'];
$tidakjawab = $jumlah - $benar - $salah;
$persen = $benar / $jumlah;
$hasil = $persen * 100;

mysql_query("INSERT INTO nilai_quis (id_nq, id_topik, kelas_id, users_id, benar, salah, tidak_dikerjakan,nilai_point)
                           VALUES (NULL, '$_POST[id_topik]', '$_POST[id_kel]', '$_SESSION[id]','$benar','$salah','$tidakjawab','$hasil')");

}
elseif (empty($_POST['soal_pilganda'])){
    $jumlah = $_POST['jumlahsoalpilganda'];
    mysql_query("INSERT INTO nilai_quis (id_nq, id_topik, kelas_id, users_id, benar, salah, tidak_dikerjakan,nilai_point)
                           VALUES (NULL, '$_POST[id_topik]', '$_POST[idkel]', '$_SESSION[id]','0','0','0','0')");
}
      echo "<meta http-equiv='refresh' content='1;URL=dashboard/?kuis=tampil_topik'>";
}

}
?>
