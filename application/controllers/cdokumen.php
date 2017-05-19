<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cdokumen extends CI_Controller {

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
		$this->load->view('operasional/dokumen_peserta/main',$data);		
		$this->load->view('index_footer');
	}
        
        public function daftar_dokumen_peserta($NOMOR_PESERTA)
        {	
                $this->load->model('mdokumen');
                $data['hasil'] = $this->mdokumen->daftar_dokumen_peserta($NOMOR_PESERTA);
                $data['NOMOR_PESERTA'] = $NOMOR_PESERTA;
                
                $this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('operasional/dokumen_peserta/main',$data);		
		$this->load->view('index_footer');
        }

        public function entry_dokumen_peserta($NOMOR_PESERTA)
        {		            
            $data['judul']="Entry Dokumen Peserta";            
            $data['NOMOR_PESERTA']=$NOMOR_PESERTA;            
            $this->load->view('index_top');
            $this->load->view('index_left');
            $this->load->view('operasional/dokumen_peserta/entry',$data);		
            $this->load->view('index_footer');
        }

        public function simpan_dokumen_peserta()
        {		
            $this->load->model('mdokumen');
            $this->mdokumen->simpan_dokumen_peserta();        
            redirect(base_url('index.php/cakuntansi/daftar_dokumen_peserta'), 'refresh');            
        }

        public function delete_dokumen_peserta($id_dokumen_peserta,$NOMOR_PESERTA)
            {		
                $this->load->model('mdokumen');
                $this->mdokumen->delete_dokumen_peserta($id_dokumen_peserta,$NOMOR_PESERTA);                        
                   // echo $NOMOR_PESERTA;die;
                //redirect(base_url('index.php/cdokumen/daftar_dokumen_peserta/'.$NOMOR_PESERTA), 'refresh');            
            }

        public function update_dokumen_peserta($id_dokumen_peserta,$NOMOR_PESERTA)
            {		
                /*$data['judul']="Update Iuran";            

                $this->load->model('mdokumen');
                $data['hasil'] = $this->mdokumen->filter_dokumen_peserta($id_dokumen_peserta);

                $this->load->view('index_top');
                $this->load->view('index_left');
                $this->load->view('operasional/dokumen_peserta/update',$data);		
                $this->load->view('index_footer');*/
                
                $data['judul']="Update Dokumen Peserta";            
                $data['NOMOR_PESERTA']=$NOMOR_PESERTA; 
                $data['ID']=$id_dokumen_peserta; 
                
                $this->load->model('mdokumen');
                $data['hasil'] = $this->mdokumen->filter_dokumen_peserta($id_dokumen_peserta);
                
                $this->load->view('index_top');
                $this->load->view('index_left');
                $this->load->view('operasional/dokumen_peserta/update',$data);		
                $this->load->view('index_footer');
            }

        public function simpan_update_dokumen_peserta()
        {		
            $this->load->model('mdokumen');
            $this->mdokumen->simpan_update_dokumen_peserta();        
            redirect(base_url('index.php/cakuntansi/daftar_dokumen_peserta'), 'refresh');            
        } 
        
        public function do_upload()
        {
            $config['upload_path']          = 'C:/xampp/htdocs/neoppip_remaster/images/upload/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
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
                    $this->load->model('mdokumen');
                    $this->mdokumen->simpan_update_dokumen_peserta($nama_file); 
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());
                    $nama_file = $data['upload_data']['file_name'];
                    //var_dump($data);die;
                    $this->load->model('mdokumen');
                    $this->mdokumen->simpan_dokumen_peserta($nama_file);        
            }
        }        
}
