<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cpopakuntansi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('makuntansi');
        $data['hasil'] = $this->makuntansi->daftar_transaksi();
			
		$this->load->view('pop_top');		
		$this->load->view('keuangan/transaksi_jurnal/pop_main',$data);
		//$this->load->view('index_main');
		$this->load->view('pop_footer');
	}
	
	public function lampiran_slip($AS_ID_REKAP,$AS_NAMA_MUTASI)
	{
		$this->load->model('makuntansi');
		//echo 'AS_NAMA_MUTASI '.$AS_NAMA_MUTASI;die;
		if($AS_NAMA_MUTASI=='IURAN%20SEMENTARA%20UNIDENTIFIED'||$AS_NAMA_MUTASI=='IURAN%20SEMENTARA%20RETUR'){
			$data['hasil'] = $this->makuntansi->lampiran_slip_iuran_sementara_unidentified($AS_ID_REKAP);	
		}
		elseif($AS_NAMA_MUTASI=='CLOSING%20TAHUNAN'||$AS_NAMA_MUTASI=='CLOSING%20BULANAN'){
			$data['hasil'] = $this->makuntansi->lampiran_slip_iuran_closing($AS_ID_REKAP);	
		}
		else{
			$data['hasil'] = $this->makuntansi->lampiran_slip_daftar_iuran_lanjutan($AS_ID_REKAP);	
		}			
			
		$this->load->library('fpdf'); 	
		$this->load->view('keuangan/transaksi_jurnal/lampiran_slip_pdf',$data);		
	}
	
	public function slip_penerimaan($AS_ID_REKAP,$AS_NAMA_MUTASI)
	{
		$this->load->model('makuntansi');
		//echo 'AS_NAMA_MUTASI '.$AS_NAMA_MUTASI;die;
		if($AS_NAMA_MUTASI=='IURAN%20SEMENTARA%20UNIDENTIFIED'||$AS_NAMA_MUTASI=='IURAN%20SEMENTARA%20RETUR'){
			$data['hasil'] = $this->makuntansi->lampiran_slip_iuran_sementara_unidentified($AS_ID_REKAP);	
			$data['hasil2'] = $this->makuntansi->rekap_slip_iuran_sementara_unidentified($AS_ID_REKAP);	
		}
		elseif($AS_NAMA_MUTASI=='CLOSING%20TAHUNAN'||$AS_NAMA_MUTASI=='CLOSING%20BULANAN'){
			$data['hasil'] = $this->makuntansi->lampiran_slip_iuran_closing($AS_ID_REKAP);	
			$data['hasil2'] = $this->makuntansi->rekap_slip_iuran_closing($AS_ID_REKAP);	
		}
		else{
			$data['hasil'] = $this->makuntansi->lampiran_slip_daftar_iuran_lanjutan($AS_ID_REKAP);	
			$data['hasil2'] = $this->makuntansi->rekap_slip_daftar_iuran_lanjutan($AS_ID_REKAP);	
		}			
			
		$this->load->library('fpdf'); 	
		$this->load->view('keuangan/transaksi_jurnal/slip_pdf',$data);		
	}
        
        public function memorial_penerimaan($AS_ID_REKAP,$AS_NAMA_MUTASI)
	{
		$this->load->model('makuntansi');
		//echo 'AS_NAMA_MUTASI '.$AS_NAMA_MUTASI;die;
                /*
		if($AS_NAMA_MUTASI=='IURAN%20SEMENTARA%20UNIDENTIFIED'){
			$data['hasil'] = $this->makuntansi->lampiran_slip_iuran_sementara_unidentified($AS_ID_REKAP);	
			$data['hasil2'] = $this->makuntansi->rekap_slip_iuran_sementara_unidentified($AS_ID_REKAP);	
		}
		elseif($AS_NAMA_MUTASI=='CLOSING%20TAHUNAN'||$AS_NAMA_MUTASI=='CLOSING%20BULANAN'){
			$data['hasil'] = $this->makuntansi->lampiran_slip_iuran_closing($AS_ID_REKAP);	
			$data['hasil2'] = $this->makuntansi->rekap_slip_iuran_closing($AS_ID_REKAP);	
		}
		else{
			$data['hasil'] = $this->makuntansi->lampiran_slip_daftar_iuran_lanjutan($AS_ID_REKAP);	
			$data['hasil2'] = $this->makuntansi->rekap_slip_daftar_iuran_lanjutan($AS_ID_REKAP);	
		}
                */
                $data['hasil'] = $this->makuntansi->detail_memorial($AS_ID_REKAP);	
		$data['hasil2'] = $this->makuntansi->rekap_slip_iuran_closing($AS_ID_REKAP);	
			
		$this->load->library('fpdf'); 	
		$this->load->view('keuangan/transaksi_jurnal/memorial_pdf',$data);		
	}
		
}
