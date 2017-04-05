<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpopklaim extends CI_Controller {
	
	public function index()
	{                		                
            $this->load->view('_popheader');		
            $this->load->view('klaim/daftar_klaim_grup');		
            $this->load->view('_popfooter');
	} 
                        
        public function cetak_konfirmasi_selisih($nomorpeserta,$kodeklaim,$tglklaim)
	{                                                   
            $this->load->library('fpdf');                                   
            
            $this->load->model('mklaim');
            // update data no surat dan tgl surat konfirmasi
            //$this->mklaim->update_nosurat_konf();            
            
            $this->load->model('mpeserta');                        
            $this->load->model('mgrup');
            
            $tgltransaksi = str_replace("-","/",$tglklaim);
            
            $data['hasil'] = $this->mklaim->detail_peserta_konf_selisih($nomorpeserta,$kodeklaim,$tgltransaksi);
            $data['hasil2'] = $this->mpeserta->detail_peserta($nomorpeserta);
            $nomorgrup = $this->mpeserta->get_grup_peserta($nomorpeserta);
            $data['hasil3'] = $this->mgrup->get_detail_grup($nomorgrup);

            $this->load->view('operasional/klaim/view_konfirmasi_klaim_ppukp',$data);
            
	}
        
        public function cetak_konfirmasi_mutasi($NO_MUTASI)
	{                                                   
            $this->load->library('fpdf');                                   
            
            $this->load->model('mklaim');
                        
            $data['hasil'] = $this->mklaim->get_detail_peserta_mutasi($NO_MUTASI);                        
                        
            $data['hasil2'] = $this->mklaim->get_data_mutasi($NO_MUTASI);
            
            //var_dump($data);
            
            $this->load->view('operasional/klaim/vcetak_konfirmasi_mutasi',$data);
            
	} 
                           
}
