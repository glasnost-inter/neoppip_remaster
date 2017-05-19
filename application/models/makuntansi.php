<?php
class makuntansi extends CI_Model {
	/*
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
    }*/
    
    
    function daftar_transaksi(){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select a.ID_REKAP,NAMA_MUTASI,max(tgl_transaksi) tgl_transaksi,
						   round(sum(nvl(mutasi_iuran_ind,0))) mutasi_iuran_ind,
						   round(sum(nvl(mutasi_iuran_pers,0))) mutasi_iuran_pers,
						   round(sum(nvl(mutasi_hasil,0))) mutasi_hasil  
					from MUTASI_ID_KEUANGAN a,rekap_view_trans_pembukuan b
					where b.ID_VIEW_REKAP = a.id_rekap
					group by a.ID_REKAP,NAMA_MUTASI 
					order by id_rekap desc";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
	
	
	function lampiran_slip_daftar_iuran_lanjutan($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select PROSES_BISNIS,IURAN,
						   CASE WHEN NOMOR_GRUP IS NOT NULL THEN 
								'PENERIMAAN '||NAMA_MUTASI||' '||(SELECT NAMA_GRUP FROM GRUP WHERE NOMOR_GRUP = A.NOMOR_GRUP)||
								' NO GRUP '||NOMOR_GRUP 
						   ELSE
								'PENERIMAAN '||NAMA_MUTASI||' '||(SELECT NAMA FROM PESERTA WHERE NOMOR_PESERTA = A.NOMOR_PESERTA)||
								' NO PESERTA '||NOMOR_PESERTA
						   END KETERANGAN,
						   (SELECT NAMA FROM AKUN WHERE KODE_AKUN = (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI)) NAMA_AKUN, 
						   (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI) AKUN,
						   (select POSISI from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI) POSISI 
					from (
					select NAMA_MUTASI,NOMOR_GRUP,NOMOR_PESERTA,
						   CASE WHEN NOMOR_GRUP IS NULL THEN
							'IURAN_NON_GRUP'       
						   ELSE   
							'IURAN_IND'
						   END PROSES_BISNIS,
						   sum(NVL(MUTASI_IURAN_IND,0)) IURAN
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					group by NOMOR_GRUP,NAMA_MUTASI,NOMOR_PESERTA
					UNION ALL
					select NAMA_MUTASI,NOMOR_GRUP,NOMOR_PESERTA,
						   CASE WHEN NOMOR_GRUP IS NULL THEN
							'IURAN_NON_GRUP'       
						   ELSE   
							'IURAN_PERS'
						   END PROSES_BISNIS,
						   sum(NVL(MUTASI_IURAN_PERS,0)) MUTASI_IURAN
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					group by NOMOR_GRUP,NAMA_MUTASI,NOMOR_PESERTA
					) a
					where iuran <> 0 ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
	
	function rekap_slip_daftar_iuran_lanjutan($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select sum(IURAN) TOTAL_NOMINAL,terbilang(sum(IURAN)) TERBILANG_NOMINAL
					from (
					select NAMA_MUTASI,NOMOR_GRUP,NOMOR_PESERTA,
						   CASE WHEN NOMOR_GRUP IS NULL THEN
							'IURAN_NON_GRUP'       
						   ELSE   
							'IURAN_IND'
						   END PROSES_BISNIS,
						   sum(NVL(MUTASI_IURAN_IND,0)) IURAN
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					group by NOMOR_GRUP,NAMA_MUTASI,NOMOR_PESERTA
					UNION ALL
					select NAMA_MUTASI,NOMOR_GRUP,NOMOR_PESERTA,
						   CASE WHEN NOMOR_GRUP IS NULL THEN
							'IURAN_NON_GRUP'       
						   ELSE   
							'IURAN_PERS'
						   END PROSES_BISNIS,
						   sum(NVL(MUTASI_IURAN_PERS,0)) MUTASI_IURAN
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					group by NOMOR_GRUP,NAMA_MUTASI,NOMOR_PESERTA
					) a
					where iuran <> 0 ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
	
	function lampiran_slip_iuran_sementara_unidentified($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select PROSES_BISNIS,IURAN,nama_mutasi KETERANGAN,
						   (SELECT NAMA FROM AKUN WHERE KODE_AKUN = (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI)) NAMA_AKUN, 
						   (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI) AKUN,
						   (select POSISI from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI) POSISI 
					from (
					select NAMA_MUTASI,kode_jurnal proses_bisnis,
						   NVL(MUTASI_IURAN_IND,0)+NVL(MUTASI_IURAN_PERS,0) iuran
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					) a
					where iuran <> 0  ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
	
	function rekap_slip_iuran_sementara_unidentified($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select sum(IURAN) TOTAL_NOMINAL,terbilang(sum(IURAN)) TERBILANG_NOMINAL
					from (
					select NAMA_MUTASI,kode_jurnal proses_bisnis,
						   NVL(MUTASI_IURAN_IND,0)+NVL(MUTASI_IURAN_PERS,0) iuran
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					) a
					where iuran <> 0  ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
	
	function lampiran_slip_iuran_closing($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select PROSES_BISNIS,IURAN,
						   case when NAMA_MUTASI = 'CLOSING BULANAN' THEN
							'Fee Closing Bulanan '||to_char(tgl_transaksi,'mm/yyyy')
						   ELSE
							'Fee Closing Tahunan '||to_char(tgl_transaksi,'yyyy')
						   END keterangan,
						   (SELECT NAMA FROM AKUN WHERE KODE_AKUN = (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI)) NAMA_AKUN,
						   (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI) AKUN,
						   (select POSISI from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = A.NAMA_MUTASI) POSISI 
					from (
					select NAMA_MUTASI,kode_jurnal proses_bisnis,tgl_transaksi,
						   NVL(MUTASI_IURAN_IND,0)+NVL(MUTASI_IURAN_PERS,0)+NVL(MUTASI_HASIL,0) iuran
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					) a
					where iuran <> 0  ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
	
	function rekap_slip_iuran_closing($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select sum(IURAN) TOTAL_NOMINAL,terbilang(sum(IURAN)) TERBILANG_NOMINAL
					from (
					select NAMA_MUTASI,kode_jurnal proses_bisnis,tgl_transaksi,
						   NVL(MUTASI_IURAN_IND,0)+NVL(MUTASI_IURAN_PERS,0)+NVL(MUTASI_HASIL,0) iuran
					from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
					WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
					AND A.ID_VIEW_REKAP = B.ID_REKAP
					) a
					where iuran <> 0  ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
        function detail_memorial($AS_ID_REKAP){
        //$nomorgrup = $this->input->post('nomorgrup');
        //echo 'ini nomorpeserta'.$nomorpeserta;die;
        //if(isset($nomorpeserta)){
            $q = "select PROSES_BISNIS,IURAN,
                            case when NAMA_MUTASI = 'CLOSING BULANAN' THEN
                                 'Fee Closing Bulanan '||to_char(tgl_transaksi,'mm/yyyy')
                            ELSE
                                 'Fee Closing Tahunan '||to_char(tgl_transaksi,'yyyy')
                            END keterangan,
                            (SELECT NAMA FROM AKUN WHERE KODE_AKUN = (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = 'MEMORIAL '||A.NAMA_MUTASI)) NAMA_AKUN,
                            (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = 'MEMORIAL '||A.NAMA_MUTASI) AKUN,
                            (select POSISI from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = 'MEMORIAL '||A.NAMA_MUTASI) POSISI 
                  from (
                  select NAMA_MUTASI,'BANK' proses_bisnis,tgl_transaksi,
                            NVL(MUTASI_IURAN_IND,0)+NVL(MUTASI_IURAN_PERS,0)+NVL(MUTASI_HASIL,0) iuran
                  from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
                  WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
                  AND A.ID_VIEW_REKAP = B.ID_REKAP
                  ) a
                  where iuran <> 0 
                  union all
                    select PROSES_BISNIS,IURAN,
                            case when NAMA_MUTASI = 'CLOSING BULANAN' THEN
                                 'Fee Closing Bulanan '||to_char(tgl_transaksi,'mm/yyyy')
                            ELSE
                                 'Fee Closing Tahunan '||to_char(tgl_transaksi,'yyyy')
                            END keterangan,
                            (SELECT NAMA FROM AKUN WHERE KODE_AKUN = (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = 'MEMORIAL '||A.NAMA_MUTASI)) NAMA_AKUN,
                            (select akun from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = 'MEMORIAL '||A.NAMA_MUTASI) AKUN,
                            (select POSISI from AKUN_MAPPING where proses_bisnis = a.proses_bisnis and PENGGUNAAN = 'MEMORIAL '||A.NAMA_MUTASI) POSISI 
                  from (
                  select NAMA_MUTASI,kode_jurnal proses_bisnis,tgl_transaksi,
                            NVL(MUTASI_IURAN_IND,0)+NVL(MUTASI_IURAN_PERS,0)+NVL(MUTASI_HASIL,0) iuran
                  from REKAP_VIEW_TRANS_PEMBUKUAN a,MUTASI_ID_KEUANGAN B
                  WHERE A.ID_VIEW_REKAP = $AS_ID_REKAP
                  AND A.ID_VIEW_REKAP = B.ID_REKAP
                  ) a
                  where iuran <> 0 ";
            //echo 'ini q'.$q;die;
            $baca = $this->db->query($q);
            if($baca->num_rows() > 0){
                foreach ($baca->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        //}
    }
    
}
?>