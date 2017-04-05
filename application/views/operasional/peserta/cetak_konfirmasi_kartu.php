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
    $nomor_peserta = $data->NOMOR_PESERTA;
    $nama = $data->NAMA;
    $usia_pensiun = $data->USIA_PENSIUN;
    $tgl_masuk = $data->TGL_MASUK;
    $iuran_awal = $data->IURAN_AWAL;
    $tgl_pensiun = $data->TGL_PENSIUN;
    $pilihan_paket_inv = $data->PILIHAN_PAKET_INV;
    $nama_grup = $data->NAMA_GRUP;
    $alamat = $data->ALAMAT;
    $kota = $data->KOTA;
    $kode_pos = $data->KODE_POS;
    $va = $data->VA;
    $today = $data->TODAY;
    $trans_awal = $data->TRANS_AWAL;
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->AddFont('Tahoma','','tahoma.php');
//$pdf->AddFont('Tahoma','B','tahomabd.php');
//$pdf->SetFont('Tahoma','',12);

$pdf->Ln();
$pdf->SetLeftMargin(25);
$x1 = $pdf->GetX();
$y1 = $pdf->GetY();
$pdf->Rect($x1-2, $y1-4, 85, 40);
$pdf->SetFont('Arial','',6);
$pdf->Cell(70,3,'a.     Pembayaran Top Up Sekaligus dapat dilakukan melalui:',0,0,'L');
$pdf->SetLeftMargin(25+5);
$pdf->Ln();
$pdf->Cell(70,3,'- Virtual Account Bank BNI dan Bank Mandiri',0,0,'L');
$pdf->Ln();
$pdf->Cell(70,3,'- Mengisi Formulir Top Up Sekaligus dan melampirkan bukti dikirim via email',0,0,'L');
$pdf->SetLeftMargin(25);
$pdf->Ln();
$pdf->Cell(70,3,'b.     Ketentuan Top Up Sekaligus:',0,0,'L');
$pdf->SetLeftMargin(25+5);
$pdf->Ln();
$pdf->Cell(70,3,'- Dapat dilakukan setiap saat.',0,0,'L');
$pdf->Ln();
$pdf->Cell(70,3,'- Minimal Top Up Sekaligus Rp100.000,00',0,0,'L');
$pdf->SetLeftMargin(25);
$pdf->Ln();
$pdf->Cell(70,3,'c.     Apabila terdapat hal-hal yang kurang jelas dan membutuhkan informasi lebih',0,0,'L');
$pdf->SetLeftMargin(5+25);
$pdf->Ln();
$pdf->Cell(70,3,'lanjut, Bapak/Ibu dapat menghubungi DPLK Jiwasraya',0,0,'L');
$pdf->Ln();
$pdf->SetLeftMargin(10+25);
$pdf->Cell(70,3,'- DPLK Call Center : 021-31920312',0,0,'L');
$pdf->Ln();
$pdf->Cell(70,3,'- Email : dplk@jiwasraya.co.id',0,0,'L');
$pdf->Ln();
$pdf->Cell(70,3,'- Website : http://dplk.jiwasraya.co.id',0,0,'L');
$pdf->Ln(5);
$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',9);


