<?php

class PDF extends FPDF{
    
    var $NOMOR_GRUP;
    var $NAMA_GRUP;
    var $NO_SURAT_REF;
    var $TGL_SURAT_REF;
    
    function set_NOMOR_GRUP($_NOMOR_GRUP){
        $this->NOMOR_GRUP = $_NOMOR_GRUP;      
    }
    function set_NAMA_GRUP($_NAMA_GRUP){
        $this->NAMA_GRUP = $_NAMA_GRUP;
    }
    function set_NO_SURAT_REF($_NO_SURAT_REF){
        $this->NO_SURAT_REF = $_NO_SURAT_REF;
    }
    function set_TGL_SURAT_REF($_TGL_SURAT_REF){
        $this->TGL_SURAT_REF = $_TGL_SURAT_REF;
    }
    
    // Page header
    function Header()
    {
            // Logo
            //$this->Image('logo.png',10,6,30);
            $this->Ln();
            $this->SetFont('Arial','B',15);
            $this->SetLeftMargin(25); 
            $this->Cell(255,4,'LAMPIRAN KONFIRMASI PESERTA MUTASI',0,0,'L');
            $this->Ln();
            $this->Ln();
            $this->Cell(255,4,'GRUP : '.$this->NOMOR_GRUP.' - '.$this->NAMA_GRUP,0,0,'L');
            $this->Ln();
            $this->Ln();
            $this->Cell(255,4,'NO REFERENSI : '.$this->NO_SURAT_REF,0,0,'L');
            $this->Ln();
            $this->Ln();
            $this->Cell(255,4,'TANGGAL : '.$this->TGL_SURAT_REF,0,0,'L');
            $this->Ln();
            $this->Ln();
            $this->Ln();
            $this->SetFont('Arial','B',8.5);
            $this->SetFillColor(122,112,113);
            $this->Cell(10,5,'NO',1,0,'C',true);
            $this->Cell(25,5,'NO PESERTA','1',0,'C',true);
            $this->Cell(50,5,'NAMA','1',0,'C',true);
            $this->Cell(25,5,'TGL MASUK','1',0,'C',true);
            $this->Cell(25,5,'TGL LAHIR','1',0,'C',true);            
            $this->Cell(30,5,'NILAI TERSEDIA','1',0,'C',true);
            $this->Cell(30,5,'NILAI PERINTAH','1',0,'C',true);
            $this->Cell(30,5,'SELISIH','1',0,'C',true);
            $this->Ln();
    }

    // Page footer
    function Footer()
    {
            // Position at 1.5 cm from bottom
            //$this->SetY(-15);
            // Arial italic 8
            //$this->SetFont('Arial','I',8);
            // Page number
            /*$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');*/
    }
    
    // Table
    function Table($hasil)
    {
        //$this->SetFont('Calibri','',9);

        // body table
        /*
        foreach($hasil as $data) {
            $nomor_peserta = $data->NOMOR_PESERTA;
            $nama = $data->NAMA;
            $tgl_masuk = $data->TGL_MASUK;
            $tgl_lahir = $data->TGL_LAHIR;
            $gaji = $data->GAJI;
            $akumulasi_iuran = $data->AKUMULASI_IURAN;
            $akumulasi_hasil = $data->AKUMULASI_HASIL;
            $akumulasi_dana = $data->AKUMULASI_DANA;
        }
        */
        $i=1;
        foreach($hasil as $data) {            
            $this->Cell(10,5,$i,'1',0,'C');
            $this->Cell(25,5,$data->NOMOR_PESERTA,'1',0,'C');
            $this->Cell(50,5,$data->NAMA,'1',0,'L');
            $this->Cell(25,5,$data->TGL_MASUK,'1',0,'C');
            $this->Cell(25,5,$data->TGL_LAHIR,'1',0,'C');            
            $this->Cell(30,5,number_format($data->NILAI_TERSEDIA,2,',','.'),'1',0,'R');
            $this->Cell(30,5,number_format($data->NILAI_PERINTAH,2,',','.'),'1',0,'R');
            $this->Cell(30,5,number_format($data->SELISIH,2,',','.'),'1',0,'R');
            $this->Ln();
            if($data->SELISIH < 0){
                $x1 = $this->GetX();
                $y1 = $this->GetY();
                $this->Rect($x1+1, $y1+3, 4, 4);;
                $this->Cell(225,10, "        ".$this->NAMA_GRUP." Akan Membayarkan Kekurangan Langsung Ke Peserta Sebesar Rp. ".number_format(abs($data->SELISIH),2,',','.'),'1',0,'L');            
                $this->Ln();            
                $x1 = $this->GetX();
                $y1 = $this->GetY();
                $this->Rect($x1+1, $y1+3, 4, 4);                
                $this->Cell(225,10,"        Ambil kekurangan dari dana Sebesar Rp. ".number_format(abs($data->SELISIH),2,',','.')." Dari Peserta Dengan Nomor ........................................ atas nama .......................................................",'1',0,'L');
                $this->Ln();            
                $x1 = $this->GetX();
                $y1 = $this->GetY();
                $this->Rect($x1+1, $y1+3, 4, 4);                
                $this->Cell(225,10,"        Bayarkan Sesuai Nilai Tersedia yaitu Sebesar Rp. ".number_format($data->NILAI_TERSEDIA,2,',','.'),'1',0,'L');
            }else{
                $x1 = $this->GetX();
                $y1 = $this->GetY();
                $this->Rect($x1+1, $y1+3, 4, 4);                
                $this->Cell(225,10,"        Bayarkan Semua Akumulasi Dana Sebesar Rp.  ".number_format($data->NILAI_TERSEDIA,2,',','.'),'1',0,'L');
                $this->Ln();
                $x1 = $this->GetX();
                $y1 = $this->GetY();
                $this->Rect($x1+1, $y1+3, 4, 4);                
                $this->Cell(225,10,"        Kelebihan Iuran Sebesar Rp.   ".number_format(abs($data->SELISIH),2,',','.')." Diberikan Kepada Peserta Dengan Nomor ........................................ atas nama .......................................................
",'1',0,'L');                
            }    
            $this->Ln();
            
            
            
            
            // jika posisi y melebihi 221 dan jumlah record-1 = pointer, break
            //if ($this->GetY() > 221 && 20 == $i+1) {
            if ($i%3==0) {
                $this->AddPage();
            }
            $i++;
        }
        /*
        $this->Cell(array_sum($w),0,'','T');        
        $this->Ln();
        $this->Cell(165,8,'JUMLAH','TB',0,'C');
        $this->Cell(25,8,Money::format_rupiah($total_benefit),'TB',0,'R');
        */
    }
}


$today = NOWDATE;

$pdf = new PDF('L','mm', 'A4');
foreach($hasil2 as $data2) {
    $pdf->set_NOMOR_GRUP($data2->NOMOR_GRUP);
    $pdf->set_NAMA_GRUP($data2->NAMA_GRUP);
    $pdf->set_NO_SURAT_REF($data2->NO_SURAT_REF);
    $pdf->set_TGL_SURAT_REF($data2->TGL_SURAT_REF);     
}
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',8);
$pdf->Table($hasil);

//$pdf->Ln(15);

$pdf->Ln();
$pdf->MultiCell(170,4,'Demikian kami sampaikan konfirmasi atas pembayaran peserta kami, atas perhatian dan kerjasamanya, diucapkan terima kasih.');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,4,$data2->NAMA_GRUP,0,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50,4,'_____________________________________________________________(tanda tangan pejabat yang berotoritas)',0,0,'L');

$pdf->Output();

?>