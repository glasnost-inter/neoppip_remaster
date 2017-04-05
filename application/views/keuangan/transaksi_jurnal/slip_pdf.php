<?php
class PDF extends FPDF{
	
	var $TOTAL_NOMINAL;
	var $TERBILANG_NOMINAL;
    
    function set_TOTAL_NOMINAL($_TOTAL_NOMINAL){
        $this->TOTAL_NOMINAL = $_TOTAL_NOMINAL;  		
    }
	
	function set_TERBILANG_NOMINAL($_TERBILANG_NOMINAL){
        $this->TERBILANG_NOMINAL = $_TERBILANG_NOMINAL;      		
    }
	
    // Page header
    function Header()
    {
            // Logo
            //$this->Image('logo.png',10,6,30);
            $this->Ln();
            $this->SetFont('Arial','',10);
            $this->SetLeftMargin(15); 
            $this->Cell(50,6,'ASURANSI JIWASRAYA',0,0,'L');			
			$this->Cell(58,6,'',0,0,'R');
			$this->Cell(30,6,'ASLI',0,0,'L');	
			$this->Cell(5,6,'',0,0,'L');
			$this->Cell(35,6,'',0,0,'L');
			$this->Ln();
			$this->Cell(50,6,'DANA PENSIUN LEMBAGA KEUANGAN',0,0,'L');			
			$this->Cell(58,6,'',0,0,'R');
			$this->Cell(30,6,'NOMOR',0,0,'L');	
			$this->Cell(5,6,':',0,0,'L');
			$this->Cell(35,6,'',0,0,'L');
			$this->Ln();
			$this->Cell(50,6,'',0,0,'L');			
			$this->Cell(58,6,'',0,0,'R');
			$this->Cell(30,6,'TANGGAL',0,0,'L');	
			$this->Cell(5,6,':',0,0,'L');
			$this->Cell(35,6,'',0,0,'L');			
			$this->Ln();
			$this->Ln();
			$this->SetFont('Arial','B',10);
			$this->Cell(180,6,'SLIP Penerimaan',0,0,'C');
			$this->SetFont('Arial','',10);
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Cell(40,6,'DITERIMA DARI',0,0,'L');	
			$this->Cell(5,6,':',0,0,'L');
			$this->Cell(70,6,'Nasabah DPLK',0,0,'L');
			$this->Ln();
			$this->Cell(40,6,'UANG SEJUMLAH',0,0,'L');	
			$this->Cell(5,6,':',0,0,'L');
			$this->Cell(70,6,number_format($this->TOTAL_NOMINAL,2,',','.'),0,0,'L');
			$this->Ln();
			$this->Cell(40,6,'TERBILANG',0,0,'L');	
			$this->Cell(5,6,':',0,0,'L');
			//$this->Cell(70,6,$this->TERBILANG_NOMINAL,0,0,'L');
			$this->MultiCell(130,6,$this->TERBILANG_NOMINAL);            
			$this->Ln();
			$this->Cell(10,6,'NO',1,0,'C');
			$this->Cell(78,6,'KETERANGAN',1,0,'C');
			$this->Cell(30,6,'REK',1,0,'C');
			$this->Cell(60,6,'JUMLAH',1,0,'C');
			$this->Ln();			
    }

    // Page footer
    function Footer()
    {		
			$this->SetFont('Arial','B',10);
			$this->Cell(30+78+10,6,'TOTAL',1,0,'R');
			$this->Cell(60,6,number_format($this->TOTAL_NOMINAL,2,',','.'),1,0,'C');			
			$this->Ln();
            $this->Ln();            
            $this->SetLeftMargin(15); 
            $this->Cell(50,6,'Jakarta, 06 APRIL 2016',0,0,'L');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'',0,0,'C');	
            $this->Ln();
            $this->Ln();
			$this->Cell(50,6,'Diketahui Oleh',0,0,'C');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'',0,0,'C');				
			$this->Ln();
			$this->Cell(50,6,'Kabag. Keuangan & Investasi',0,0,'C');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'Kasir',0,0,'C');			
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Ln();
			$this->Cell(50,6,'(Abdul Bashit)',0,0,'C');			
			$this->Cell(78,6,'',0,0,'R');
			$this->Cell(50,6,'(Rizki Mutiara Devi)',0,0,'C');
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
		
			$this->Cell(10,20,$i,'L',0,'C');
			$this->Cell(78,20,$data->NAMA_AKUN,'L',0,'C');
			$this->Cell(30,20,$data->AKUN,'L',0,'C');
			$this->Cell(60,20,number_format($data->IURAN,2,',','.'),'L',0,'C');
			$this->Cell(1,20,'','L',0,'C');
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
foreach($hasil2 as $data2) {
    $pdf->set_TOTAL_NOMINAL($data2->TOTAL_NOMINAL);
    $pdf->set_TERBILANG_NOMINAL($data2->TERBILANG_NOMINAL);    
}

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