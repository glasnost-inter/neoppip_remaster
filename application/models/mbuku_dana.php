<?php
class mbuku_dana extends CI_Model {
    function buku_dana($nomorpeserta){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini '.$nomorgrup;die;
        if(isset($nomorpeserta)){
            $this->db->order_by("TGL_TRANSAKSI", "ASC");
            $this->db->order_by("NOMOR_BARIS", "ASC"); 
            $baca = $this->db->get_where('BUKU_DANA',array('NOMOR_PESERTA'=>$nomorpeserta));
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }
    }
    
    
    function buku_dana_ind_ppukp($nomorpeserta){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorpeserta)){
            $q = "select rownum nomor_baris,a.*
				  from		
				  (select tgl_transaksi,kode_sandi,mutasi_iuran_ind mutasi_iuran_ind,0 mutasi_iuran_pers,
                        sum(mutasi_iuran_ind) over (order by tgl_transaksi ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) akumulasi_iuran_ind,0 akumulasi_iuran_pers,
                        round(nvl(mutasi_hasil,0)) mutasi_hasil,
                        sum(round(nvl(mutasi_hasil,0))) over (order by tgl_transaksi ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW) akumulasi_hasil,
                        round(sum(nvl(mutasi_iuran_ind,0)+nvl(mutasi_hasil,0)) over (order by tgl_transaksi ROWS BETWEEN UNBOUNDED PRECEDING AND CURRENT ROW)) akumulasi_dana        
                  from BUKU_DANA_IND_PPUKP
                  where nomor_peserta = '$nomorpeserta'
                  order by tgl_transaksi) a";
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
    
    function get_akum_ind_ppukp($nomorpeserta,$pil){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorpeserta)){
            $q = "select sum(mutasi_iuran_ind) akumulasi_iuran,
                        round(sum(akumulasi_hasil)) akumulasi_hasil,                                 
                        sum(mutasi_iuran_ind) +
                        round(sum(akumulasi_hasil)) akumulasi_dana
                  from BUKU_DANA_IND_PPUKP
		  where nomor_peserta = '$nomorpeserta'";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){                                
                $row = $baca->row_array();
                
                if($pil=='1'){
                    $hasil = $row['AKUMULASI_IURAN'];
                }elseif($pil=='2'){
                    $hasil = $row['AKUMULASI_HASIL'];
                }else{
                    $hasil = $row['AKUMULASI_DANA'];
                }
		
                return $hasil;
            }
        }
    }
    
    
    function get_simulasi_ind_ppukp($nomorpeserta,$tgltransaksi,$kodeklaim){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        if(isset($nomorpeserta)){
            $q = "SELECT GAJI * POWER((1+FAKTOR_GAJI_VALUASI),MASA_TH)*
                        f_GET_UUK(z.kd_tarif,z.kode_klaim,z.masa_th) nilaiklaim               
                 FROM (
                     select b.gaji,b.tgl_masuk,to_date('$tgltransaksi','dd/mm/yyyy') tgl_klaim,'$kodeklaim' kode_klaim,
                            nvl((select nilai from pks_konstanta where kode_pks = (select kode_pks from grup where nomor_grup = b.nomor_grup) and kode_konstanta = 'KENGAJI')/100,0) FAKTOR_gaji_valuasi,
                            nvl((select nilai from pks_konstanta where kode_pks = (select kode_pks from grup where nomor_grup = b.nomor_grup) and kode_konstanta = 'KDUUK'),'STD_UUK') KD_TARIF,                           
                            FLOOR(MONTHS_BETWEEN(to_date('$tgltransaksi','dd/mm/yyyy'),b.tgl_kerja)/12) MASA_TH,b.nomor_grup
                     from peserta b
                     where b.nomor_peserta = '$nomorpeserta') z";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){                                
                $row = $baca->row_array();
		$hasil = $row['NILAIKLAIM'];                                        
                return $hasil;
            }
        }
    }
    
    function buku_dana_grup_new($nomorgrup){
                
        $q = "select TGL_TRANSAKSI,KODE_SANDI,sum(MUTASI_IURAN_IND) MUTASI_IURAN_IND,
                    sum(MUTASI_IURAN_PERS) MUTASI_IURAN_PERS,sum(AKUMULASI_IURAN_IND) AKUMULASI_IURAN_IND,
                    sum(AKUMULASI_IURAN_PERS) AKUMULASI_IURAN_PERS,sum(MUTASI_HASIL) MUTASI_HASIL,
                    sum(AKUMULASI_HASIL) AKUMULASI_HASIL,sum(AKUMULASI_DANA) AKUMULASI_DANA,
                    sum(MUTASI_HASIL_IND) MUTASI_HASIL_IND,sum(MUTASI_HASIL_PERS) MUTASI_HASIL_PERS,
                    sum(AKUMULASI_HASIL_IND) AKUMULASI_HASIL_IND,
                    sum(AKUMULASI_HASIL_PERS) AKUMULASI_HASIL_PERS,
                    sum(AKUMULASI_DANA_IND) AKUMULASI_DANA_IND,sum(AKUMULASI_DANA_PERS) AKUMULASI_DANA_PERS
             from buku_dana
             where nomor_peserta in
             (select nomor_peserta from peserta where nomor_grup = '$nomorgrup')
             group by TGL_TRANSAKSI,KODE_SANDI
             order by TGL_TRANSAKSI,KODE_SANDI";
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