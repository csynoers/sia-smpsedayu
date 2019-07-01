<?php
	/* koneksi mysql */
	mysql_connect("localhost","smpseday_sia","q2GV8&t!ikRW","smpseday_sia")or die("Gagal Koneksi");
	mysql_select_db("smpseday_sia")or die("Tidak ada Database");

	/* koneksi mysqli */
	$connect = mysqli_connect("localhost","smpseday_sia","q2GV8&t!ikRW","smpseday_sia");
	if (!$connect) die ("koneksi gagal:". mysqli_connect_error());
?>
