<?php
class PDF extends FPDF{
    // Page header
    function Header()
    {
            // Logo
            //$this->Image('logo.png',10,6,30);
            $this->Ln();
            $this->SetFont('Arial','B',15);
            $this->SetLeftMargin(25); 
            $this->Cell(255,4,'LAMPIRAN PESERTA',0,0,'C');
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
            $this->Cell(30,5,'GAJI','1',0,'C',true);
            $this->Cell(30,5,'AKUMULASI IURAN','1',0,'C',true);
            $this->Cell(30,5,'AKUMULASI HASIL','1',0,'C',true);
            $this->Cell(30,5,'AKUMULASI DANA','1',0,'C',true);
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
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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
            $this->Cell(30,5,number_format($data->GAJI,2,',','.'),'1',0,'R');
            $this->Cell(30,5,number_format($data->AKUMULASI_IURAN,2,',','.'),'1',0,'R');
            $this->Cell(30,5,number_format($data->AKUMULASI_HASIL,2,',','.'),'1',0,'R');
            $this->Cell(30,5,number_format($data->AKUMULASI_DANA,2,',','.'),'1',0,'R');
            $this->Ln();
            //$total_benefit += $r[$i]['JML_BENEFIT'];

            // jika posisi y melebihi 221 dan jumlah record-1 = pointer, break
            if ($this->GetY() > 221 && 20 == $i+1) {
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
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetLeftMargin(25);
$pdf->SetFont('Arial','',8);
$pdf->Table($hasil);
/*
$pdf->Ln(15);

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
$pdf->Cell(50,4,'Plt. Pengurus / Kepada DPLK',0,0,'L');*/
$pdf->Output();

?>