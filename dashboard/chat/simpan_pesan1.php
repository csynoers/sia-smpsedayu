 <?php
include "db.php";
 
$id_forum   = $_POST['id_forum'];
$nis   = $_POST['nis'];
$pesan   = $_POST['pesan'];
$tanggal   = date('Y-m-d');

  // Masukkan informasi file ke database
$query = "INSERT INTO detail_forum 
            VALUES('', '$id_forum', '$nis', '$pesan','$tanggal')";
mysqli_query($connect, $query);
header("location:chat_siswa.php");
?>