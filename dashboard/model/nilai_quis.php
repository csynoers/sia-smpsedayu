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
    include "../../config/db.php";

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
            $idpel= $_POST['idpel'];
            $kerjakan = 1;
            mysql_query("INSERT INTO nilai_quis (id_nq, id_topik, kelas_id, users_id, pelajaran_id, benar, salah, tidak_dikerjakan,nilai_point,dikerjakan)
                            VALUES (NULL, '$_POST[id_topik]', '$_POST[id_kel]', '$_SESSION[id]','$idpel', '$benar','$salah','$tidakjawab','$hasil','$kerjakan')");

        }
        elseif (empty($_POST['soal_pilganda'])){
            $jumlah = $_POST['jumlahsoalpilganda'];
            mysql_query("INSERT INTO nilai_quis (id_nq, id_topik, kelas_id, users_id, benar, salah, tidak_dikerjakan,nilai_point)
                                VALUES (NULL, '$_POST[id_topik]', '$_POST[idkel]', '$_SESSION[id]','0','0','0','0')");
        }
        echo "<meta http-equiv='refresh' content='1;URL=?nilai=nilai_quis'>";
    }

}
?>
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
                <span>Data Soal Kuis</span>
            </h3>
        </div>
        <!-- /.box-header -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="3%">No</th>
                        <th>nama siswa</th>
                        <th>Pelajaran</th>
                        <th>Kelas</th>
                        <th>Nilai kuis</th>
                        <th width="30%" <?php echo ($level == 'siswa'? "style='display:none;'" : NULL ); ?>>Action</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no         =   1;
                        $nilaiq     =   mysql_query("SELECT * FROM nilai_quis, kelas,users, pelajaran WHERE nilai_quis.kelas_id=kelas.kelas_id AND nilai_quis.users_id=users.users_id AND nilai_quis.pelajaran_id=pelajaran.pelajaran_id AND users.users_id='{$_SESSION["id"]}' ");
                        while ($row=mysql_fetch_array($nilaiq)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td>
                                        <?php
                                            echo $row['users_nama'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pelajaran_nama'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['kelas_nama'] ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $row['nilai_point'];
                                        ?>
                                    </td>
                                    
                                    <td> 
                                        <a href="?kuis-delete=<?php echo $row['id_nq']; ?>" <?php echo ($level == 'siswa'? "style='display:none;'" : NULL); ?>><span class="fontello-trash"></span>hapus</a>
                                    </td>
                                </tr>
                            <?php
                            $no++;
                        }
                    
                    ?>                    
                </tbody>
            </table>
        <!-- </div> -->
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>