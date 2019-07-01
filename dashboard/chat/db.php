<?php
$dbHost="localhost";
$dbUser="siaseday_user";
$dbPassword="sedayu123qwe!!!";
$dbName="siaseday_sie2";


$connect = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
if (!$connect) die ("koneksi gagal:". mysqli_connect_error());
?>