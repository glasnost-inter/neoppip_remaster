<?php
class PDF extends FPDF{
    // Page header
    function Header()
    {
            // Logo
            //$this->Image('logo.png',10,6,30);
            // Arial bold 15
            //$this->SetFont('Arial','B',15);
            // Move to the right
            //$this->Cell(80);
            // Title
            //$this->Cell(30,10,'Title',1,0,'C');
            // Line break
            //$this->Ln(20);
    }

    // Page footer
    function Footer()
    {
            // Position at 1.5 cm from bottom
            //$this->SetY(-15);
            // Arial italic 8
            //$this->SetFont('Arial','I',8);
            // Page number
            //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

foreach($hasil as $data) {
    $kode_klaim = $data->KODE_KLAIM;
    $tgl_klaim = $data->TGL_KLAIM;
    $nomor_peserta = $data->NOMOR_PESERTA;
    $nomorgrup = $data->NOMOR_GRUP;
    $jumlah_klaim_perintah = $data->JUMLAH_KLAIM_PERINTAH;
    $nama_penerima = $data->NAMA_PENERIMA;
    $status = $data->STATUS;
    $userrekam = $data->USERREKAM;
    $userupdate = $data->USERUPDATE;
    $tglrekam = $data->TGLREKAM;
    $tglupdate = $data->TGLUPDATE;
    $cara_bayar = $data->CARA_BAYAR;
    $status_proses = $data->STATUS_PROSES;
    $akumulasi_iuran = $data->AKUMULASI_IURAN;
    $akumulasi_hasil = $data->AKUMULASI_HASIL;
    $akumulasi_dana = $data->AKUMULASI_DANA;
    $hasil_simulasi = $data->HASIL_SIMULASI;
    $selisih = $data->SELISIH;
    $selisih_iuran = $data->SELISIH_IURAN;
    $no_surat_ref = $data->NO_SURAT_REF;
    $tgl_surat_ref = $data->TGL_SURAT_REF;
    $nomorsurat = $data->NO_SURAT_KONF;
    $today = $data->TGL_SURAT_KONF;
}

foreach($hasil2 as $data2) {       
    $kota = $data2->KOTA;    
    $kode_pos = $data2->KODE_POS;    
    
    $nama = $data2->NAMA;    
    $tgl_masuk = $data2->TGL_MASUK;    
    $tgl_pensiun = $data2->TGL_PENSIUN;    
    $usia_pensiun = $data2->USIA_PENSIUN;    
    
}

foreach($hasil3 as $data3) {
    $nama_grup = $data3->NAMA_GRUP;    
    $alamat = $data3->ALAMAT; 
}

//$today = NOWDATE;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',9);

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln(15);
$pdf->Cell(50,4,'Jakarta, '.$today,0,0,'L');
$pdf->Ln();
$pdf->Cell(90,4,'',0,0,'L');
$pdf->Cell(20,4,'NOMOR',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(30,4,$nomorsurat,0,0,'L');
$pdf->Ln();
$pdf->Cell(90,4,'',0,0,'L');
$pdf->Cell(20,4,'PERIHAL',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(30,4,'Selisih Manfaat',0,0,'L');
$pdf->Ln();
$pdf->Cell(90,4,'',0,0,'L');
$pdf->Cell(20,4,'LAMPIRAN',0,0,'L');
$pdf->Cell(5,4,':',0,0,'C');
$pdf->Cell(30,4,'1(satu) set',0,0,'L');
$pdf->Ln();
$pdf->Cell(90+10,4,'Kepada Yth',0,0,'L');
$pdf->Ln();
$pdf->Cell(90+10,4,$nama_grup,0,0,'L');
$pdf->Ln();
$pdf->Cell(90+10,4,$alamat,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,4,$kota.' '.$kode_pos,0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(70,4,'Dengan Hormat,',0,0,'L');
$pdf->Ln();
$pdf->MultiCell(170,4,'Menunjuk surat perintah pembayaran manfaat PPUKP '.$nama_grup.' Nomor : '.$no_surat_ref.' Tanggal '.$tgl_surat_ref.' Perihal Selisih Manfaat, bersama ini kami beritahukan bahwa terdapat selisih perhitungan antara manfaat yang kami hitung dengan perintah bayar atas nama '.$nama.' sesuai data sebagai berikut :');
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,6,'DATA DIRI',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Ln();
$pdf->Cell(50,4,'Nomor DPLK',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$nomor_peserta,0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'Nama Peserta',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$nama,0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'Mulai Kepesertaan',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$tgl_masuk,0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'Akhir Kepesertaan',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$tgl_pensiun,0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'Masa Pensiun',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$usia_pensiun.' Tahun',0,0,'L');

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,6,'DATA PERHITUNGAN',0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Ln();
$pdf->Cell(50,4,'Akumulasi Iuran',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(20,4,number_format($akumulasi_iuran,0,',','.'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,4,'Akumulasi Hasil',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(20,4,number_format($akumulasi_hasil,0,',','.'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,4,'Akumulasi Dana',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(20,4,number_format($akumulasi_dana,0,',','.'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,4,'Nilai Perintah',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(20,4,number_format($jumlah_klaim_perintah,0,',','.'),0,0,'R');
$pdf->Ln();
$pdf->Cell(50,4,'Selisih',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(20,4,number_format($selisih,0,',','.'),0,0,'R');
if($selisih_iuran > 0){
    $pdf->Ln();
    $pdf->Cell(50,4,'Kelebihan Iuran',0,0,'L');
    $pdf->Cell(5,4,':',0,0,'L');
    $pdf->Cell(20,4,number_format($selisih_iuran,0,',','.'),0,0,'R');
}
/*
$pdf->Ln();
$pdf->Cell(50,4,'Pilihan Paket Investasi',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$pilihan_paket_inv,0,0,'L');
*/
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(170,4,'Untuk itu,mohon pilih metode yang akan diambil sebagai berikut:');

if($selisih_iuran > 0){       
    $pdf->Ln();
    $x1 = $pdf->GetX();
    $y1 = $pdf->GetY();
    $pdf->Rect($x1+1, $y1, 4, 4);
    $pdf->Cell(50,4,'       Bayarkan Semua Akumulasi Dana Sebesar Rp. '.number_format($akumulasi_dana,0,',','.'),0,0,'L');    
    $pdf->Ln();
    $pdf->Ln();
    $x1 = $pdf->GetX();
    $y1 = $pdf->GetY();
    $pdf->Rect($x1+1, $y1, 4, 4);    
    $pdf->Cell(50,4,'       Kelebihan Iuran Sebesar Rp. '.number_format($selisih_iuran,0,',','.'));    
    $pdf->Ln();
    $pdf->Cell(50,4,'       Diberikan Kepada Peserta Dengan Nomor ........................................ atas nama .......................................................');    
}elseif($selisih > 0){       
    $pdf->Ln();
    $x1 = $pdf->GetX();
    $y1 = $pdf->GetY();
    $pdf->Rect($x1+1, $y1, 4, 4);
    $pdf->Cell(50,4,'       Bayarkan Semua Akumulasi Dana Sebesar Rp. '.number_format($akumulasi_dana,0,',','.'),0,0,'L');    
    $pdf->Ln();
    $pdf->Ln();
    $x1 = $pdf->GetX();
    $y1 = $pdf->GetY();
    $pdf->Rect($x1+1, $y1, 4, 4);
    $pdf->Cell(50,4,'       Bayarkan Sesuai Dengan Perintah Bayar Rp. '.number_format($jumlah_klaim_perintah,0,',','.'),0,0,'L');        
}elseif($selisih < 0){
    $pdf->Ln();
    $x1 = $pdf->GetX();
    $y1 = $pdf->GetY();
    $pdf->Rect($x1+1, $y1, 4, 4);
    $pdf->Cell(50,4,'       '.$nama_grup.' Akan Membayarkan Kekurangan Langsung Ke Peserta Sebesar Rp. '.number_format(abs($selisih),0,',','.'),0,0,'L');    
    $pdf->Ln();
    $pdf->Ln();
    $x1 = $pdf->GetX();
    $y1 = $pdf->GetY();
    $pdf->Rect($x1+1, $y1, 4, 4);
    $pdf->Cell(50,4,'       Ambil kekurangan dari dana Sebesar Rp. '.number_format(abs($selisih),0,',','.'));    
    $pdf->Ln();
    $pdf->Cell(50,4,'       Dari Peserta Dengan Nomor ........................................ atas nama .......................................................');        
}

$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(170,4,'Demikian kami sampaikan, atas perhatian dan kerjasamanya, kami ucapkan terima kasih.');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,4,'PT. ASURANSI JIWASRAYA (PERSERO)',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'DANA PENSIUN LEMBAGA KEUANGAN',0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50,4,'LUSIANA',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'Plt. Pengurus / Kepada DPLK',0,0,'L');
$pdf->Output();

?>