<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpopbukudana extends CI_Controller {

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
		$this->load->model('mbuku_dana');
		$data['hasil'] = $this->mbuku_dana->buku_dana($nomorpeserta);
		
		$this->load->view('pop_top');	
		//$this->load->view('index_left');
		//$this->load->view('grup/daftar_grup',$data);
        $this->load->view('operasional/buku_dana/pop_buku_dana',$data);
		////$this->load->view('_hidden_right');
		$this->load->view('pop_footer');
	}  
        
        public function get_buku_dana($nomorpeserta)
	{                
		$this->load->model('mbuku_dana');
		$data['hasil'] = $this->mbuku_dana->buku_dana($nomorpeserta);
		
		$this->load->view('pop_top');	
		//$this->load->view('index_left');
		//$this->load->view('grup/daftar_grup',$data);
                $this->load->view('operasional/buku_dana/pop_buku_dana',$data);
		////$this->load->view('_hidden_right');
		$this->load->view('pop_footer');
	}
        
        public function get_buku_dana_ind_ppukp($nomorpeserta)
	{                
		$this->load->model('mbuku_dana');
		$data['hasil'] = $this->mbuku_dana->buku_dana_ind_ppukp($nomorpeserta);
		
		$this->load->view('pop_top');	
		//$this->load->view('index_left');
		//$this->load->view('grup/daftar_grup',$data);
                $this->load->view('operasional/buku_dana/pop_buku_dana',$data);
		////$this->load->view('_hidden_right');
		$this->load->view('pop_footer');
	}
}
