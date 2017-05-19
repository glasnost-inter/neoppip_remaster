<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpeserta extends CI_Controller {
   
    public function index()
    {                
        $this->load->view('index_top');
        $this->load->view('index_left');
        //$this->load->view('grup/daftar_grup',$data);
        $this->load->view('operasional/peserta/daftar_peserta_grup');
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');
    } 

    public function individu()
    {         
        $this->load->model('mpeserta');
        
        $tahun = $this->input->post('tahun');
        
        if(isset($tahun)){
            $tahun = $this->input->post('tahun');
        }else{
            $tahun = date("Y");
        }
        
        $data['hasil'] = $this->mpeserta->daftar_peserta_individu($tahun);        
            
        $this->load->view('index_top');
        $this->load->view('index_left');
        //$this->load->view('grup/daftar_grup');
        $this->load->view('operasional/peserta/daftar_peserta_individu',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');
    }
    
    public function data_individu()
    {                 
        $this->load->view('index_top');
        $this->load->view('index_left');
        //$this->load->view('grup/daftar_grup');
        $this->load->view('operasional/peserta/data_peserta');
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');
    }
    
    public function filtergrup()
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
        if(!isset($nomorpeserta)){
            $nomorpeserta="";
        }
        $data['NOMORPESERTA']=$nomorpeserta;
        $this->load->view('index_top');
        $this->load->view('index_left');		
        //$this->load->view('operasional/peserta/detail_peserta',$data);
        $this->load->view('operasional/peserta/detail_peserta',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function update_data_peserta()
	{                           
            $this->load->model('mpeserta');
            
            $this->mpeserta->update_data_peserta();
            $NOMOR_PESERTA = $this->input->post('NOMOR_PESERTA');                       
            redirect(base_url('index.php/cpeserta/detail_peserta/'.$NOMOR_PESERTA), 'refresh');  
	} 
    
    public function get_detail_peserta($nomorpeserta = NULL)
    {                
        $this->load->model('mpeserta');
        $data['hasil'] = $this->mpeserta->get_detail_peserta($nomorpeserta);
        if(!isset($nomorpeserta)){
            $nomorpeserta="";
        }
        $data['NOMORPESERTA']=$nomorpeserta;
        $this->load->view('index_top');
        $this->load->view('index_left');		
        //$this->load->view('operasional/peserta/detail_peserta',$data);
        $this->load->view('operasional/peserta/data_peserta',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }

    public function simulasi_ppukp_konf($nomorpeserta)
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

        
        $nosuratperintah = $this->input->post('nosuratperintah');
        if(isset($nosuratperintah)){
           $data['nosuratperintah'] = $nosuratperintah;
        }else{
           $data['nosuratperintah'] = ''; 
        }   
        
           
        $tglsuratperintah = $this->input->post('tglsuratperintah');
        if(isset($tglsuratperintah)){
           $data['tglsuratperintah'] = $tglsuratperintah;
        }else{
           $data['tglsuratperintah'] = ''; 
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
           $data['nilaiperintah'] = str_replace(".","",$nilaiperintah);
        }else{
           $data['nilaiperintah'] = 0; 
        }                                    

        //get akumulasi dana            
        $data['akumulasi_iuran'] = $this->mbuku_dana->get_akum_ind_ppukp($nomorpeserta,'1');
        $data['akumulasi_hasil'] = $this->mbuku_dana->get_akum_ind_ppukp($nomorpeserta,'2');
        $data['akumulasi_dana'] = $this->mbuku_dana->get_akum_ind_ppukp($nomorpeserta,'3');

        // get hasil simulasi
        $data['hasil_simulasi'] = $this->mbuku_dana->get_simulasi_ind_ppukp($nomorpeserta,$tgltransaksi,$kodeklaim);

        $this->load->view('index_top');
        $this->load->view('index_left');		
        $this->load->view('operasional/peserta/simulasi_pst_ppukp_konf',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function simpan_simulasi_ppukp_konf($nomorpeserta)
    {                
        $this->load->model('mklaim');    
        $this->mklaim->simpan_simulasi_klaim_ppukp();
        
        $nomorpeserta = $this->input->post('nomorpeserta');
        $tgltransaksi = $this->input->post('tgltransaksi');
        $kodeklaim = $this->input->post('kodeklaim'); 
        
        $nosuratperintah = $this->input->post('nosuratperintah'); 
        $tglsuratperintah = $this->input->post('tglsuratperintah'); 
        
        $akumulasi_iuran = $this->input->post('akumulasi_iuran');
        $akumulasi_hasil = $this->input->post('akumulasi_hasil');
        $akumulasi_dana = $this->input->post('akumulasi_dana');
        $hasil_simulasi = $this->input->post('hasil_simulasi');
        $nilaiperintah = $this->input->post('nilaiperintah');
        $selisih = $this->input->post('selisih');
        
        $data['nomorgrup'] = $this->input->post('nomorgrup');        
        
        $data['nomorpeserta'] = $nomorpeserta;

        $data['tgltransaksi'] = $tgltransaksi;
        
        $data['kodeklaim'] = $kodeklaim;
        
        
        $data['nosuratperintah'] = $nosuratperintah;
        $data['tglsuratperintah'] = $tglsuratperintah;
        
        $data['nilaiperintah'] = str_replace(".","",$nilaiperintah);
                                       

        //get akumulasi dana            
        $data['akumulasi_iuran'] = $akumulasi_iuran;
        $data['akumulasi_hasil'] = $akumulasi_hasil;
        $data['akumulasi_dana'] = $akumulasi_dana;

        // get hasil simulasi
        $data['hasil_simulasi'] = $hasil_simulasi;

        //var_dump($data);die;
        $this->load->view('index_top');
        $this->load->view('index_left');		
        $this->load->view('operasional/peserta/simulasi_pst_ppukp_konf',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
	
    public function entry_pendaftaran_peserta_individu()
    {                
        //$this->load->model('mpeserta');
        //$data['hasil'] = $this->mpeserta->detail_peserta($nomorpeserta);

        $this->load->view('index_top');
        $this->load->view('index_left');		
        //$this->load->view('operasional/peserta/detail_peserta',$data);
        $this->load->view('operasional/peserta/entry_pendaftaran_peserta_individu'/*,$data*/);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function historis_investasi_peserta($nomorpeserta)
    {                
        $this->load->model('mpeserta');
        $data['hasil'] = $this->mpeserta->historis_investasi_peserta($nomorpeserta);
        $data['NOMORPESERTA']=$nomorpeserta;
        $this->load->view('index_top');
        $this->load->view('index_left');		
        //$this->load->view('operasional/peserta/detail_peserta',$data);
        $this->load->view('operasional/peserta/historis_perubahan_investasi',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function historis_perubahan_grup($nomorpeserta)
    {                
        $this->load->model('mpeserta');
        $data['hasil'] = $this->mpeserta->historis_perubahan_grup($nomorpeserta);
        $data['NOMORPESERTA']=$nomorpeserta;
        $this->load->view('index_top');
        $this->load->view('index_left');		
        //$this->load->view('operasional/peserta/detail_peserta',$data);
        $this->load->view('operasional/peserta/historis_perubahan_grup',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
}
