<?php
class mklaim extends CI_Model {
    function simpan_simulasi_klaim_ppukp(){
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
        $selisih_iuran = $this->input->post('selisih_iuran');
        
        //echo 'ini $selisih'.$selisih;die;
        if(isset($nomorpeserta)){
            
            $data = array(
                    'NOMOR_PESERTA'=>$nomorpeserta,
                    'TGL_KLAIM'=>$tgltransaksi,
                    'KODE_KLAIM'=>$kodeklaim,
                
                    'NO_SURAT_REF'=>$nosuratperintah,
                    'TGL_SURAT_REF'=>$tglsuratperintah,
                
                    'AKUMULASI_IURAN'=>$akumulasi_iuran,
                    'AKUMULASI_HASIL'=>$akumulasi_hasil,
                    'AKUMULASI_DANA'=>$akumulasi_dana,
                    'HASIL_SIMULASI'=>$hasil_simulasi,
                    'JUMLAH_KLAIM_PERINTAH'=>$nilaiperintah,
                    'SELISIH'=>$selisih,
                    'SELISIH_IURAN'=>$selisih_iuran,
                
                    'USERREKAM'=>'ADMIN',
                    'USERUPDATE'=>'ADMIN',
                    'TGLREKAM'=>NOWDATE,
                    'TGLUPDATE'=>NOWDATE,
                
                    'CARA_BAYAR'=>'B',                
                    'STATUS'=>'1',
                    'STATUS_PROSES'=>'1',
                    );
            $this->db->insert('SIMULASI_PPUKP',$data);                        
        }
    }
    
    function update_simulasi_klaim_ppukp(){
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
        $selisih_iuran = $this->input->post('selisih_iuran');
        
        //echo 'ini $selisih'.$selisih;die;
        if(isset($nomorpeserta)){
            
            $data = array(                    
                    'NO_SURAT_REF'=>$nosuratperintah,
                    'TGL_SURAT_REF'=>$tglsuratperintah,
                
                    'AKUMULASI_IURAN'=>$akumulasi_iuran,
                    'AKUMULASI_HASIL'=>$akumulasi_hasil,
                    'AKUMULASI_DANA'=>$akumulasi_dana,
                    'HASIL_SIMULASI'=>$hasil_simulasi,
                    'JUMLAH_KLAIM_PERINTAH'=>$nilaiperintah,
                    'SELISIH'=>$selisih,
                    'SELISIH_IURAN'=>$selisih_iuran,
                
                    'USERREKAM'=>'ADMIN',
                    'USERUPDATE'=>'ADMIN',
                    'TGLREKAM'=>NOWDATE,
                    'TGLUPDATE'=>NOWDATE,
                
                    'CARA_BAYAR'=>'B',                
                    'STATUS'=>'1',
                    'STATUS_PROSES'=>'1',
                    );
            $kondisi = array(                    
                    'NOMOR_PESERTA'=>$nomorpeserta,
                    'TGL_KLAIM'=>$tgltransaksi,
                    'KODE_KLAIM'=>$kodeklaim,                
                    );
            $this->db->update('SIMULASI_PPUKP',$data,$kondisi);                        
        }
    }
    
