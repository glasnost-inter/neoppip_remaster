<?php
class mmenu extends CI_Model {
    function daftar_menu(){
		$this->db->order_by("KODE_MENU", "ASC"); 
        $baca = $this->db->get('MENU');
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
?>