$image1 = base_url('images/barcode/'.$nomor_peserta.'.png');
$pdf->Ln();
$pdf->Ln();
$x1 = $pdf->GetX();
$y1 = $pdf->GetY();
$pdf->Image($image1, $x1-2, $y1,50,10);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(90+15,4,$nama,0,0,'L');
//$pdf->Cell(,4,'',0,0,'L');
$pdf->Cell(50,4,'Jakarta, '.$today,0,0,'L');
$pdf->Ln();
$pdf->Cell(90+15,4,'',0,0,'L');
$pdf->Cell(50,4,'NOMOR  :  '.$nomorsurat,0,0,'L');
$pdf->Ln();
$pdf->Cell(90+10,4,$nama_grup,0,0,'L');
$pdf->Ln();
$pdf->Cell(90+10,4,$alamat,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,4,$kota.' '.$kode_pos,0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(70,4,'PERIHAL  :  PENGIRIMAN KARTU',0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(70,4,'Dengan Hormat,',0,0,'L');
$pdf->Ln();
$pdf->MultiCell(170,4,'Terima kasih atas kepercayaan yang diberikan kepada DPLK Jiwasraya dalam memberikan pengelolaan dana Pensiun kepada Bapak/Ibu beserta keluarga. Bersama ini kami sampaikan rincian transaksi Bapak/Ibu sebagai berikut:');
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
$pdf->Cell(50,4,'Pilihan Paket Investasi',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,$pilihan_paket_inv,0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->MultiCell(170,4,'Untuk pembayaran lanjutan dan Top Up Sekaligus dapat menggunakan fasilitas Virtual Account adalah sebagai berikut:');
$pdf->Ln();
$pdf->Cell(50,4,'No. Virtual Account BNI',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,'9881993-'.$va,0,0,'L');
$pdf->Ln();
$pdf->Cell(50,4,'No. Virtual Account BNI',0,0,'L');
$pdf->Cell(5,4,':',0,0,'L');
$pdf->Cell(50,4,'88122-'.$va,0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,4,'Rincian Transaksi',0,0,'L');
$pdf->Ln();
$pdf->SetLineWidth(0.5);
$pdf->SetFillColor(122,112,113);
$pdf->Cell(20,4,'Tgl','T',0,'C',true);
$pdf->Cell(20,4,'Kode','T',0,'C',true);
$pdf->Cell(110,4,'Keterangan','T',0,'L',true);
$pdf->Cell(20,4,'Jumlah','T',0,'L',true);
$pdf->SetLineWidth(0);
$pdf->Ln();
$pdf->Cell(20,4,'Transaksi','B',0,'C',true);
$pdf->Cell(20,4,'','B',0,'C',true);
$pdf->Cell(110,4,'','B',0,'L',true);
$pdf->Cell(20,4,'','B',0,'L',true);
$pdf->SetFont('Arial','',9);
$pdf->Ln();
$pdf->Cell(20,4,$trans_awal,'B',0,'C');
$pdf->Cell(20,4,'0','B',0,'C');
$pdf->Cell(110,4,'Setoran Awal Iuran Kepesertaan','B',0,'L');
$pdf->Cell(20,4,number_format($iuran_awal,2,',','.'),'B',0,'R');
$pdf->Ln();
$pdf->SetLineWidth(0.5);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(20,4,'Total Dana','B',0,'C');
$pdf->Cell(20,4,'','B',0,'C');
$pdf->Cell(110,4,'','B',0,'L');
$pdf->Cell(20,4,number_format($iuran_awal,2,',','.'),'B',0,'R');
$pdf->SetFont('Arial','',9);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80,4,'Demikian kami sampaikan, atas perhatian dan kerjasama diucapkan terima kasih.',0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','BU',9);
$pdf->Cell(80,4,'INI ADALAH KARTU DPLK JIWASRAYA ANDA',0,0,'L');
$image1 = base_url('images/placeholder_kartu.png');
$pdf->Ln();
$x1 = $pdf->GetX();
$y1 = $pdf->GetY();
$pdf->Image($image1, $x1, $y1,100,60);
$pdf->SetFont('Arial','',7);
$pdf->Ln();
$pdf->SetLeftMargin(130);
$pdf->Cell(50,3,'A.   Nomor kartu Anda.',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,3,'B.   Nama lengkap Anda seperti yang tercantum didalam',0,0,'L');
$pdf->Ln();
$pdf->SetLeftMargin(135);
$pdf->Cell(50,3,'arsip kami.',0,0,'L');
$pdf->SetLeftMargin(130);
$pdf->Ln();
$pdf->Cell(50,3,'C.   Kartu Anda Berlaku sampai pada akhir bulan dan',0,0,'L');
$pdf->Ln();
$pdf->SetLeftMargin(135);
$pdf->Cell(50,3,'tahun yang tertera di kartu.',0,0,'L');
$pdf->SetLeftMargin(130);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',7);
$pdf->Cell(50,4,'PENTING UNTUK PERLINDUNGAN ANDA',0,0,'L');
$pdf->SetFont('Arial','',7);
$pdf->Ln();
$pdf->Cell(50,3,chr(127).'   Segera tanda tangani kartu Anda pada panel tersedia',0,0,'L');
$pdf->SetLeftMargin(133);
$pdf->Ln();
$pdf->Cell(50,3,'dibelakang kartu dan simpan di tempat aman.',0,0,'L');
$pdf->SetLeftMargin(130);
$pdf->Ln();
$pdf->Cell(50,3,chr(127).'   Segala bentuk penyalahgunaan kartu ini menjadi',0,0,'L');
$pdf->SetLeftMargin(133);
$pdf->Ln();
$pdf->Cell(50,3,'tanggung jawab peserta dan dapat dituntut sesuai',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,3,'dengan ketentuan hukum yang berlaku.',0,0,'L');
$pdf->SetLeftMargin(130);
$pdf->Ln();
$pdf->Cell(50,3,chr(127).'   Apabila kartu Anda hilang, segera melapor ke DPLK',0,0,'L');
$pdf->SetLeftMargin(133);
$pdf->Ln();
$pdf->Cell(50,3,'Jiwasraya, info :',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,3,'Telp     : 021-31920312 atau',0,0,'L');
$pdf->Ln();
$pdf->Cell(50,3,'E-mail   : dplk@jiwasraya.co.id',0,0,'L');
$pdf->SetLeftMargin(130);
$pdf->Ln();
$pdf->Cell(50,3,chr(127).'   Perhatikan masa berlaku kartu Anda.',0,0,'L');
$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',6);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80,3,'*Dokumen ini tidak memerlukan tanda tangan karena dicetak secara komputerisasi',0,0,'L');
$pdf->Ln();
$pdf->Cell(80,3,'**Kartu hilang atau rusak untuk segera dilaporkan ke DPLK Jiwasraya untuk dapat diganti dengan yang baru dengan melampirkan surat keterangan hilang dari kepolisian',0,0,'L');
$pdf->Output();

?>