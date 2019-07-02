<?php
    session_start();
    error_reporting(0);

if (empty($_SESSION['username']) AND empty($_SESSION['id']) ){
    echo "
        <link href='css/screen.css' rel='stylesheet' type='text/css'>
        <link href='css/reset.css' rel='stylesheet' type='text/css'>
        <center><br><br><br><br><br><br>Maaf, untuk masuk <b>Halaman</b><br>
        <center>anda harus <b>Login</b> dahulu!<br><br>";
    echo "<div> <a href='index.php'><img src='images/kunci.png'  height=176 width=143></a>
             </div>";
    echo "<input type=button class=simplebtn value='LOGIN DI SINI' onclick=location.href='index.php'></a></center>";
}
else{
?>


    <div class="container">
        <div class="row">
            <form action='nilai.php' method='post' id='formulir'>

<?php
die();
include "../../config/db.php";
$cek_siswa = mysql_query("SELECT * FROM siswa_mengerjakan WHERE id_topik='$_GET[idtopik]' AND users_id='$_GET[usersid]'");
$info_siswa = mysql_fetch_array($cek_siswa);
if ($info_siswa['hits']<= 0){
    mysql_query("INSERT INTO siswa_mengerjakan (id_topik,users_id,hits)
                                        VALUES ('$_GET[idtopik]','$_GET[usersid]',hits+1)");
}
elseif ($info_siswa['hits'] > 0){
    
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
    echo "<div class='col-md-6'><table>";
    echo "<tr>
    <td ><h3>$no. ".$s['soal_kuis']."</h3></td>
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
            window.location=(href='media.php?module=home')</script>";
}
?>
<br><p class='garisbawah'></p>
<h3>Apakah anda sudah yakin dengan jawaban anda dan ingin menyimpannya?  <button type='submit'>Ya</button></h3>

</form>
        </div>
    </div>




<?php
}
?>