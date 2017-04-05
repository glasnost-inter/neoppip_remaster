<?php
class mgrup extends CI_Model {
    function daftar_grup(){
        $baca = $this->db->get('GRUP');
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
    function get_detail_grup($nomorgrup){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorgrup)){
            $baca = $this->db->get_where('GRUP',array('NOMOR_GRUP'=>$nomorgrup));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
            return $hasil;
            }
        }
    }
    
    function get_program_grup(){
        $nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorgrup)){
            $baca = $this->db->get_where('GRUP',array('NOMOR_GRUP'=>$nomorgrup));
            if($baca->num_rows() > 0){
                /*foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }*/
                
                $row = $baca->row_array();
		$program_grup = $row['KODE_PROGRAM'];
                        
                return $program_grup;
            }
        }
    }
    
}
?>