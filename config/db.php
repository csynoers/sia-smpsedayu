<?php
	/* koneksi mysql */
	mysql_connect("localhost","smpseday_sia","q2GV8&t!ikRW","smpseday_sia")or die("Gagal Koneksi");
	mysql_select_db("smpseday_sia")or die("Tidak ada Database");

	/* koneksi mysqli */
	$connect = mysqli_connect("localhost","smpseday_sia","q2GV8&t!ikRW","smpseday_sia");
	if (!$connect) die ("koneksi gagal:". mysqli_connect_error());

	/* function query with mysqli */
	function query_result($conn, $sql)
	{
		$sql = "SELECT * FROM forums";
		$result = mysqli_query($conn, $sql);

		# result fetch assoc
		$fetch_assoc = [];
		while ( $rows= mysqli_fetch_assoc($result) ) {
			$fetch_assoc[]= $rows;
		}

		return [
			'fetch_assoc' => $fetch_assoc,
			'num_rows' => mysqli_num_rows( $result ),
		];
	}
?>
