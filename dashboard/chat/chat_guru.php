<?php
    require_once('../../config/db.php');
    session_start();
    function nested_forum($row,$nested=null)
    {
        if ( $row['reply']==1 ) {
            $form_reply= '
                <button class="btn btn-block btn-success" data-toggle="collapse" data-target="#demo_'.$row["forum_id"].'">Reply</button>
                <div id="demo_'.$row["forum_id"].'" class="collapse">
                    <div class="panel panel-success">
                        <div class="panel-body">
                            <form method="POST" action="simpan_pesan.php">
                                <input type="hidden" name="user_id" value="'.$_SESSION['id'].'">
                                <input type="hidden" name="pelajaran_id" value="'.$row['pelajaran_id'].'">
                                <input type="hidden" name="rel_id" value="'.$row['forum_id'].'">
                                <div class="form-group">
                                    <textarea required="" rows="5" name="post" class="form-control" placeholder="Isi Pesan Disini ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            '; 
        }else {
            $form_reply= null; 
        }
        return '
            <!-- Nested media object -->
            <div class="media">
                <div class="media-left">
                    <img src="<img src="https://img.icons8.com/cotton/64/000000/speech-bubble-with-dots.png">" class="media-object" style="width:45px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">'.$row['name'].' <small><i>Posted on '.$row['post_date'].'</i></small></h4>
                    <p>'.$row['post'].'</p>
                    '.$form_reply.'
                    '.(empty($nested)? null : $nested ).'
                </div>
            </div>
        ';
    }
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Informasi Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <section class="post-new-forum" style="margin-top: 3em;">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Post New Forum</div>
                <div class="panel-body">
                    <form method="POST" action="simpan_pesan.php">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
                        <div class="form-group">
                            <textarea required="" rows="5" name="post" class="form-control" placeholder="Isi Pesan Disini ..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Mata Pelajaran Yang Diampu</label>
                            <select name="pelajaran_id" id="" required="" class="form-control">
                                <?php
                                    $sql= "
                                        SELECT *
                                        FROM pelajaran
                                            INNER JOIN kelas
                                                ON pelajaran.kelas_id=kelas.kelas_id
                                        WHERE 1=1
                                            AND pelajaran.users_id='{$_SESSION["id"]}'
                                    ";
                                    $rows= query_result( $conn= $connect, $sql= $sql );
                                    foreach ( $rows["fetch_assoc"] as $key => $value) {
                                        echo "<option value='{$value["pelajaran_id"]}'>{$value["pelajaran_nama"]} Kelas ({$value["kelas_nama"]})</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end /.post-new-forum -->

    <section class="forums-content">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Forum Diskusi Anda</div>
                <div class="panel-body">
                    <?php
                        $sql = "
                            SELECT
                                forums.forum_id,
                                forums.pelajaran_id,
                                forums.post,
                                DATE_FORMAT(tanggal_post, '%a,  %d %b %Y') AS post_date,
                                pelajaran.pelajaran_nama,
                                kelas.kelas_nama
                            FROM
                                forums,
                                pelajaran,
                                kelas
                            WHERE 1=1
                                AND forums.user_id='{$_SESSION["id"]}'
                                AND forums.pelajaran_id=pelajaran.pelajaran_id
                                AND pelajaran.kelas_id=kelas.kelas_id
                        ";
                        $rows= query_result( $conn= $connect, $sql= $sql );
                        // echo '<pre>';
                        // print_r( $rows );
                        // echo '</pre>';
                        foreach ( $rows["fetch_assoc"] as $key => $value)
                        {
                            $row= [
                                'forum_id'=> $value["forum_id"],
                                'pelajaran_id'=> $value["pelajaran_id"],
                                'name'=> $_SESSION["nama"] ." ({$value["pelajaran_nama"]} {$value["kelas_nama"]})",
                                'post_date'=> $value['post_date'],
                                'post'=> $value['post'],
                                'reply'=> TRUE,
                            ];
                            $sql_2= "
                                SELECT
                                    forums.*,
                                    DATE_FORMAT(tanggal_post, '%a,  %d %b %Y') AS post_date,
                                    users.users_nama
                                FROM forums
                                    INNER JOIN users
                                        ON forums.user_id=users.users_id
                                WHERE 1=1
                                    AND forums.rel_id='{$value["forum_id"]}'
                            ";
                            $rows_2= query_result($connect,$sql_2);
                            if ( $rows_2['num_rows'] > 0 ) {
                                $nested_row= "";
                                foreach ($rows_2['fetch_assoc'] as $key_2 => $value_2) {
                                    $row_2= [
                                        'forum_id'=> $value_2["forum_id"],
                                        'pelajaran_id'=> $value_2["pelajaran_id"],
                                        'name'=> $value_2['users_nama'],
                                        'post_date'=> $value_2['post_date'],
                                        'post'=> $value_2['post'],
                                        'reply'=> FALSE,
                                    ];
                                    $nested_row .= nested_forum($row_2);
                                }
                                echo nested_forum($row, $nested_row );
                                // echo '<pre>';
                                // print_r( $rows_2 );#tes
                                // echo '</pre>';
                            } else {
                                echo nested_forum($row);
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end /.forums-content -->
</body>
</html>

