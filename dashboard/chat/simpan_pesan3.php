 <?php
include "db.php";
 
$id_forum   = $_POST['id_forum'];
$pesan   = $_POST['pesan'];
$tanggal   = date(d-m-Y);

  // Masukkan informasi file ke database
$query = "INSERT INTO reply_guru 
            VALUES('$id_forum','$pesan','$tanggal')";
mysqli_query($connect, $query);
header("location:chat_guru.php");
?>