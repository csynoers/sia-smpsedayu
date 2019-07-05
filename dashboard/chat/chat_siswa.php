<?php
    require_once('../../config/db.php');
    session_start();
    function nested_forum($row,$nested=null)
    {
        return '
            <!-- Nested media object -->
            <div class="media">
                <div class="media-left">
                    <img src="https://www.w3schools.com/bootstrap/img_avatar3.png" class="media-object" style="width:45px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">'.$row['name'].' <small><i>Posted on '.$row['post_date'].'</i></small></h4>
                    <p>'.$row['post'].'</p>
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
                        echo '<pre>';
                        print_r( $rows );
                        echo '</pre>';
                        foreach ( $rows["fetch_assoc"] as $key => $value)
                        {
                            // print_r($value);
                            echo '<pre>';
                            print_r( query_result( $conn= $connect, $sql= "SELECT * FROM forums WHERE forums.user_id='{$value["user_id"]}' " ) );
                            echo '</pre>';
                            // $row= [
                            //     'name'=> $_SESSION["nama"],
                            //     'post_date'=> $value['post_date'],
                            //     'post'=> $value['post'],
                            // ];
                            // echo nested_forum($row);
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end /.forums-content -->
</body>
</html>