<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmenu extends CI_Controller {

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
		$this->load->model('menu/mmenu');
		$data['hasil'] = $this->mmenu->daftar_menu();
		
		$this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('menu/daftar_menu',$data);
		//$this->load->view('_hidden_right');
		$this->load->view('index_footer');
	}                     
	
	public function render()
	{                
		$this->load->model('menu/mmenu');
		$data['hasil'] = $this->mmenu->daftar_menu();
		
		$this->load->view('index_top');
		$this->load->view('index_left');
		$this->load->view('menu/daftar_render',$data);
		//$this->load->view('_hidden_right');
		$this->load->view('index_footer');
	}  
}
