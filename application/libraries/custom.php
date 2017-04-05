<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Custom {
	private $ci;

	function __construct() {
		$this->_ci = &get_instance();
	}
	
	
	/*===== copyright =====*/
	function copyright() {
		$copyright = "Copyright &copy; 2014 Jiwasraya - All Rights Reserved ( FC )";
		
		return $copyright;
	}
	
	
	/*===== bentuk menu =====*/
	function l_build_menu() {
		$data = array();
			
		$q = $this->_ci->db->select("A.KD_MENU, ID_PARENT, MENU, URL, ICON")
						   ->from("HC_MENU A")
						   ->join("HC_AKSES_MENU B", "A.KD_MENU = B.KD_MENU", "INNER")
						   ->where('KD_STATUS', 1)
						   ->where("USERNAME", $this->_ci->session->userdata('username'))
						   ->order_by('NO_URUT', 'ASC')
						   ->get();
		if ($q->num_rows() > 0) {
			// variabel ref penampung
			$refs = array();
			
			// variable list penampung
			$list = array();
			
			foreach ($q->result_array() as $result) {
				$thisref			  = &$refs[$result['KD_MENU']];
				$thisref['KD_MENU']	  = $result['KD_MENU'];
				$thisref['ID_PARENT'] = $result['ID_PARENT'];
				$thisref['MENU']	  = $result['MENU'];
				$thisref['URL']		  = $result['URL'];
				$thisref['ICON']	  = $result['ICON'];
								
				// jika id_parent bernilai null
				if ($result['ID_PARENT'] == NULL) {
					$list[$result['KD_MENU']] = &$thisref;
				}
				else {
					$refs[$result['ID_PARENT']]['CHILDREN'][$result['KD_MENU']] = &$thisref;
				}

				$data = $list;
			}
		}
		
		$q->free_result();
		
		return $data;
	}
	
	
	/*===== generate id =====*/
	function l_generate_id($left_str, $use_year, $use_month, $mid_str, $length, $right_str, $number) {
		$id		= strlen($left_str) > 0 ? $left_str : "";
		$id		= $use_year ? $id.date('y') : $id;
		$id 	= $use_month ? $id.date('m') : $id;
		$id		= strlen($mid_str) > 0 ? $id.$mid_str : $id;
		$id		= strlen($number) > 0 ? $id.str_pad($number+1, $length, "0", STR_PAD_LEFT) : $id.str_pad(1, $length, "0", STR_PAD_LEFT);
		$id		= strlen($right_str) > 0 ? $id.$right_str : $id;
		
		return $id;
	}
	
	
	/*===== mail configuration =====*/
	function l_mail_initialize() {
		$this->_ci->load->library('encrypt');
		
		$data = Array(
		    'protocol' 	=> 'smtp',
		    'smtp_host' => 'mail.jiwasraya.co.id',
		    'smtp_port' => 25,
		    'smtp_user' => 'fendy@jiwasraya.co.id',
		    'smtp_pass' => $this->_ci->encrypt->decode("T0LFrJHDErioFU/yqqSRAYqwvXQmE6HWMWQV/yoS/Hz/BnaXPDJpuVx7LWdQOskPR0lmgccbmj/MRWssXq5dEw=="),
		    'mailtype'  => 'html',
		    'charset'   => 'iso-8859-1'
		);
		
		return $data;
	}
	
	
	/*===== variabel kolom excel =====*/
	function excel_column() {
		$column = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
						'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL',
						'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ', 'BA', 'BB', 'BC',
                        'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT',
                        'BU', 'BV', 'BW', 'BX', 'BY', 'BZ', 'CA', 'CB', 'CC', 'CD', 'CE', 'CF', 'CG', 'CH', 'CI', 'CJ', 'CK',
                        'CL', 'CM', 'CN', 'CO', 'CP', 'CQ', 'CR', 'CS', 'CT', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DA', 'DB',
                        'DC', 'DD', 'DE', 'DF', 'DG', 'DH', 'DI', 'DJ', 'DK', 'DL', 'DM', 'DN', 'DO', 'DP', 'DQ', 'DR', 'DS',
                        'DT', 'DU', 'DV', 'DW', 'DX', 'DY', 'DZ', 'EA', 'EB', 'EC', 'ED', 'EE', 'EF', 'EG', 'EH', 'EI', 'EJ',
                        'EK', 'EL', 'EM', 'EN', 'EO', 'EP', 'EQ', 'ER', 'ES', 'ET', 'EU', 'EV', 'EW', 'EX', 'EY', 'EZ', 'FA',
                        'FB', 'FC', 'FD', 'FE', 'FF', 'FG', 'FH', 'FI', 'FJ', 'FK', 'FL', 'FM', 'FN', 'FO', 'FP', 'FQ', 'FR',
                        'FS', 'FT', 'FU', 'FV', 'FW', 'FX', 'FY', 'FZ', 'GA', 'GB', 'GC', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI',
                        'GJ', 'GK', 'GL', 'GM', 'GN', 'GO', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GV', 'GW', 'GX', 'GY', 'GZ',
                        'HA', 'HB', 'HC', 'HD', 'HE', 'HF', 'HG', 'HH', 'HI', 'HJ', 'HK', 'HL', 'HM', 'HN', 'HO', 'HP', 'HQ',
                        'HR', 'HS', 'HT', 'HU', 'HV', 'HW', 'HX', 'HY', 'HZ', 'IA', 'IB', 'IC', 'ID', 'IE', 'IF', 'IG', 'IH',
                        'II', 'IJ', 'IK', 'IL', 'IM', 'IN', 'IO', 'IP', 'IQ', 'IR', 'IS', 'IT', 'IU', 'IV', 'IW', 'IX', 'IY',
                        'IZ');
		return $column;
	}


    /*===== konversi ke angka romawi =====*/
    function l_to_romawi($number) {
        $n = '';

        $romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X',
                        20 => 'XX', 30 => 'XXX', 40 => 'XL', 50 => 'L', 60 => 'LX',
                        70 => 'LXX', 80 => 'LXXX', 90 => 'XC', 100 => 'C', 200 => 'CC',
                        300 => 'CCC', 400 => 'CD', 800 => 'DCCC', 900 => 'CM', 1000 => 'M',
                        2000 => 'MM', 3000 => 'MMM');

        if (array_key_exists($number, $romawi)) {
            $n = $romawi[$number];
        }
        else if ($number >= 11 && $number <= 99) {
            $i = $number % 10;
            $n = $romawi[$number-$i].$this->l_to_romawi($number%10);
        }
        else if ($number >= 101 && $number <= 999) {
            $i = $number % 100;
            $n = $romawi[$number-$i].$this->l_to_romawi($number%100);
        }
        else {
            $i = $number % 1000;
            $n = $romawi[$number-$i].$this->l_to_romawi($number%1000);
        }

        return $n;
    }
	
	
	/*===== kamus data upload excel data provider =====*/
	function kamus_data_provider() {
		$data = array();
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_PROVINSI, KD_NEGARA, NAMA_PROVINSI FROM HC_PROVINSI WHERE KD_NEGARA IS NOT NULL');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_PROVINSI'].$value['KD_NEGARA']." (".$value['NAMA_PROVINSI'].")" : " \n".$value['KD_PROVINSI'].$value['KD_NEGARA']." (".$value['NAMA_PROVINSI'].")";
		}
		$data[] = array('KD_PROVINSI', $string);
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_TIPE_PROVIDER, TIPE_PROVIDER FROM HC_TIPE_PROVIDER');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_TIPE_PROVIDER']." (".$value['TIPE_PROVIDER'].")" : " \n".$value['KD_TIPE_PROVIDER']." (".$value['TIPE_PROVIDER'].")";
		}
		$data[] = array('KD_TIPE_PROVIDER', $string);
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_TIPE_RS, NAMA_TIPE_RS FROM HC_TIPE_RS');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_TIPE_RS']." (".$value['NAMA_TIPE_RS'].")" : " \n".$value['KD_TIPE_RS']." (".$value['NAMA_TIPE_RS'].")";
		}
		$data[] = array('KD_TIPE_RS', $string);
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_MEDIA_BAYAR, MEDIA_BAYAR FROM HC_MEDIA_BAYAR');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_MEDIA_BAYAR']." (".$value['MEDIA_BAYAR'].")" : " \n".$value['KD_MEDIA_BAYAR']." (".$value['MEDIA_BAYAR'].")";
		}
		$data[] = array('KD_MEDIA_BAYAR', $string);
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_TIPE_PROVAS, NAMA_TIPE_PROVAS FROM HC_TIPE_PROVAS');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_TIPE_PROVAS']." (".$value['NAMA_TIPE_PROVAS'].")" : " \n".$value['KD_TIPE_PROVAS']." (".$value['NAMA_TIPE_PROVAS'].")";
		}
		$data[] = array('KD_TIPE_PROVAS', $string);
		
		$data[] = array("KD_STATUS", "0 (TIDAK AKTIF) \n1 (AKTIF)");
		$data[] = array("RJ", "0 (TIDAK ADA) \n1 (ADA)");
		$data[] = array("RI", "0 (TIDAK ADA) \n1 (ADA)");
		$data[] = array("DISKON", "FORMAT TIDAK MENGGUNGAKAN TANDA %. CONTOH 10/20/25,5");
		$data[] = array("format tanggal", "FORMAT TANGGAL ADALAH DD/MM/YYYY");
		$data[] = array("sebagai catatan", "HINDARI PENGGUNAAN TANDA QOUTES BAIK SINGLE MAUPUN DOUBLE CONTOH (' atau \")");
		
		$q->free_result();
		
		return $data;
	}


	/*===== kamus data upload excel data peserta =====*/
	function kamus_data_peserta() {
		$data = array();
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_KANTOR, NAMA_KANTOR FROM HC_KANTOR ORDER BY KD_KANTOR');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_KANTOR']." (".$value['NAMA_KANTOR'].")" : " \n".$value['KD_KANTOR']." (".$value['NAMA_KANTOR'].")";
		}
		$data[] = array('KD_KANTOR', $string);
		
		$data[] = array("KD_PLAN", "KODE PLAN ADA DI MENU PRODUK");
		$data[] = array("NO_PESERTA", "KOSONGKAN JIKA INGIN DIISI OLEH SISTEM");
		
		$string = null;
		$q = $this->_ci->db->query('SELECT KD_KAWIN, STATUS_KAWIN FROM HC_KAWIN');
		foreach ($q->result_array() as $i => $value) {
			$string .= $i == 0 ? $value['KD_KAWIN']." (".$value['STATUS_KAWIN'].")" : " \n".$value['KD_KAWIN']." (".$value['STATUS_KAWIN'].")";
		}
		$data[] = array('KD_KAWIN', $string);
		
		$data[] = array("JENIS_KELAMIN", "1 (LAKI-LAKI) \n2 (PEREMPUAN)");
		$data[] = array("HUBUNGAN", "1 (PESERTA) \n2 (ISTRI) \n3 (SUAMI) \n4..n (ANAK)");
		$data[] = array("KD_STATUS", "0 (TIDAK AKTIF) \n1 (AKTIF)");
		$data[] = array("format tanggal", "FORMAT TANGGAL ADALAH DD/MM/YYYY");
		$data[] = array("sebagai catatan", "HINDARI PENGGUNAAN TANDA QOUTES BAIK SINGLE MAUPUN DOUBLE CONTOH (' atau \")");
		
		$q->free_result();
		
		return $data;
	}
}