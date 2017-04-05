<?php
class mpeserta extends CI_Model {
    function daftar_peserta_grup(){
        $nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorgrup)){            
            $baca = $this->db->get_where('PESERTA',array('NOMOR_GRUP'=>$nomorgrup,'KODE_STATUS'=>'1'));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    function get_peserta_grup($NOMOR_GRUP){
        $nomorgrup = $NOMOR_GRUP;
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorgrup)){            
            $baca = $this->db->get_where('PESERTA',array('NOMOR_GRUP'=>$nomorgrup,'KODE_STATUS'=>'1'));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    function daftar_peserta_individu(){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        //if(isset($nomorgrup)){      
        //$this->db->like('NOMOR_PESERTA', '2016', 'after'); 
        $this->db->order_by("NOMOR_PESERTA", "desc"); 
        $baca = $this->db->get_where('PESERTA',array('NOMOR_GRUP'=>NULL,'KODE_STATUS'=>'1'));
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
        //}
    }
    
    
    function detail_peserta($nomorpeserta){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorpeserta)){            
            $baca = $this->db->get_where('PESERTA',array('NOMOR_PESERTA'=>$nomorpeserta));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    function get_grup_peserta($nomorpeserta){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorpeserta)){            
            $baca = $this->db->get_where('PESERTA',array('NOMOR_PESERTA'=>$nomorpeserta));
            if($baca->num_rows() > 0){
                /*foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }*/
                
                $row = $baca->row_array();
		$nomor_grup = $row['NOMOR_GRUP'];
                        
                return $nomor_grup;
            }
        }
    }
    
    
    function simulasi_peserta_ppukp($nomorpeserta){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorpeserta)){            
            $baca = $this->db->get_where('PESERTA',array('NOMOR_PESERTA'=>$nomorpeserta));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    function detail_peserta_konf_kartu($nomorpeserta){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorpeserta)){
            $qx = "select a.NOMOR_PESERTA,a.NAMA,a.USIA_PENSIUN,TRIM(to_char(a.TGL_MASUK,'dd Month'))||to_char(a.TGL_MASUK,' YYYY') TGL_MASUK,a.IURAN_AWAL,
                         TRIM(to_char(a.TGL_PENSIUN,'dd Month'))||to_char(a.TGL_PENSIUN,' YYYY') TGL_PENSIUN,
                         (SELECT NAMA_PAKET_INVESTASI FROM JENIS_PAKET_INVESTASI WHERE KODE_PAKET_INVESTASI = A.JENIS_INVESTASI) PILIHAN_PAKET_INV, 
                         B.NAMA_GRUP,B.ALAMAT,B.KOTA,B.KODE_POS, replace(a.NOMOR_PESERTA,'KP','') va,
                         to_char(sysdate,'dd Month YYYY') today,to_char(a.TGL_MASUK,'dd-mm-YYYY') trans_awal
                  from peserta a,grup b
                  where a.nomor_peserta = '$nomorpeserta'
                  and a.nomor_grup = b.nomor_grup";
            
            $q = "select a.NOMOR_PESERTA,a.NAMA,a.USIA_PENSIUN,TRIM(to_char(a.TGL_MASUK,'dd Month'))||to_char(a.TGL_MASUK,' YYYY') TGL_MASUK,
                        (select mutasi_iuran_ind + mutasi_iuran_pers from buku_dana where nomor_peserta = a.nomor_peserta and kode_sandi in ('0','5') and tgl_transaksi = a.tgl_masuk) IURAN_AWAL,
                        TRIM(to_char(a.TGL_PENSIUN,'dd Month'))||to_char(a.TGL_PENSIUN,' YYYY') TGL_PENSIUN,
                        (SELECT NAMA_PAKET_INVESTASI FROM JENIS_PAKET_INVESTASI WHERE KODE_PAKET_INVESTASI = A.JENIS_INVESTASI) PILIHAN_PAKET_INV, 
                        B.NAMA_GRUP,nvl(B.ALAMAT,a.alamat) ALAMAT,nvl(B.KOTA,A.KOTA) KOTA,nvl(B.KODE_POS,a.KODE_POS) KODE_POS, replace(a.NOMOR_PESERTA,'KP','') va,
                        to_char(sysdate,'dd Month YYYY') today,to_char(a.TGL_MASUK,'dd-mm-YYYY') trans_awal
                   from peserta a,grup b
                   where a.nomor_peserta = '$nomorpeserta'
                   and a.nomor_grup = b.nomor_grup(+)";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }  
    
    function detail_peserta_ppukp_akum_dana_cukup($nomorgrup,$mindana){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorgrup)){            
            
            $q = "select a.NOMOR_PESERTA,a.NAMA,a.TGL_MASUK,a.TGL_LAHIR,a.gaji,
                        nvl((select sum(mutasi_iuran_ind) akumulasi_iuran
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) akumulasi_iuran,
                        nvl((select round(sum(akumulasi_hasil)) akumulasi_hasil
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) akumulasi_hasil,
                        nvl((select sum(mutasi_iuran_ind) + round(sum(akumulasi_hasil)) akumulasi_dana
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) akumulasi_dana      
                 from peserta a,grup b
                 where a.nomor_grup = '$nomorgrup'
                 and a.nomor_grup = b.nomor_grup
                 and nvl((select sum(mutasi_iuran_ind) akumulasi_iuran
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) >= '$mindana'"
                 . " order by nvl((select sum(mutasi_iuran_ind) akumulasi_iuran
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) desc";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    } 
    
    function detail_peserta_ppukp_akum_dana_all($nomorgrup){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorgrup)){            
            
            $q = "select a.NOMOR_PESERTA,a.NAMA,a.TGL_MASUK,a.TGL_LAHIR,a.gaji,
                        nvl((select sum(mutasi_iuran_ind) akumulasi_iuran
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) akumulasi_iuran,
                        nvl((select round(sum(akumulasi_hasil)) akumulasi_hasil
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) akumulasi_hasil,
                        nvl((select sum(mutasi_iuran_ind) + round(sum(akumulasi_hasil)) akumulasi_dana
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) akumulasi_dana      
                 from peserta a,grup b
                 where a.nomor_grup = '$nomorgrup'
                 and a.nomor_grup = b.nomor_grup  "
                 . " order by nvl((select sum(mutasi_iuran_ind) akumulasi_iuran
                           from BUKU_DANA_IND_PPUKP                  
                           where nomor_peserta = a.nomor_peserta),0) asc"   ;
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
                
    function update_nosurat_konf(){
                
        $data = array(
                'NOMOR_PESERTA'=>$this->input->post('NOMOR_PESERTA'),                                    
                'NAMA'=>$this->input->post('NAMA'),                                    
                'USIA_PENSIUN'=>$this->input->post('USIA_PENSIUN'),                                    
                'JENIS_KELAMIN'=>$this->input->post('JENIS_KELAMIN'),                                    
                //'TGL_MASUK'=>$this->input->post('TGL_MASUK'),                                                        
                'TEMPAT_LAHIR'=>'TEMPAT_LAHIR',
                //'TGL_LAHIR'=>'TGL_LAHIR',
                'ALAMAT'=>$this->input->post('ALAMAT'), 
                'TGL_KERJA'=>$this->input->post('TGL_KERJA'),                
                'GAJI'=>$this->input->post('GAJI'),                
                'PHONE'=>$this->input->post('PHONE'),                
                'NOMOR_IDENTITAS'=>$this->input->post('NOMOR_IDENTITAS'),                
                'KODE_POS'=>$this->input->post('KODE_POS'),                
                'NO_REKENING'=>$this->input->post('NO_REKENING'),                
                'NAMA_BANK'=>$this->input->post('NAMA_BANK'),                
                'PEMILIK_REKENING'=>$this->input->post('PEMILIK_REKENING')
                );
        $this->db->where('NOMOR_PESERTA', $this->input->post('NOMOR_PESERTA'));        
        $this->db->UPDATE('PESERTA',$data); 
        
        return $data;
    }
    
    
    function cetak_lampiran_sip_fee_pendiri($NO_MUTASI){          
        $q = "select no_sip1,a.nomor_peserta,nama,               
                    b.TGL_MUTASI TGL_SIP,
                    get_fee_pendiri_MUT_pst(B.NO_MUTASI,a.nomor_peserta) fee_pendiri,
                    '-1'*hitung_fee_pph('PPUKP',get_fee_pendiri_MUT_pst(B.NO_MUTASI,a.nomor_peserta),to_char(b.TGL_MUTASI,'dd/mm/yyyy')) pajak,                
                    B.NO_MUTASI,
                    NO_REKENING,NAMA_BANK,PEMILIK_REKENING
             from peserta_mutasi_ppukp A,MUTASI_PPUKP B,peserta c
             where A.no_mutasi = '".$NO_MUTASI."'
             AND A.no_mutasi = B.no_mutasi
             AND A.nomor_peserta = c.nomor_peserta"   ;
        //echo 'ini q'.$q;die;
        $baca = $this->db->query($q);
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }        
    }
    
    
    function cetak_lampiran_sip_manfaat_klaim($NO_MUTASI){          
        $q = "select no_sip2,a.nomor_peserta,nama,               
                    b.TGL_MUTASI TGL_SIP,
                    nilai_disepakati - get_fee_pendiri_MUT_pst(B.NO_MUTASI,a.nomor_peserta) MANFAAT_KLAIM,
                    '-1'*hitung_fee_pph('PPUKP',nilai_disepakati - get_fee_pendiri_MUT_pst(B.NO_MUTASI,a.nomor_peserta),to_char(b.TGL_MUTASI,'dd/mm/yyyy')) pajak_MANFAAT_KLAIM,                
                    B.NO_MUTASI,
                    NO_REKENING,NAMA_BANK,PEMILIK_REKENING
             from peserta_mutasi_ppukp A,MUTASI_PPUKP B,peserta c
             where A.no_mutasi = '".$NO_MUTASI."'
             AND A.no_mutasi = B.no_mutasi
             AND A.nomor_peserta = c.nomor_peserta"   ;
        //echo 'ini q'.$q;die;
        $baca = $this->db->query($q);
        if($baca->num_rows() > 0){
            foreach ($baca->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }        
    }
}
?>