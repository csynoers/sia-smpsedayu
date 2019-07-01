 <?php
include "db.php";
 
$nik   = $_POST['nik'];
$pesan   = $_POST['pesan'];
$tanggal   = date('Y-m-d');

  // Masukkan informasi file ke database
$query = "INSERT INTO forum 
            VALUES('','$nik', '$pesan', '$tanggal')";
mysqli_query($connect, $query);
header("location:chat_guru.php");
?>