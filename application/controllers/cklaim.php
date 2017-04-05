<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cklaim extends CI_Controller {
    
    public function index()
    {                
        $this->load->view('index_top');
        $this->load->view('index_left');        
       $this->load->view('operasional/klaim/daftar_klaim_grup');
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');
    } 
    
    
    public function filterklaim($nomorgrup = null)
    {                
        $this->load->model('mklaim');
        if(isset($nomorgrup)){
            $data['hasil'] = $this->mklaim->daftar_klaim_grup($nomorgrup);
        }else{
            $data['hasil'] = $this->mklaim->daftar_klaim_grup();
        }                    
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/daftar_klaim_grup',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }    
    
    public function detail_simulasi_ppukp_konf($nomorpeserta,$kodeklaim,$tgltransaksi)
    {                
        $this->load->model('mklaim');    
        
        $tgltransaksix = str_replace("-", "/", $tgltransaksi);
        
        $data['hasil'] = $this->mklaim->detail_peserta_konf_selisih($nomorpeserta,$kodeklaim,$tgltransaksix);

        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/detail_simulasi_ppukp_konf',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    
    public function rekalkulasi_simulasi_ppukp_konf($nomorpeserta,$kodeklaim,$tgltransaksi)
    {                
        $this->load->model('mklaim');    
        
        $tgltransaksix = str_replace("-", "/", $tgltransaksi);
        
        $data['hasil'] = $this->mklaim->detail_peserta_konf_selisih($nomorpeserta,$kodeklaim,$tgltransaksix);
        //var_dump($data);
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/rekalkulasi_simulasi_pst_ppukp_konf',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }

    public function approval_simulasi_ppukp_konf($nomorpeserta,$kodeklaim,$tgltransaksi)
    {                
        $this->load->model('mklaim');    
        
        $tgltransaksix = str_replace("-", "/", $tgltransaksi);
        
        $data['hasil'] = $this->mklaim->detail_peserta_konf_selisih($nomorpeserta,$kodeklaim,$tgltransaksix);
        //var_dump($data);
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/approval_simulasi_ppukp_konf',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function approve_ppukp_konf()
    {                
        $this->load->model('mklaim');    
        
        //$tgltransaksix = str_replace("-", "/", $tgltransaksi);
        
        $data['hasil'] = $this->mklaim->approval_simulasi_klaim_ppukp();
        //var_dump($data);
        $nomorgrup = $this->input->post('nomorgrup');
        redirect(base_url('index.php/cklaim/filterklaim/').$nomorgrup);                
    }
    
    public function update_simulasi_ppukp_konf($nomorpeserta)
    {                
        $this->load->model('mklaim');    
        $this->mklaim->update_simulasi_klaim_ppukp();
        
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
        
        $data['nomorgrup']  = $this->input->post('nomorgrup');
        
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
       $this->load->view('operasional/klaim/rekalkulasi_simulasi_pst_ppukp_konf',$data);
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
       $this->load->view('operasional/klaim/rekalkulasi_simulasi_pst_ppukp_konf',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    
    public function daftar_mutasi()
    {                
        $this->load->view('index_top');
        $this->load->view('index_left');        
        $this->load->view('operasional/klaim/daftar_mutasi_klaim');
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');
    } 
    
    public function filtermutasiklaim($nomorgrup = null)
    {                
        $this->load->model('mklaim');
        if(isset($nomorgrup)){
            $data['hasil'] = $this->mklaim->daftar_mutasi_klaim($nomorgrup);
        }else{
            $data['hasil'] = $this->mklaim->daftar_mutasi_klaim();
        }                    
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/daftar_mutasi_klaim',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function entry_data_mutasi()
    {              
        $data = array(
                'NO_MUTASI'=>'',                                    
                'TGL_MUTASI'=>'',
                'NOMOR_GRUP'=>'',
                'NO_SURAT_REF'=>'',
                'TGL_SURAT_REF'=>'',                              
                'TGL_ESTIMASI_BAYAR'=>'', 
                );
        
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/ventry_data_mutasi',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function simpan_data_mutasi()
    {                
        $this->load->model('mklaim');        
        $data = $this->mklaim->simpan_data_mutasi();
        
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/ventry_data_mutasi',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function entry_peserta_mutasi($NO_MUTASI,$NOMOR_GRUP)
    {           
        $this->load->model('mklaim');        
        $data['NOMOR_GRUP'] = $NOMOR_GRUP;
        $data['NO_MUTASI'] = $NO_MUTASI;
        $data['hasil'] = $this->mklaim->get_peserta_mutasi($NO_MUTASI);
            
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/vdaftar_peserta_mutasi',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function simpan_peserta_mutasi($NO_MUTASI,$NOMOR_GRUP)
    {                
        $this->load->model('mklaim');        
        $data['NOMOR_GRUP'] = $NOMOR_GRUP;
        $data['NO_MUTASI'] = $NO_MUTASI;
        $this->load->model('mbuku_dana');  
        $nomor_peserta = $this->input->post('NOMOR_PESERTA');
        $akum_dana = $this->mbuku_dana->get_akum_ind_ppukp($nomor_peserta,'3');
        $this->mklaim->simpan_peserta_mutasi($NO_MUTASI,$akum_dana);
        
        $data['hasil'] = $this->mklaim->get_peserta_mutasi($NO_MUTASI);
        
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/vdaftar_peserta_mutasi',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function update_nilai_peserta($NO_MUTASI,$NOMOR_PESERTA)
    {                      
        $this->load->model('mklaim');                
        $data = $this->mklaim->get_nilai_peserta_mutasi($NO_MUTASI,$NOMOR_PESERTA);
        
        $this->load->model('mpeserta');                
        $data['NOMOR_GRUP'] = $this->mpeserta->get_grup_peserta($NOMOR_PESERTA);
        
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/vupdate_nilai_peserta',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function simpan_update_nilai_peserta()
    {                      
        $this->load->model('mklaim');                
        $data = $this->mklaim->simpan_update_nilai_peserta();
        
        $this->load->model('mpeserta');                
        $data['NOMOR_GRUP'] = $this->mpeserta->get_grup_peserta($data['NOMOR_PESERTA']);
        
        $this->load->view('index_top');
        $this->load->view('index_left');		
       $this->load->view('operasional/klaim/vupdate_nilai_peserta',$data);
        //$this->load->view('_hidden_right');
        $this->load->view('index_footer');                
    }
    
    public function delete_nilai_peserta($NO_MUTASI,$NOMOR_PESERTA)
    {                      
        $this->load->model('mklaim');                
        $data = $this->mklaim->delete_nilai_peserta_mutasi($NO_MUTASI,$NOMOR_PESERTA);
                
        redirect(base_url('index.php/cklaim/entry_peserta_mutasi/'.$NO_MUTASI.'/'.$NOMOR_PESERTA), 'refresh');                  
    }
    
    public function generate_sip($NO_MUTASI,$USER,$nomorgrup = null)
    {                
        $this->load->model('mklaim');
        $this->mklaim->generate_sip($NO_MUTASI,$USER);                
        redirect(base_url('index.php/cklaim/filtermutasiklaim/'.$nomorgrup), 'refresh');  
    }
}
