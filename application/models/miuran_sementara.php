<?php
class miuran_sementara extends CI_Model {
    function daftar_IURAN_SEMENTARA(){
        $baca = $this->db->get('IURAN_SEMENTARA');
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
    function simpan_iuran_sementara(){
        $data = array(
               'ID_REKAP' => $this->input->post('ID_REKAP'),
               'TGL_TRANSAKSI' => $this->input->post('TGL_TRANSAKSI'),
               'KODE_BANK' => $this->input->post('KODE_BANK'),               
               'KETERANGAN' => $this->input->post('KETERANGAN'),               
               'IURAN' => $this->input->post('IURAN'),               
            );
        $parm1 = $this->input->post('ID_REKAP');
        $parm2 = $this->input->post('TGL_TRANSAKSI');
        $parm3 = $this->input->post('KODE_BANK');
            //var_dump($data);die;
        $this->db->insert('IURAN_SEMENTARA', $data); 
        $query = "BEGIN SYNC_SALDO_rekap_iuran('".$parm1."'); END;";
        $this->db->query($query);
        
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.str_replace('/','.',$parm2).'/'.$parm3), 'refresh');   
    }
    
    function delete_IURAN_SEMENTARA($id_IURAN_SEMENTARA,$parm2,$parm3,$parm4){
        $this->db->where('ID_IURAN_SEMENTARA', $id_IURAN_SEMENTARA);        
        $this->db->delete('IURAN_SEMENTARA'); 
        $query = "BEGIN SYNC_SALDO_rekap_iuran('".$parm4."'); END;";
        $this->db->query($query);        
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.$parm2.'/'.$parm3), 'refresh');   
    }
    
    function filter_IURAN_SEMENTARA($id_IURAN_SEMENTARA){
        $baca = $this->db->get_where('IURAN_SEMENTARA',array('ID_IURAN_SEMENTARA' => $id_IURAN_SEMENTARA));
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
    function get_rekap_iuran_aktif($tgl_transaksi = null,$kd_bank = null){
        if(isset($tgl_transaksi)){
            
           $TGL_TRANSAKSI = str_replace('.','/',$tgl_transaksi);
           $KODE_BANK = $kd_bank; 
        }else{
           $TGL_TRANSAKSI = $this->input->post('TGL_TRANSAKSI');
           $KODE_BANK = $this->input->post('KODE_BANK');
        }
        
        $baca = $this->db->get_where('REKAP_IURAN_SEMENTARA',array('TGL_TRANSAKSI' => $TGL_TRANSAKSI,'KODE_BANK' => $KODE_BANK,'STATUS'=>'1'));
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
    function get_detail_iuran($id_iuran_sementara){
        $baca = $this->db->get_where('IURAN_SEMENTARA',array('ID_REKAP' => $id_iuran_sementara));
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    
    function simpan_upload_iuran($nama_file){
        //$namafile = 'pop/upload/text_upload/'.$nama_file;
        $query = '';
        $parm1 =  $this->input->post('ID_REKAP');
        $parm2 =  $this->input->post('TGL_TRANSAKSI');
        $parm3 =  $this->input->post('KD_BANK');
        $namafile = base_url('/images/upload/'.$nama_file);
	$input = file($namafile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $filedata=array();
        foreach ($input as $line) {
		$filedata = explode("\t",$line);		
		//$query->execute($filedata);
		$query .= "INTO IURAN_SEMENTARA 
				  (ID_REKAP,TGL_TRANSAKSI,KODE_BANK,KETERANGAN,IURAN) 
				  VALUES ('$parm1','$parm2','$parm3','$filedata[0]','$filedata[1]') ";	
        } 
        $query = 'INSERT ALL '.$query.' SELECT * FROM dual';
        //echo $query;
        //echo '<br><br>';
        //die;
        $this->db->query($query);
        $query = "BEGIN SYNC_SALDO_rekap_iuran('".$parm1."'); END;";
        $this->db->query($query);
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.str_replace('/','.',$parm2).'/'.$parm3), 'refresh');   
    }
    
    function simpan_update_IURAN_SEMENTARA(){
        $data = array(                             
               'KETERANGAN' => $this->input->post('KETERANGAN'),               
               'IURAN' => $this->input->post('IURAN'),               
            );
        $parm1 = $this->input->post('ID_IURAN_SEMENTARA');
        $this->db->where('ID_IURAN_SEMENTARA', $this->input->post('ID_IURAN_SEMENTARA'));        
        $this->db->update('IURAN_SEMENTARA', $data); 
        $TGL_TRANSAKSI = $this->input->post('TGL_TRANSAKSIx');
        $KODE_BANK = $this->input->post('KODE_BANK'); 
        $query = "BEGIN SYNC_SALDO_rekap_iuran('".$parm1."'); END;";
        $this->db->query($query);
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.str_replace('/','.',$TGL_TRANSAKSI).'/'.$KODE_BANK), 'refresh');            
    }
    
    function gen_rekap_iuran_aktif($parm2,$parm3){
        $query = "BEGIN gen_rekap_iuran_aktif('".$parm2."','".$parm3."','ADMIN'); END;";
        $this->db->query($query);
        //redirect(base_url('index.php/cakuntansi/daftar_iuran_sementara'), 'refresh');   
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.$parm2.'/'.$parm3), 'refresh');   
    }   
    
    function gen_jurnal_rekap_iuran_aktif($parm1,$parm2,$parm3){
        $query = "BEGIN ADMIN.VIEW_TRANS_PEMBUKUAN.rekap_iuran_sementara_rk('".$parm1."'); END;";
        $this->db->query($query);
        //redirect(base_url('index.php/cakuntansi/daftar_iuran_sementara'), 'refresh');   
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.$parm2.'/'.$parm3), 'refresh');   
    }   
    
    
    function simpan_retur_iuran_sementara(){
        $data = array(                             
               'ID_IURAN_SEMENTARA' => $this->input->post('ID_IURAN_SEMENTARA'),               
               'ID_REKAP_IURAN' => $this->input->post('ID_REKAP'),               
               'TGL_RETUR' => $this->input->post('TGL_TRANSAKSI'),               
               'KODE_BANK' => $this->input->post('KODE_BANK'),               
               'NOMINAL' => $this->input->post('IURAN'),               
               'KETERANGAN' => $this->input->post('KETERANGAN'),               
            );
        
        $this->db->insert('RETUR_IURAN_SEMENTARA',$data);  
        $ID_IURAN_SEMENTARA = $this->input->post('ID_IURAN_SEMENTARA');  
        $query = "BEGIN ADMIN.VIEW_TRANS_PEMBUKUAN.retur_iuran_sementara_rk('".$ID_IURAN_SEMENTARA."');  END;";
        $this->db->query($query);  
        $TGL_TRANSAKSI = $this->input->post('TGL_TRANSAKSI');
        $KODE_BANK = $this->input->post('KODE_BANK'); 
        
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.str_replace('/','.',$TGL_TRANSAKSI).'/'.$KODE_BANK), 'refresh');            
    }
    
    function simpan_pembukuan_iuran_sementara(){
        $data = array(                             
               'ID_IURAN_SEMENTARA' => $this->input->post('ID_IURAN_SEMENTARA'),               
               'ID_REKAP_IURAN' => $this->input->post('ID_REKAP'),               
               'TGL_BOOKED' => $this->input->post('TGL_TRANSAKSI'),               
               'KODE_BANK' => $this->input->post('KODE_BANK'),               
               'NOMINAL' => $this->input->post('IURAN'),               
               'NOMINAL_PERSH' => $this->input->post('IURAN_PERS'),               
               'KETERANGAN' => $this->input->post('KETERANGAN'),               
               'JENIS' => $this->input->post('JENIS'),               
               'NOMOR_PESERTA' => $this->input->post('NOMOR_PESERTA'),               
               'NOMOR_GRUP' => $this->input->post('NOMOR_GRUP'),               
            );
        
        $this->db->insert('BOOKED_IURAN_SEMENTARA',$data);  
        $ID_IURAN_SEMENTARA = $this->input->post('ID_IURAN_SEMENTARA');  
        $query = "BEGIN ADMIN.VIEW_TRANS_PEMBUKUAN.BOOKED_iuran_sementara_rk('".$ID_IURAN_SEMENTARA."');  END;";
        $this->db->query($query);        
        
        $TGL_TRANSAKSI = $this->input->post('TGL_TRANSAKSI');
        $KODE_BANK = $this->input->post('KODE_BANK'); 
        
        redirect(base_url('index.php/cakuntansi/get_rekap_iuran_aktif/'.str_replace('/','.',$TGL_TRANSAKSI).'/'.$KODE_BANK), 'refresh');            
    }
}
?>