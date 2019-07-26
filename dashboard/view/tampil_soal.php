<div class="large-12 columns">
    <div class="box">
        <div class="box-header bg-transparent">
            <!-- tools box -->
            <div class="pull-right box-tools">
            <div class="pull-right box-tools">
                <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i>
                </span>
                <span class="box-btn" data-widget="remove"><i class="icon-cross"></i>
                </span>
                </div>
            </div>
            <h3 class="box-title"><i class="fontello-th-large-outline"></i>
                <span>Data Soal Kuis tes</span>
            </h3>
              <form>
        </div >
       <span>
       <div>
            <a href="?soal=tambah_soal&idpel=<?php echo $_GET['idpel']; ?>&idkel=<?php echo $_GET['idkel']; ?>&idtopik=<?php echo $_GET['idtopik']; ?>" class="tiny button"><span class="fontello-plus-outline"></span> Buat Soal</a>
        </div>
        <?php
        $guru=$_SESSION['level']==['guru'];
            $ip =$_GET['idpel'];
                        $sl =   mysql_query("SELECT *, pelajaran.pelajaran_nama, kelas.kelas_nama, topik_kuis.judul FROM kuis
                                                        INNER JOIN topik_kuis on topik_kuis.id_topik=kuis.id_topik
                                                        INNER JOIN pelajaran on pelajaran.pelajaran_id=kuis.pelajaran_id 
                                                        INNER JOIN kelas on kelas.kelas_id=kuis.kelas_id where pelajaran.pelajaran_id='$ip'
                                                        ORDER BY pelajaran.pelajaran_nama, kelas.kelas_nama ASC limit 1");
                            while ($r=mysql_fetch_array($sl)) {
                ?>
            <h6>Judul Kuis: <?php echo $r['judul']; ?> </h6> 
            <h6>Mata pelajaran: <?php echo $r['pelajaran_nama']; ?></h6>
            <h6>Kelas: <?php echo $r['kelas_nama']; ?></h6>
<?php } ?>
<thead>
<table>
                    <tr>
                        <th width="3%">No</th>
                        <th>soal</th>
                        <th>Jawaban A</th>
                        <th>Jawaban B</th>
                        <th>Jawaban C</th>
                        <th>Jawaban D</th>
                        <th>Kunci</th>
                        <th width="30%">Action</th>
                    </tr>
                </thead>
                <form role="form" method="post" />
                <?php 
                    $guru=$_SESSION['level']==['guru'];
                 ?>
                <tbody>
            <?php 
                    if (isset($_GET['soal'])) {
                        if ($_GET['soal'] == 'tampil_soal') {
                            $idpel = $_GET['idpel'];
                            $no         =   1;
                            $soal      =   mysql_query("SELECT *, pelajaran.pelajaran_nama, kelas.kelas_nama FROM kuis
                                                            INNER JOIN pelajaran on pelajaran.pelajaran_id=kuis.pelajaran_id 
                                                            INNER JOIN kelas on kelas.kelas_id=kuis.kelas_id where pelajaran.pelajaran_id= '$idpel'
                                                            ORDER BY pelajaran.pelajaran_nama, kelas.kelas_nama ASC");

                            while ($row=mysql_fetch_array($soal)) {
                                // print_r($row);
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td>
                            <?php
                                 echo $row['soal_kuis'];
                            ?>
                        </td>
                        <td>
                            <?php echo $row['pil_a'] ?>
                        </td>
                        <td>
                            <?php echo $row['pil_b'] ?>
                        </td>
                        <td>
                            <?php
                                echo $row['pil_c'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['pil_d'];
                            ?>
                        </td>
                        <td>
                            <?php
                                echo $row['kunci'];
                            ?>
                        </td>
                        <td> 
                            
                            <a href="?kuis-edit=<?php echo $row['id_kuis']; ?>" <?php if ($level == 'guru') {
                                echo 'style="display:none;"';
                            }  ?>><span class="fontello-edit"></span> Edit</a>
                            <a href="?kuis-delete=<?php echo $row['id_kuis'] ?>" <?php if ($level == 'guru') {
                                echo "style='display:none;'";
                            } ?>><span class="fontello-trash"></span> Delete</a>
                        </td>
                    </tr>
                <?php
                            $no++;
                            }
                        }
                    }
                ?>                    
                </tbody>
            </table>                           
        </div>
        <!-- end .timeline -->
    </div>
    <!-- box -->
</div>