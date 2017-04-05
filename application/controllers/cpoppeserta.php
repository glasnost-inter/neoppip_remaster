<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpoppeserta extends CI_Controller {
	
	public function index()
	{                		                
            $this->load->view('pop_top');		
            $this->load->view('operasional/peserta/daftar_peserta_grup');		
            $this->load->view('pop_footer');
	} 
        

        public function popfilterpesertagrup($NOMOR_GRUP)
	{   
            $this->load->model('mpeserta');
            $data['hasil'] = $this->mpeserta->get_peserta_grup($NOMOR_GRUP);
            
            $this->load->view('pop_top');		
            $this->load->view('operasional/peserta/pop_peserta_grup',$data);		
            $this->load->view('pop_footer');
	}
        
        public function filtergrup($nomorgrup)
        {                
            $this->load->model('mpeserta');
            $data['hasil'] = $this->mpeserta->daftar_peserta_grup();

            $this->load->model('mgrup');
            $data['program_grup'] = $this->mgrup->get_program_grup();

            $this->load->view('index_top');
            $this->load->view('index_left');		
            $this->load->view('operasional/peserta/daftar_peserta_grup',$data);
            //$this->load->view('_hidden_right');
            $this->load->view('index_footer');                
        }
        
        public function detail_peserta($nomorpeserta)
	{                
            $this->load->model('mpeserta');
            $data['hasil'] = $this->mpeserta->detail_peserta($nomorpeserta);

            $this->load->view('pop_top');
            $this->load->view('operasional/peserta/detail_peserta',$data);
            //$this->load->view('operasional/peserta/index_main_form',$data);
            $this->load->view('pop_footer');
	}
        
        public function simulasi_peserta_ppukp($nomorpeserta)
	{                
            $this->load->model('mbuku_dana');    
            //get data simulasi            
            $data['nomorpeserta'] = $nomorpeserta;
            
            $tgltransaksi = $this->input->post('tgltransaksi');
            if(isset($tgltransaksi)){
               $data['tgltransaksi'] = $tgltransaksi;
            }else{
               $data['tgltransaksi'] = '01/'.date("m/Y"); 
               $tgltransaksi = '01/'.date("m/Y"); 
            }
            
            $kodeklaim = $this->input->post('kodeklaim');
            if(isset($kodeklaim)){
               $data['kodeklaim'] = $kodeklaim;
            }else{
               $data['kodeklaim'] = 'MPNORMAL'; 
               $kodeklaim = 'MPNORMAL';  
            }
            
            $this->load->model('mpeserta');    
            
            $nomorgrup = $this->input->post('nomorgrup');
            if(isset($nomorgrup)){
               $data['nomorgrup'] = $nomorgrup;
            }else{
               $data['nomorgrup'] = $this->mpeserta->get_grup_peserta($nomorpeserta);  
            }
            
            $nilaiperintah = $this->input->post('nilaiperintah');
            if(isset($nilaiperintah)){
               $data['nilaiperintah'] = $nilaiperintah;
            }else{
               $data['nilaiperintah'] = 0; 
            }                                    
                
            //get akumulasi dana            
            $data['akumulasi_iuran'] = $this->mbuku_dana->get_akum_ind_ppukp($nomorpeserta,'1');
            $data['akumulasi_hasil'] = $this->mbuku_dana->get_akum_ind_ppukp($nomorpeserta,'2');
            $data['akumulasi_dana'] = $this->mbuku_dana->get_akum_ind_ppukp($nomorpeserta,'3');
                        
            // get hasil simulasi
            $data['hasil_simulasi'] = $this->mbuku_dana->get_simulasi_ind_ppukp($nomorpeserta,$tgltransaksi,$kodeklaim);
                        
            $this->load->view('pop_top');
            $this->load->view('operasional/peserta/simulasi_pst_ppukp',$data);
            $this->load->view('pop_footer');
	}
        
        public function isi_nosurat_konf_kartu($nomorpeserta)
	{                
            $data['nomorpeserta'] = $nomorpeserta;
            $data['nomorsurat'] = '/JIWASRAYA/DPLK/'.date("mY");
            
            $this->load->view('pop_top');
            $this->load->view('operasional/peserta/isi_nosurat_konf_kartu',$data);
            $this->load->view('pop_footer');
	}
        
        public function isi_nosurat_konf_selisih($nomorpeserta,$kodeklaim,$tglklaim)
	{                
            $data['nomorpeserta'] = $nomorpeserta;
            $data['kodeklaim'] = $kodeklaim;
            $data['tglklaim'] = str_replace("-", "/", $tglklaim);
            $data['nomorsurat'] = '/JIWASRAYA/DPLK/'.date("mY");
            $data['tglsurat'] = NOWDATE;
            
            $this->load->view('pop_top');
            $this->load->view('operasional/peserta/isi_nosurat_konf_selisih',$data);
            $this->load->view('pop_footer');
	}
        
        public function cetak_konfirmasi_kartu()
	{                           
            $nomorpeserta = $this->input->post('nomorpeserta');
            $nomorsurat = $this->input->post('nomorsurat');
            
            $this->load->library('fpdf');                                   
            
            $this->load->model('mpeserta');
            
            /* barcode */
            $this->load->library('Zend');

            $this->zend->load('Zend/Barcode');
                        
            
            $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>$nomorpeserta), array())->draw();                        
            //echo PATH_IMG_BARCODE;die;
            imagepng($imageResource,PATH_IMG_BARCODE.$nomorpeserta.'.png',0,PNG_NO_FILTER);
            //file_put_contents(base_url('assets/src/img/barcode/'.$nomorpeserta.'.png'), $imageResource);
            
            /* barcode */            
            $data['nomorsurat'] = $nomorsurat;
            $data['hasil'] = $this->mpeserta->detail_peserta_konf_kartu($nomorpeserta);
		
            $this->load->view('operasional/peserta/cetak_konfirmasi_kartu',$data);
            
	}  
        
        public function cetak_konfirmasi_selisih()
	{                           
            $nomorpeserta = $this->input->post('nomorpeserta');
            $kodeklaim = $this->input->post('kodeklaim');
            $tglklaim = $this->input->post('tglklaim');            
            $tglsurat = $this->input->post('tglsurat');
            $nomorsurat = $this->input->post('nomorsurat');
            
            $this->load->library('fpdf');                                   
            
            $this->load->model('mklaim');
            // update data no surat dan tgl surat konfirmasi
            $this->mklaim->update_nosurat_konf();            
            
            $this->load->model('mpeserta');                        
            $this->load->model('mgrup');
            
            $data['nomorsurat'] = $nomorsurat;
            $data['tglsurat'] = $tglsurat;
            $data['hasil'] = $this->mklaim->detail_peserta_konf_selisih($nomorpeserta,$kodeklaim,$tglklaim);
            $data['hasil2'] = $this->mpeserta->detail_peserta($nomorpeserta);
            $nomorgrup = $this->mpeserta->get_grup_peserta($nomorpeserta);
            $data['hasil3'] = $this->mgrup->get_detail_grup($nomorgrup);

            $this->load->view('operasional/peserta/cetak_konfirmasi_klaim_ppukp',$data);
            
	} 
        
        public function pilih_konfirmasi_selisih_kurang($nomorgrup,$mindana)
	{      
            $this->load->model('mpeserta');
            
            $data['hasil'] = $this->mpeserta->detail_peserta_ppukp_akum_dana_cukup($nomorgrup,$mindana);
            
            $this->load->view('pop_top');		
            $this->load->view('operasional/peserta/pop_pilih_konfirmasi_klaim_ppukp_kurang',$data);		
            $this->load->view('pop_footer');
                      
	}
        
        public function pilih_konfirmasi_selisih_lebih($nomorgrup)
	{          
            $this->load->model('mpeserta');
            
             $data['hasil'] = $this->mpeserta->detail_peserta_ppukp_akum_dana_all($nomorgrup);
            
            $this->load->view('pop_top');		
            $this->load->view('operasional/peserta/pop_pilih_konfirmasi_klaim_ppukp_kurang',$data);		
            $this->load->view('pop_footer');
                        
	}
        
        public function cetak_lampiran_konfirmasi_selisih_kurang($nomorgrup,$mindana)
	{                           
            $this->load->library('fpdf');                                   
            
            $this->load->model('mpeserta');
            
            $data['hasil'] = $this->mpeserta->detail_peserta_ppukp_akum_dana_cukup($nomorgrup,$mindana);
                        
            $this->load->view('operasional/peserta/lampiran_konfirmasi_klaim_ppukp_kurang',$data);            
	}
        
        public function cetak_lampiran_konfirmasi_lebih($nomorgrup)
	{                           
            $this->load->library('fpdf');                                   
            
            $this->load->model('mpeserta');
            
            $data['hasil'] = $this->mpeserta->detail_peserta_ppukp_akum_dana_all($nomorgrup);
                        
            $this->load->view('operasional/peserta/lampiran_konfirmasi_klaim_ppukp_lebih',$data);
	}
        
        
        public function update_data_peserta()
	{                           
            $this->load->model('mpeserta');
            
            $this->mpeserta->update_nosurat_konf();
            $NOMOR_PESERTA = $this->input->post('NOMOR_PESERTA');                       
            redirect(base_url('index.php/cpoppeserta/detail_peserta/'.$NOMOR_PESERTA), 'refresh');  
	} 
        
        public function cetak_lampiran_sip_fee_pendiri($NO_MUTASI)
	{                           
            $this->load->library('fpdf');                                   
            
            $this->load->model('mpeserta');
            
            $data['hasil'] = $this->mpeserta->cetak_lampiran_sip_fee_pendiri($nomorgrup);
                        
            $this->load->view('operasional/peserta/lampiran_konfirmasi_klaim_ppukp_lebih',$data);
	}
        
        public function cetak_lampiran_sip_manfaat_klaim($NO_MUTASI)
	{                           
            $this->load->library('fpdf');                                   
            
            $this->load->model('mpeserta');
            
            $data['hasil'] = $this->mpeserta->cetak_lampiran_sip_manfaat_klaim($NO_MUTASI);
                        
            $this->load->view('operasional/peserta/lampiran_konfirmasi_klaim_ppukp_lebih',$data);
	}
                           
}
