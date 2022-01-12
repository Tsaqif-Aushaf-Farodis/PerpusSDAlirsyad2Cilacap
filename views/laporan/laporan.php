<?php
error_reporting(0);
$koneksi = new mysqli("localhost","root","","perpus_sd_alirsyad");
$content ='
<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;   }
</style>
';


 $content .= '
<page>
<h1>Laporan Data Buku</h1>
<br>


<table border="1px" class="tabel"  >
<tr>
<th>No.</th>
<th>Nama Peminjam</th>
<th>Judul Buku</th>
<th>Tanggal Pengembalian</th>
<th>Status</th>
</tr>';



if (isset($_POST['cetak'])) {


	
	$tgl1 = $_POST['tanggal1'];
	$tgl2 = $_POST['tanggal2'];

	
		
	$no = 1;
	$sql = $koneksi->query("select * from peminjaman where tgl_kembali between '$tgl1' and '$tgl2' ");
	// echo $tgl1; echo "<br>"; echo $tgl2;
	while ($tampil=$sql->fetch_assoc()) {

	$content .='
		<tr>
			<td align="center">'.$no++.'</td>
			<td align="center">'.$tampil['username'].'</td>
			<td align="center">'.$tampil['judul_buku'].'</td>
			<td align="center">'.$tampil['tgl_kembali'].'</td>
			<td align="center">'.$tampil['status'].'</td>
		</tr>
	';	
}
// echo $tgl1; echo "<br>"; echo $tgl2;
}else{

$no=1;

$sql = $koneksi->query("select * from peminjaman");
while ($tampil=$sql->fetch_assoc()) {
	$content .='
		<tr>
        <td align="center">'.$no++.'</td>
        <td align="center">'.$tampil['username'].'</td>
        <td align="center">'.$tampil['judul_buku'].'</td>
        <td align="center">'.$tampil['tgl_kembali'].'</td>
        <td align="center">'.$tampil['status'].'</td>
		</tr>
	';
}
}

$content .='
</table>
</page>';

require_once('../web/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');