    function update_nosurat_konf(){
        $nomorpeserta = $this->input->post('nomorpeserta');
        $kodeklaim = $this->input->post('kodeklaim');
        $tglklaim = $this->input->post('tglklaim');            
        $tglsurat = $this->input->post('tglsurat');
        $nomorsurat = $this->input->post('nomorsurat');
                
        $data = array(
                'NO_SURAT_KONF'=>$nomorsurat,
                'TGL_SURAT_KONF'=> $tglsurat,
                //'TGL_SURAT_KONF'=>  str_replace("-", "/", $tglsurat),
                );
        $this->db->where('NOMOR_PESERTA', $nomorpeserta);
        $this->db->where('KODE_KLAIM', $kodeklaim);
        $this->db->where('TGL_KLAIM', $tglklaim);
        //$this->db->where('TGL_KLAIM', str_replace("-", "/", $tglklaim));
        $this->db->update('SIMULASI_PPUKP',$data);         

    }
    
    
    function detail_peserta_konf_selisih($nomorpeserta,$kodeklaim,$tglklaim){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta.' ini $kodeklaim'.$kodeklaim.' ini $tglklaim'.$tglklaim;die;
        if(isset($nomorpeserta)){            
            $baca = $this->db->get_where('SIMULASI_PPUKP',array('NOMOR_PESERTA'=>$nomorpeserta,'KODE_KLAIM'=>$kodeklaim,'TGL_KLAIM'=>$tglklaim));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    function daftar_klaim_grup($nomorgrup = null){
        $nomorgrupx = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorgrup;die;
        if(isset($nomorgrupx)){ 
            $this->db->order_by("TGLREKAM", "desc");
            $baca = $this->db->get_where('SIMULASI_PPUKP',array('NOMOR_GRUP'=>$nomorgrupx));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }else{
            $this->db->order_by("TGLREKAM", "desc");
            $baca = $this->db->get_where('SIMULASI_PPUKP',array('NOMOR_GRUP'=>$nomorgrup));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }        
    
    function approval_simulasi_klaim_ppukp(){
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
        
        $nomorgrup = $this->input->post('nomorgrup');
        
        $selisih = $this->input->post('selisih');
        $selisih_iuran = $this->input->post('selisih_iuran');
        $nama_penerima = $this->input->post('nama_penerima');
        $nomorpesertalain = $this->input->post('nomorpesertalain');
        //echo 'ini $nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorpeserta)){
            
            $data = array(
                    'NOMOR_PESERTA'=>$nomorpeserta,
                    'TGL_KLAIM'=>$tgltransaksi,
                    'KODE_KLAIM'=>$kodeklaim,
                
                    /*'NO_SURAT_REF'=>$nosuratperintah,
                    'TGL_SURAT_REF'=>$tglsuratperintah,*/
                
                    'AKUMULASI_IURAN'=>$akumulasi_iuran,
                    //'AKUMULASI_HASIL'=>$akumulasi_hasil,
                    'AKUMULASI_DANA'=>$akumulasi_dana,
                    //'HASIL_SIMULASI'=>$hasil_simulasi,
                    'JUMLAH_KLAIM'=>$nilaiperintah,
                    'JUMLAH_KLAIM_PERINTAH'=>$nilaiperintah,
                    'TOTAL_NILAI_KLAIM'=>$nilaiperintah,
                    'SELISIH'=>$selisih,
                    'SELISIH_IURAN'=>$selisih_iuran,
                
                    'NOMOR_GRUP'=>$nomorgrup,
                
                    'USERREKAM'=>'ADMIN',
                    'USERUPDATE'=>'ADMIN',
                    'TGLREKAM'=>NOWDATE,
                    'TGLUPDATE'=>NOWDATE,
                
                    'CARA_BAYAR'=>'B',                
                    'STATUS'=>'1',
                    'STATUS_PROSES'=>'1',
                    'NAMA_PENERIMA'=>$nama_penerima,
                    'NOMOR_PESERTA_PENERIMA_DITARIK'=>$nomorpesertalain                    
                    );
            $this->db->insert('KLAIM_PPUKP',$data);   
                                    
            $data = array('STATUS'=>'2');
            $kondisi = array(                    
                    'NOMOR_PESERTA'=>$nomorpeserta,
                    'TGL_KLAIM'=>$tgltransaksi,
                    'KODE_KLAIM'=>$kodeklaim,                
                    );
            $this->db->update('SIMULASI_PPUKP',$data,$kondisi);
        }
    }
    
    function daftar_mutasi_klaim($nomorgrup = null){
        $nomorgrupx = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorgrup;die;
        if(isset($nomorgrupx)){ 
            $this->db->order_by("TGL_REKAM", "desc");
            $baca = $this->db->get_where('MUTASI_PPUKP',array('NOMOR_GRUP'=>$nomorgrupx));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }else{
            $this->db->order_by("TGL_REKAM", "desc");
            $baca = $this->db->get_where('MUTASI_PPUKP',array('NOMOR_GRUP'=>$nomorgrup));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    function simpan_data_mutasi(){
        
        if($this->input->post('NO_MUTASI')){
            $data = array(
                    'NO_MUTASI'=>$this->input->post('NO_MUTASI'),                                    
                    'TGL_MUTASI'=>$this->input->post('TGL_MUTASI'),                                    
                    'NOMOR_GRUP'=>$this->input->post('NOMOR_GRUP'),                                    
                    'NO_SURAT_REF'=>$this->input->post('NO_SURAT_REF'),                                    
                    'TGL_SURAT_REF'=>$this->input->post('TGL_SURAT_REF'),                                                        
                    'TGL_ESTIMASI_BAYAR'=>$this->input->post('TGL_ESTIMASI_BAYAR'),                                                        
                    'USER_REKAM'=>'ADMIN',
                    'USER_UPDATE'=>'ADMIN',
                    'TGL_REKAM'=>NOWDATE,
                    'TGL_UPDATE'=>NOWDATE,                
                    );
            $this->db->where('NO_MUTASI', $this->input->post('NO_MUTASI'));        
            $this->db->UPDATE('MUTASI_PPUKP',$data); 
        }else{
            $q = "SELECT LPAD(NO_MUTASI_SEQ.NEXTVAL,10,'0') no_mutasi FROM dual";

            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){                                
                $row = $baca->row_array();                
                $id = $row['NO_MUTASI'];                
            }

            $data = array(
                    'NO_MUTASI'=>$id,                                    
                    'TGL_MUTASI'=>$this->input->post('TGL_MUTASI'),                                    
                    'NOMOR_GRUP'=>$this->input->post('NOMOR_GRUP'),                                    
                    'NO_SURAT_REF'=>$this->input->post('NO_SURAT_REF'),                                    
                    'TGL_SURAT_REF'=>$this->input->post('TGL_SURAT_REF'),                                                        
                    'TGL_ESTIMASI_BAYAR'=>$this->input->post('TGL_ESTIMASI_BAYAR'),                                                        
                    'USER_REKAM'=>'ADMIN',
                    'USER_UPDATE'=>'ADMIN',
                    'TGL_REKAM'=>NOWDATE,
                    'TGL_UPDATE'=>NOWDATE,                
                    );
            $this->db->insert('MUTASI_PPUKP',$data);   
                
        }
        return $data;
    }
    
    function get_data_mutasi($NO_MUTASI){                
        $q = "select *
              from MUTASI_PPUKP a, GRUP b
              where a.no_mutasi = '$NO_MUTASI'".
             "and a.nomor_grup = b.nomor_grup";
            //echo 'ini q'.$q;die;
        $baca = $this->db->query($q);
            
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        } 
            
    }
    
    function get_peserta_mutasi($NO_MUTASI){                
        $baca = $this->db->get_where('PESERTA_MUTASI_PPUKP',array('NO_MUTASI'=>$NO_MUTASI));
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }        
    }
    
    function get_detail_peserta_mutasi($NO_MUTASI){     
        
        $q = "select *
              from PESERTA_MUTASI_PPUKP a, peserta b
              where a.no_mutasi = '$NO_MUTASI'".
             "and a.nomor_peserta = b.nomor_peserta";
            //echo 'ini q'.$q;die;
        $baca = $this->db->query($q);
            
        //$baca = $this->db->get_where('PESERTA_MUTASI_PPUKP',array('NO_MUTASI'=>$NO_MUTASI));
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }        
    }
    
