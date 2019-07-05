<?php
  require_once('../../config/db.php');
  
  $nik            = $_POST['user_id'];
  $pelajaran_id   = $_POST['pelajaran_id'];
  $pesan          = $_POST['post'];
  $tanggal        = date('Y-m-d');
  $rel_id         = (empty($_POST["rel_id"]) ? null : $_POST["rel_id"] );

  // Masukkan informasi file ke database
  $query = "INSERT INTO forums
              VALUES('', '{$nik}', '{$pelajaran_id}', '{$pesan}', '{$tanggal}', '{$rel_id}')";
  mysqli_query($connect, $query);
  echo "
    <script>
      window.history.go(-1);
    </script>
  ";
  // header("location:chat_guru.php");
?>