<?php
//koneksi ke database
$dbHost = "localhost";    
$dbUser = "siaseday_user";    
$dbPass = "sedayu123qwe!!!";    
$dbName = "siaseday_sie2"; 
 
$connect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if (!$connect) die("Koneksi Gagal: " . mysqli_connect_error());


#ambil data di tabel dan masukkan ke array
$query = "select topik_kuis.judul, kelas.kelas_nama,users.users_nama,
pelajaran.pelajaran_nama,nilai_quis.nilai_point
 from topik_kuis,kelas,users,pelajaran,nilai_quis
 where nilai_quis.users_id=users.users_id 
 and nilai_quis.pelajaran_id=pelajaran.pelajaran_id 
 and nilai_quis.id_topik=topik_kuis.id_topik 
 and nilai_quis.kelas_id=kelas.kelas_id";
$results = mysqli_query($connect,$query) or die("Error: ".mysqli_error($connect));
$data = array();
while ($row = mysqli_fetch_assoc($results)) {
	array_push($data, $row);
}
 
#setting judul laporan dan header tabelt
$judul = "LAPORAN NILAI KUIS SISWA ";
$judul1 = "SMP N 1 SEDAYU";
$judul7 = "Alamat: Jl.Pedes-Nulis,Panggang,Argomulyo,Sedayu,Bantul,DIY ";
$header = array(
		array("label"=>"Topik", "length"=>5, "align"=>"C"),
		array("label"=>"Kelas", "length"=>2, "align"=>"C"),
		array("label"=>"Nama Siswa", "length"=>7, "align"=>"C"),
		array("label"=>"Mata Pelajaran", "length"=>3, "align"=>"C"),
		array("label"=>"Nilai", "length"=>2, "align"=>"C")
		
	);
	
 
#sertakan library FPDF dan bentuk objek
require_once ("fpdf/fpdf.php");

$pdf = new FPDF('P','cm','A4');
$pdf->Open();
$pdf->AddPage();
 
#tampilkan judul laporan
$pdf->SetFont('Times','B','17');
$pdf->Cell(0,2, $judul, '0',1, 'C');
$pdf->SetFont('Times','B','16');
$pdf->Cell(0,0, $judul1, '0', 1, 'C');
$pdf->SetFont('Times','B','12');
$pdf->SetFont('Times');
$pdf->Ln(1);
$pdf->Cell(0,0, $judul7, '0', 1, 'C');
$pdf->Ln(2);
$pdf->Line(1,4.5,20,4.5);
$pdf->SetLineWidth(0);
$pdf->Line(1,4.6,20,4.6);
$pdf->SetLineWidth(0,1);
$pdf->Line(1,4.6,20,4.6);


#buat header tabel
$pdf->SetFont('Arial','','8');
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
	$pdf->Cell($kolom['length'], 0.5, $kolom['label'], 0, '0', $kolom['align'], true);

}
$pdf->Ln();
 
#tampilkan data tabelnya
$pdf->SetFillColor(200,200,200);
$pdf->SetTextColor(0);
$pdf->SetFont('');
$fill=false;
foreach ($data as $baris) {
	$i = 0;
	foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 0.5, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
	}
	$fill = !$fill;
	$pdf->Ln();
	
}


 $pdf->Ln(5);
	$pdf->Cell(16,0, '                                                Bantul, '.date('d-m-Y').'', '0', 1, 'R'); 
$pdf->Ln(1);
$pdf->Cell(15,0, '                                                                                                                                                  Mengetahui ', '0', 1, 'R'); 
$pdf->Ln(3);
$pdf->Cell(16,0,'	__________________', '0', 0, 'R');

#output file PDF
$pdf->Output();
?>