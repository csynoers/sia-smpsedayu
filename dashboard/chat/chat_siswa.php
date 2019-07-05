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
                    <img src="https://www.w3schools.com/bootstrap/img_avatar3.png" class="media-object" style="width:45px">
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
    <section class="post-new-forum">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Post New Forum</div>
                <div class="panel-body">
                    <form method="POST" action="simpan_pesan.php">
						<input type="hidden" name="user_id" value="<?php echo $_SESSION['noinduk'] ?>">
                        <div class="form-group">
                            <textarea rows="5" name="post" class="form-control" placeholder="Isi Pesan Disini ..."></textarea>
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
                <div class="panel-heading">Forum Anda</div>
                <div class="panel-body">
                    <?php
                        $sql= "
                            SELECT 
                                pelajaran.pelajaran_id,
                                pelajaran.pelajaran_nama,
                                users.users_id,
                                users.users_noinduk,
                                users.users_nama
                            FROM pelajaran
                                INNER JOIN users
                                    ON pelajaran.users_id=users.users_id
                            WHERE 1=1
                                AND pelajaran.kelas_id='{$_SESSION["kelas"]}'
                                GROUP BY pelajaran.pelajaran_nama
                        ";
                        $rows= query_result( $conn= $connect, $sql= $sql );
                        // echo '<pre>';
                        // print_r( $rows );
                        // echo '</pre>';
                        foreach ( $rows["fetch_assoc"] as $key => $value)
                        {
                            $sql_1= "
                                SELECT *,
                                    DATE_FORMAT(tanggal_post, '%a,  %d %b %Y') AS post_date
                                FROM forums
                                    LEFT JOIN pelajaran
                                        ON forums.pelajaran_id=pelajaran.pelajaran_id
                                WHERE 1=1
                                    AND forums.user_id='{$value["users_id"]}'
                                    AND forums.pelajaran_id='{$value["pelajaran_id"]}'
                                    AND pelajaran.kelas_id='{$_SESSION["kelas"]}'
                            ";
                            $rows_1= query_result( $conn= $connect, $sql= $sql_1 );
                            if ( $rows_1['num_rows'] > 0 ) {
                                foreach ( $rows_1["fetch_assoc"]  as $key_1 => $value_1) {
                                    echo '<pre>';
                                    print_r( $value_1 );
                                    echo '</pre>';
                                    $row= [
                                        'forum_id'=> $value_1["forum_id"],
                                        'pelajaran_id'=> $value_1["pelajaran_id"],
                                        'name'=> $value['users_nama'] ." ({$value_1['pelajaran_nama']})",
                                        'post_date'=> $value_1['post_date'],
                                        'post'=> $value_1['post'],
                                        'reply'=> TRUE,
                                    ];
                                    if ( $value_1['rel_id'] > 0 ) {
                                        $sql_2= "
                                            SELECT * FROM forums WHERE rel_id='{$value_1["rel_id"]}'
                                        ";
                                        echo '<pre>';
                                        print_r( query_result($connect,$sql_2) );#tes
                                        echo '</pre>';
                                        // echo nested_forum($row);
                                    }else {
                                        echo nested_forum($row);
                                    }
                                }
                                
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