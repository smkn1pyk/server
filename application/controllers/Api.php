<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Api extends RestController {

	function __contruct()
	{
		parent::__contruct();
		$CI =& get_instance();
		$CI->load->library('kripto');
	}

	function getsekolah_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getsekolah']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getsekolah', ['sekolah_id'=>$decrypt['sekolah_id'], 'semester_id'=>$decrypt['semester_id']])->row_array();
			if($cekData){
				$beda = array_diff($decrypt, $cekData);
				if($beda){
					$this->db->where(['sekolah_id'=>$decrypt['sekolah_id'], 'semester_id'=>$decrypt['sekolah_id']]);
					$this->db->update('getsekolah', $decrypt);
				}
			}else{
				$this->db->insert('getsekolah', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => 'Success',
				'data' => $this->db->last_query(),
			];
			$this->response($response);
		}else{
			$response = [
				'status' => false,
				'message' => 'Bukan Array',
			];
			$this->response($response);
		}
	}

	function getgtk_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getgtk']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getgtk', ['ptk_id'=>$decrypt['ptk_id'], 'tahun_ajaran_id'=>$decrypt['tahun_ajaran_id']])->row_array();
			if($cekData){
				$beda = array_diff($decrypt, $cekData);
				if($beda){
					$this->db->where(['ptk_id'=>$decrypt['ptk_id'], 'tahun_ajaran_id'=>$decrypt['tahun_ajaran_id']]);
					$this->db->update('getgtk', $decrypt);
				}
			}else{
				$this->db->insert('getgtk', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function rwy_pend_formal_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['rwy_pend_formal']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('rwy_pend_formal', ['riwayat_pendidikan_formal_id'=>$decrypt['riwayat_pendidikan_formal_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('rwy_pend_formal');
				}
				$this->db->insert('rwy_pend_formal', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('rwy_pend_formal', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function rwy_kepangkatan_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['rwy_kepangkatan']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('rwy_kepangkatan', ['riwayat_kepangkatan_id'=>$decrypt['riwayat_kepangkatan_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('rwy_kepangkatan');
				}
				$this->db->insert('rwy_kepangkatan', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('rwy_kepangkatan', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function getpesertadidik_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getpesertadidik']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$decrypt['peserta_didik_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('getpesertadidik');
				}
				$this->db->insert('getpesertadidik', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('getpesertadidik', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function getrombonganbelajar_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getrombonganbelajar']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$decrypt['rombongan_belajar_id'],'jenis_rombel'=>$decrypt['jenis_rombel'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('getrombonganbelajar');
				}
				$this->db->insert('getrombonganbelajar', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('getrombonganbelajar', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => array_sum($berhasil_tambah),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function anggota_rombel_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['anggota_rombel']), true);
		if(is_array($decrypt)){
			// $cekData = $this->db->get_where('anggota_rombel', ['anggota_rombel_id'=>$decrypt['anggota_rombel_id'],'peserta_didik_id'=>$decrypt['peserta_didik_id'], 'rombongan_belajar_id'=>$decrypt['rombongan_belajar_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			$cekData = $this->db->get_where('anggota_rombel', ['anggota_rombel_id'=>$decrypt['anggota_rombel_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('anggota_rombel');
				}
				$this->db->insert('anggota_rombel', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('anggota_rombel', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];
			$this->response($response, 200);
		}
	}

	function pembelajaran_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['pembelajaran']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('pembelajaran', ['pembelajaran_id'=>$decrypt['pembelajaran_id'],'ptk_terdaftar_id'=>$decrypt['ptk_terdaftar_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('pembelajaran');
				}
				$this->db->insert('pembelajaran', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('pembelajaran', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function getpengguna_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getpengguna']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getpengguna', ['pengguna_id'=>$decrypt['pengguna_id'],'status'=>$decrypt['status']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('getpengguna');
				}
				$this->db->insert('getpengguna', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}else{
				$this->db->insert('getpengguna', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function ambil_data_get($method=null)
	{
		$header = getallheaders();
		echo "<pre>";
		print_r ($header);
		echo "</pre>";
		if($method){
			if($method=='getgtk'){
				$where = ['tahun_ajaran_id'=>substr($header['semester_id'], 0, 4)];
			}else
			if($method=='rwy_kepangkatan'||$method=='rwy_pend_formal'||$method=='getpengguna'){
				$where = [];
			}else{
				$where = ['semester_id'=>$header['semester_id']];
			}
			$cekData = $this->db->get_where($method, $where)->result();
			if($cekData){
				$this->load->library('kripto');
				$data = $this->kripto->enkripsi(json_encode($cekData), 'admin123');
				$response = [
					'status' => true,
					'message' => "Success",
					'rows' => $data,
				];
				$this->response($response, 200);
			}else{
				$response = [
					'status' => true,
					'message' => "0 Results",
				];
				$this->response($response, 200);
			}
		}
	}

	function getsekolah_get()
	{
		$this->db->order_by('semester_id', 'desc');
		$cekData = $this->db->get('getsekolah')->result();
		if($cekData){
			$this->load->library('kripto');
			$data = $this->kripto->enkripsi(json_encode($cekData), 'admin123');
			$response = [
				'status' => true,
				'message' => "Success",
				'rows' => $data,
			];
			$this->response($response, 200);
		}else{
			$response = [
				'status' => true,
				'message' => "0 Results",
			];
			$this->response($response, 200);
		}
	}

	function getgtk_get()
	{
		$header = getallheaders();
		$semester_id = substr($header['semester_id'], 0, 4);
		$cekData = $this->db->get_where('getgtk', ['tahun_ajaran_id'=>$semester_id])->result();
		if($cekData){
			$this->load->library('kripto');
			$data = $this->kripto->enkripsi(json_encode($cekData), 'admin123');
			$response = [
				'status' => true,
				'message' => "Success",
				'rows' => $data,
			];
			$this->response($response, 200);
		}else{
			$response = [
				'status' => true,
				'message' => "0 Results",
			];
			$this->response($response, 200);
		}
	}

	function getrombonganbelajar_get()
	{
		if($this->input->get('semester_id')){
			$slice = array_slice($_GET, 1);
			if(count($slice)==1){
				$this->db->order_by('nama', 'asc');
				$cekData = $this->db->get_where('getrombonganbelajar', $slice)->result();
			}else{
				$pembelajaran = $this->db->get_where('pembelajaran_rombel', $slice)->result();
				if($pembelajaran){
					foreach ($pembelajaran as $key => $value) {
						$rombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id])->row_array();

						if($rombel){
							$cekData[] = $rombel;
						}
					}
				}else{
					$cekData = [];
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	function pembelajaran_rombel_get()
	{
		if($this->input->get('semester_id')){
			$slice = array_slice($_GET, 1);
			$cekData = $this->db->get_where('pembelajaran_rombel', $slice)->result();
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	function getpengguna_gtk_get()
	{
		if($this->input->get('status')){
			$slice = array_slice($_GET, 1);
			$this->db->order_by('peran_id_str', 'asc');
			$cekData = $this->db->get_where('getpengguna', $slice)->result();
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	

}