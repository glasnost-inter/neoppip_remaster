<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cakuntansi extends CI_Controller {

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
			
		$this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('keuangan/transaksi_jurnal/main',$data);		
		$this->load->view('index_footer');
	}
        
        public function daftar_iuran_sementara()
        {	
                $this->load->model('miuran_sementara');
                $data['hasil'] = $this->miuran_sementara->daftar_IURAN_SEMENTARA();
                
                $this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('keuangan/iuran_sementara/main',$data);		
		$this->load->view('index_footer');
        }
        
        public function search_iuran_sementara()
        {	
                //$this->load->model('miuran_sementara');
                //$data['hasil'] = $this->miuran_sementara->daftar_IURAN_SEMENTARA();
                
                $data['tgl_transaksi']='';            
                $data['kd_bank']='';            
                $data['id_rekap']='';
                $data['TGL_TRANSAKSI']='';            
                $data['KD_BANK']='';   
                $data['KODE_BANK']='';   
            
                $this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('keuangan/iuran_sementara/main',$data);		
		$this->load->view('index_footer');
        }
        
        public function get_rekap_iuran_aktif($tgl_transaksi = null,$kd_bank = null)
        {	
                $this->load->model('miuran_sementara');
                $data['id_rekap']='';
                $data['hasil'] = $this->miuran_sementara->get_rekap_iuran_aktif($tgl_transaksi,$kd_bank);
                if(isset($data['hasil'])){
                    $ID_REKAP = $data['hasil'][0]->ID_REKAP_IURAN;                                    
                }else{
                    $data['TGL_TRANSAKSI'] = $this->input->post('TGL_TRANSAKSI');
                    $data['KD_BANK'] = $this->input->post('KODE_BANK');
                    $data['KODE_BANK'] = $this->input->post('KODE_BANK');
                    $ID_REKAP="";
                }                
                $data['hasil2'] = $this->miuran_sementara->get_detail_iuran($ID_REKAP);
                
                $this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('keuangan/iuran_sementara/main',$data);		
		$this->load->view('index_footer');
        }

        public function entry_iuran_sementara()
        {		
            $data['judul']="Entry Iuran";            
            $this->load->view('index_top');
            $this->load->view('index_left');
            $this->load->view('keuangan/iuran_sementara/entry',$data);		
            $this->load->view('index_footer');
        }
        
        public function entry_tambahan_iuran_sementara($tgl_transaksi = null,$kd_bank = null,$id_rekap = null)
        {		
            $data['judul']="Entry Iuran";            
            $data['TGL_TRANSAKSI']=$tgl_transaksi;            
            $data['KD_BANK']=$kd_bank;            
            $data['ID_REKAP']=$id_rekap;            
            $this->load->view('index_top');
            $this->load->view('index_left');
            $this->load->view('keuangan/iuran_sementara/entry_tambahan',$data);		
            $this->load->view('index_footer');
        }
        
        public function entry_retur_iuran_sementara($id_iuran = null)
        {		
            $data['judul']="Entry Iuran";            
            
            $this->load->model('miuran_sementara');
            $data['hasil'] = $this->miuran_sementara->filter_IURAN_SEMENTARA($id_iuran);
            
            $this->load->view('index_top');
            $this->load->view('index_left');
            $this->load->view('keuangan/iuran_sementara/entry_retur',$data);		
            $this->load->view('index_footer');
        }
        
        public function entry_pembukuan_iuran_sementara($id_iuran = null)
        {		
            $data['judul']="Entry Iuran";            
            
            $this->load->model('miuran_sementara');
            $data['hasil'] = $this->miuran_sementara->filter_IURAN_SEMENTARA($id_iuran);
            
            $this->load->view('index_top');
            $this->load->view('index_left');
            $this->load->view('keuangan/iuran_sementara/entry_pembukuan',$data);		
            $this->load->view('index_footer');
        }
        
        public function upload_tambahan_iuran_sementara($tgl_transaksi = null,$kd_bank = null,$id_rekap = null)
        {		
            $data['judul']="Entry Iuran";            
            $data['TGL_TRANSAKSI']=$tgl_transaksi;            
            $data['KD_BANK']=$kd_bank;            
            $data['ID_REKAP']=$id_rekap;            
            $this->load->view('index_top');
            $this->load->view('index_left');
            $this->load->view('keuangan/iuran_sementara/upload_tambahan',$data);		
            $this->load->view('index_footer');
        }
        
        public function do_upload()
        {
            $config['upload_path']          = 'C:/xampp/htdocs/neoppip_remaster/images/upload/';
            $config['allowed_types']        = 'txt';
            $config['max_size']             = 2000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('URL'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);die;    
                    //$this->load->view('upload_form', $error);
            }
            elseif ($this->input->post('ID'))
            {
                    $data = array('upload_data' => $this->upload->data());
                    $nama_file = $data['upload_data']['file_name'];
                    //var_dump($data);die;
                    $this->load->model('miuran_sementara');
                    $this->mdokumen->simpan_update_dokumen_peserta($nama_file); 
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $nama_file = $data['upload_data']['file_name'];
                    //var_dump($data);die;
                    $this->load->model('miuran_sementara');
                    $this->miuran_sementara->simpan_upload_iuran($nama_file);        
            }
        } 

        public function simpan_iuran_sementara()
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->simpan_iuran_sementara();                   
        }

        public function delete_iuran_sementara($id_iuran_sementara,$parm2,$parm3,$parm4)
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->delete_iuran_sementara($id_iuran_sementara,$parm2,$parm3,$parm4);                                        
        }

        public function update_iuran_sementara($id_iuran_sementara)
            {		
                $data['judul']="Update Iuran";            

                $this->load->model('miuran_sementara');
                $data['hasil'] = $this->miuran_sementara->filter_iuran_sementara($id_iuran_sementara);

                $this->load->view('index_top');
                $this->load->view('index_left');
                $this->load->view('keuangan/iuran_sementara/update',$data);		
                $this->load->view('index_footer');
            }

        public function simpan_update_iuran_sementara()
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->simpan_update_iuran_sementara();                    
        } 
        
        public function gen_rekap_iuran_aktif($parm2,$parm3)
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->gen_rekap_iuran_aktif($parm2,$parm3);                                        
        } 
        
        public function gen_jurnal_rekap_iuran_aktif($parm1,$parm2,$parm3)
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->gen_jurnal_rekap_iuran_aktif($parm1,$parm2,$parm3);                                        
        } 
        
        public function simpan_retur_iuran_sementara()
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->simpan_retur_iuran_sementara();                    
        } 
        
        public function simpan_pembukuan_iuran_sementara()
        {		
            $this->load->model('miuran_sementara');
            $this->miuran_sementara->simpan_pembukuan_iuran_sementara();                    
        } 
}