    function simpan_peserta_mutasi($NO_MUTASI,$akum_dana){                
        $data = array(
                'NOMOR_PESERTA'=> $this->input->post('NOMOR_PESERTA'),                
                'NILAI_TERSEDIA'=> $akum_dana,                
                'NO_MUTASI'=> $NO_MUTASI,                 
                'NILAI_PERINTAH'=> 0,             
                'SELISIH'=> 0,  
                );
        $this->db->insert('PESERTA_MUTASI_PPUKP',$data);                                
    }
    
    function get_nilai_peserta_mutasi($NO_MUTASI,$NOMOR_PESERTA){                
        $baca = $this->db->get_where('PESERTA_MUTASI_PPUKP',array('NO_MUTASI'=>$NO_MUTASI,'NOMOR_PESERTA'=>$NOMOR_PESERTA));
        if($baca->num_rows() > 0){                                
            $row = $baca->row_array();

            $data = array(
                'NO_MUTASI'=> $row['NO_MUTASI'],             
                'NOMOR_PESERTA'=> $row['NOMOR_PESERTA'],             
                'NOMOR_PESERTA_PENERIMA_DITARIK'=> $row['NOMOR_PESERTA_PENERIMA_DITARIK'],             
                'NILAI_TERSEDIA'=> $row['NILAI_TERSEDIA'],             
                'NILAI_PERINTAH'=> $row['NILAI_PERINTAH'],             
                'SELISIH'=> $row['SELISIH'],             
                'NILAI_DISEPAKATI'=> $row['NILAI_DISEPAKATI'],             
                );

            return $data;
        }        
    }
    
    
    function simpan_update_nilai_peserta(){                
        $data = array(
                'NO_MUTASI'=> $this->input->post('NO_MUTASI'),             
                'NOMOR_PESERTA'=> $this->input->post('NOMOR_PESERTA'),             
                'NOMOR_PESERTA_PENERIMA_DITARIK'=> $this->input->post('NOMOR_PESERTA_PENERIMA_DITARIK'),             
                'NILAI_TERSEDIA'=> str_replace(".", "", $this->input->post('NILAI_TERSEDIA')),             
                'NILAI_PERINTAH'=>  str_replace(".", "", $this->input->post('NILAI_PERINTAH')),                          
                'SELISIH'=> str_replace(".", "", $this->input->post('NILAI_TERSEDIA'))-str_replace(".", "", $this->input->post('NILAI_PERINTAH')),             
                'NILAI_DISEPAKATI'=>  str_replace(".", "", $this->input->post('NILAI_DISEPAKATI')),                                          
                );
            
        $this->db->where('NOMOR_PESERTA', $this->input->post('NOMOR_PESERTA'));  
        $this->db->where('NO_MUTASI', $this->input->post('NO_MUTASI'));  
        $this->db->update('PESERTA_MUTASI_PPUKP',$data);                                
        
        return $data;
    }
    
    function delete_nilai_peserta_mutasi($NO_MUTASI,$NOMOR_PESERTA){
        $this->db->where('NO_MUTASI', $NO_MUTASI);        
        $this->db->where('NOMOR_PESERTA', $NOMOR_PESERTA);        
        $this->db->delete('PESERTA_MUTASI_PPUKP'); 
    }
    
    function generate_sip($NO_MUTASI,$USER){
        $q = "declare RetVal varchar(100);
              BEGIN                 
                RetVal := ADMIN.GEN_SIP_PMBYRN_MUT_KLM_PPUKP ( '".$NO_MUTASI."', '".$USER."' );
                COMMIT; 
              END; 
              ";
            //echo 'ini q'.$q;die;
        $baca = $this->db->query($q);
        
        return '';
    }    
    
}
?>