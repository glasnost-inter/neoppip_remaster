<?php
class PDF extends FPDF{
	
	// Page header
    function Header()
    {
            // Logo
            //$this->Image('logo.png',10,6,30);
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->SetLeftMargin(15); 
            $this->Cell(100,6,'PT ASURANSI JIWASRAYA',0,0,'L');			
			$this->Cell(78,6,'No. SLIP        ',0,0,'R');	
            $this->Ln();
			$this->Cell(100,6,'DANA PENSIUN LEMBAGA KEUANGAN',0,0,'L');
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->SetFont('Arial','B',10);
			$this->Cell(180,6,'Lampiran SLIP Penerimaan',0,0,'C');
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			/*            
            $this->Ln();
            $this->SetFont('Arial','B',8.5);
            $this->SetFillColor(122,112,113);
            $this->Cell(50,5,'NAMA REKENING',1,0,'C',true);
            $this->Cell(25,5,'NOMOR REKENING','1',0,'C',true);
            $this->Cell(150,5,'URAIAN','1',0,'C',true);
            $this->Cell(50,5,'SEBESAR','1',0,'C',true);            
            $this->Ln();*/
    }

    // Page footer
    function Footer()
    {
            $this->Ln();
            $this->SetFont('Arial','B',10);
            $this->SetLeftMargin(15); 
            $this->Cell(50,6,'Jakarta, 06 APRIL 2016',0,0,'L');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'',0,0,'C');	
            $this->Ln();
            $this->Ln();
			$this->Cell(50,6,'Mengetahui',0,0,'L');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'Dibuat Oleh',0,0,'C');				
			$this->Ln();
			$this->Cell(50,6,'Kabag Operasional',0,0,'L');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'Pegawai Operasional',0,0,'C');			
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Cell(50,6,'(Abdul Salam)',0,0,'L');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'(Kartika Chandra Buana)',0,0,'C');
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
		
			$x1 = $this->GetX();
			$y1 = $this->GetY();
			$this->Rect($x1-2, $y1-4, 180, 30);
		
			$this->Cell(30,4,'Nama Rekening',0,0,'L');			
			$this->Cell(30,4,$data->NAMA_AKUN,0,0,'L');
			$this->Ln();
			$this->Cell(30,4,'Nomor Rekening',0,0,'L');			
			$this->Cell(30,4,$data->AKUN,0,0,'L');
			$this->Ln();
			$this->Cell(30,4,'Uraian',0,0,'L');			
			//$this->Cell(150,4,$data->KETERANGAN,0,0,'L');
			$this->MultiCell(140,4,$data->KETERANGAN);
			$this->Ln();
			$this->Cell(30,2,'Sebesar (Rp)',0,0,'L');
			$this->Cell(30,2,number_format($data->IURAN,2,',','.'),0,0,'L');
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			/*
			$this->Cell(50,5,'NAMA REKENING',1,0,'C',true);
            $this->Cell(150,5,,'1',0,'C');
			$this->Ln();
            $this->Cell(25,5,$data->,'1',0,'L');
			$this->Ln();
            $this->Cell(150,5,$data->,'1',0,'C');            
			$this->Ln();
            $this->Cell(50,5,number_format($data->,2,',','.'),'1',0,'R');            
			$this->Ln();
            $this->Ln();*/
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

$pdf = new PDF('P','mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetLeftMargin(15);
$pdf->SetFont('Arial','',9);

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