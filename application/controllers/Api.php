<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Api extends RestController {

	function __contruct()
	{
		parent::__contruct();
	}

	function getsekolah_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getsekolah']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getsekolah', ['sekolah_id'=>$decrypt['sekolah_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key1 => $value1) {
					$this->db->where($value1);
					$this->db->delete('getsekolah');
				}
				$this->db->insert('getsekolah', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
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

	function getsekolah_get()
	{
		if($this->input->get('semester_id')){
			$cekData = $this->db->get_where('getsekolah', ['semester_id'=>$this->input->get('semester_id')])->result();
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	function getgtk_get()
	{
		if($this->input->get('tahun_ajaran_id')){
			$slice = array_slice($_GET, 1);
			$cekData = $this->db->get_where('getgtk', $slice)->result();
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	function getgtk_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getgtk']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getgtk', ['ptk_id'=>$decrypt['ptk_id'], 'tahun_ajaran_id'=>$decrypt['tahun_ajaran_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->delete('getgtk');
				}
				$this->db->insert('getgtk', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$berhasil_tambah[] = 0;
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

	function data_tes_get()
	{
		if($this->input->get('semester_id')){
			$cekData = $this->db->get_where('data_tes', ['semester_id'=>$this->input->get('semester_id')])->result();
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	function paket_soal_get()
	{
		if($this->input->get('semester_id')){
			$semester_id = $this->input->get('semester_id');
			$tahun_ajaran_id = substr($semester_id, 0,4);
			$object = [];
			$slice = array_slice($_GET, 1);
			$paket_soal = $this->db->get_where('paket_soal', $slice)->result();
			if($paket_soal){
				foreach ($paket_soal as $key => $value) {
					$pembelajaran = $this->db->query("SELECT * from pembelajaran_rombel where mata_pelajaran_id='$value->mata_pelajaran_id' and ptk_terdaftar_id='$value->ptk_terdaftar_id' and semester_id='$semester_id'")->row_array();
					if($pembelajaran){
						$object[] = [
							'id' => $value->id,
							'uniq' => $value->uniq,
							'uniq_tes' => $value->uniq_tes,
							'tingkat_pendidikan_id' => $value->tingkat_pendidikan_id,
							'ptk_terdaftar_id' => $value->ptk_terdaftar_id,
							'mata_pelajaran_id' => $value->mata_pelajaran_id,
							'semester_id' => $value->semester_id,
							'status' => $value->status,
							'mata_pelajaran_id_str' => $pembelajaran['mata_pelajaran_id_str'],
							'nama_mata_pelajaran' => $pembelajaran['nama_mata_pelajaran'],
							'ptk_terdaftar_id_str' => $pembelajaran['ptk_terdaftar_id_str'],
						];
					}
				}
				$response = [
					'status' => true,
					'message' => "Success",
					'data' => $object,
				];
				$this->response($response);
			}else{
				$response = [
					'status' => true,
					'message' => "Success",
					'data' => '0 Results',
				];
				$this->response($response);
			}
		}else{
			$response = [
				'status' => false,
				'message' => "error",
			];
			$this->response($response);
		}
	}

	function paket_soal_data_get()
	{
		if($this->input->get('data_get')&&$this->input->get('semester_id')){
			$decrypt = json_decode(base64_decode($this->input->get('data_get')), true);
			$tahun_ajaran_id = substr($decrypt['semester_id'], 0, 4);
			$list_soal = $this->db->get_where('list_soal', ['uniq_paket'=>$decrypt['uniq'], 'semester_id'=>$decrypt['semester_id']])->result();
			$objektif_soal = $this->db->get_where('objektif_soal', ['uniq_paket'=>$decrypt['uniq']])->result();
			$kunci_objektif = $this->db->get_where('kunci_objektif', ['uniq_paket'=>$decrypt['uniq']])->result();
			$jadwal_tes = $this->db->get_where('jadwal_tes', ['uniq_tes'=>$decrypt['uniq_tes'], 'mata_pelajaran_id'=>$decrypt['mata_pelajaran_id'], 'ptk_terdaftar_id'=>$decrypt['ptk_terdaftar_id']])->row_array();
			$pembelajaran = $this->db->get_where('pembelajaran_rombel', ['tingkat_pendidikan_id'=>$decrypt['tingkat_pendidikan_id'],'mata_pelajaran_id'=>$decrypt['mata_pelajaran_id'], 'ptk_terdaftar_id'=>$decrypt['ptk_terdaftar_id'], 'semester_id'=>$decrypt['semester_id']])->result();
			$dataPembelajaran[$decrypt['uniq']][] = $pembelajaran;
			$gtk = $this->db->get_where('getgtk', ['ptk_terdaftar_id'=>$decrypt['ptk_terdaftar_id'], 'tahun_ajaran_id'=>$tahun_ajaran_id])->row_array();
			foreach ($pembelajaran as $key => $value) {
				$rombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id])->row_array();
				$dataRombel[$decrypt['uniq']][] = $rombel;

				$anggota_rombel[$decrypt['uniq']][] = $this->db->get_where('anggota_rombel', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id])->result();
			}

			if($dataRombel[$decrypt['uniq']]){
				foreach ($dataRombel[$decrypt['uniq']] as $key => $value) {
					$peserta_didik[$decrypt['uniq']][] = $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$value['rombongan_belajar_id'], 'semester_id'=>$value['semester_id']])->result();
				}
			}


			if($peserta_didik[$decrypt['uniq']]){
				foreach ($peserta_didik[$decrypt['uniq']] as $key2 => $value2) {
					foreach ($value2 as $key3 => $value3) {
						$pengguna['aa'][] = $this->db->get_where('getpengguna', ['peserta_didik_id'=>$value3->peserta_didik_id])->row_array();
					}
				}
			}else{
				$pengguna['aa'] = [];
			}

			$object[] = [
				'paket_soal' => [
					'id' => $decrypt['id'],
					'uniq' => $decrypt['uniq'],
					'uniq_tes' => $decrypt['uniq_tes'],
					'tingkat_pendidikan_id' => $decrypt['tingkat_pendidikan_id'],
					'mata_pelajaran_id' => $decrypt['mata_pelajaran_id'],
					'ptk_terdaftar_id' => $decrypt['ptk_terdaftar_id'],
					'semester_id' => $decrypt['semester_id'],
					'status' => $decrypt['status'],
				],
				'tahun_ajaran_id' => $tahun_ajaran_id,
				'list_soal' => $list_soal,
				'objektif_soal' => $objektif_soal,
				'kunci_objektif' => $kunci_objektif,
				'jadwal_tes' => $jadwal_tes,
				'pembelajaran' => $dataPembelajaran[$decrypt['uniq']],
				'gtk' => $gtk,
				'anggota_rombel' => $anggota_rombel[$decrypt['uniq']],
				'rombel' => $dataRombel[$decrypt['uniq']],
				'peserta_didik' => $peserta_didik[$decrypt['uniq']],
				'pengguna' => $pengguna['aa'],
			];			

			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $object,
			];
			$this->response($response);
		}else{
			$response = [
				'status' => false,
				'message' => "Error",
			];
			$this->response($response);
		}

	}

}