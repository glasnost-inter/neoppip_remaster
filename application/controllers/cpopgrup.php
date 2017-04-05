<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpopgrup extends CI_Controller {
	
	public function index()
	{                
		$this->load->model('mgrup');
		$data['hasil'] = $this->mgrup->daftar_grup();
		
		$this->load->view('pop_top');

		$this->load->view('operasional/grup/pop_daftar_grup',$data);
		
		$this->load->view('pop_footer');
	}                     
}
