<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;

class Api extends RestController {

	function __contruct()
	{
		parent::__contruct();
	}

	function data_tes_post()
	{
		$dt = array_values($_POST)[1];
		$decrypt = json_decode(base64_decode($dt), true);
		if($decrypt&&is_array($decrypt)){
			foreach ($decrypt as $key => $value) {
				if($key=='data_tes'){
					$cekData = $this->db->get_where('data_tes', ['uniq'=>$value['uniq']])->result_array();
					if($cekData){
						foreach ($cekData as $key1 => $value1) {
							$this->db->where($value1);
							$this->db->delete('data_tes');
						}
					}
					$this->db->insert('data_tes', $value);
					if($this->db->affected_rows()>>0){
						$status['Success'][$value1['nama']] = 1;
					}else{
						$status['Gagal'][$value1['nama']] = 1;
					}
					$response = [
						'status' => true,
						'message' => "Success",
						'data' => $status,
					];
					$this->response($response, 200);
				}
			}
		}else{
			$response = [
				'status' => true,
				'message' => "Gagal mengkonversi data",
			];
			$this->response($response, 200);
		}
	}

	function paket_soal_post()
	{
		$dt = array_values($_POST)[1];
		$decrypt = json_decode(base64_decode($dt), true);
		if(is_array($decrypt)){
			foreach ($decrypt as $key => $value) {
				if($key=='paket_soal'){
					$where = ['uniq_tes'=>$value['uniq_tes'], 'tingkat_pendidikan_id'=>$value['tingkat_pendidikan_id'], 'mata_pelajaran_id'=>$value['mata_pelajaran_id'], 'semester_id'=>$value['semester_id']];
					$cekPaketSoal = $this->db->get_where('paket_soal', $where)->result();
					if($cekPaketSoal){
						$this->db->where($where);
						$this->db->delete('paket_soal');
						foreach ($cekPaketSoal as $key1 => $value1) {
							$cekListSoal = $this->db->get_where('list_soal', ['uniq_paket'=>$value1->uniq])->result_array();
							$cekObjektifSoal = $this->db->get_where('objektif_soal', ['uniq_paket'=>$value1->uniq])->result_array();
							$cekKunciObjektif = $this->db->get_where('kunci_objektif', ['uniq_paket'=>$value1->uniq])->result_array();
							$cekJadwalTes = $this->db->get_where('jadwal_tes', ['uniq_tes'=>$value['uniq_tes'], 'mata_pelajaran_id'=>$value['mata_pelajaran_id'], 'tingkat_pendidikan_id'=>$value['tingkat_pendidikan_id'], 'ptk_terdaftar_id'=>$value['ptk_terdaftar_id']])->result_array();


							if($cekListSoal){
								foreach ($cekListSoal as $key2 => $value2) {
									$this->db->where($value2);
									$this->db->delete('list_soal');
								}
							}

							if($cekObjektifSoal){
								foreach ($cekObjektifSoal as $key2 => $value2) {
									$this->db->where($value2);
									$this->db->delete('objektif_soal');
								}
							}

							if($cekKunciObjektif){
								foreach ($cekKunciObjektif as $key2 => $value2) {
									$this->db->where($value2);
									$this->db->delete('kunci_objektif');
								}
							}

							if($cekJadwalTes){
								foreach ($cekJadwalTes as $key2 => $value2) {
									$this->db->where($value2);
									$this->db->delete('jadwal_tes');
								}
							}
						}
					}
					$paket_soal = [
						'uniq' => $value['uniq'],
						'uniq_tes' => $value['uniq_tes'],
						'tingkat_pendidikan_id' => $value['tingkat_pendidikan_id'],
						'mata_pelajaran_id' => $value['mata_pelajaran_id'],
						'ptk_terdaftar_id' => $value['ptk_terdaftar_id'],
						'semester_id' => $value['semester_id'],
						'status' => $value['status'],
					];
					
					if($paket_soal){
						$this->db->insert('paket_soal', $paket_soal);
						if($this->db->affected_rows()>>0){
							$status['Success']['paket_soal'][] = 1;
						}else{
							$status['Gagal']['paket_soal'][] = 1;
						}
					}else{
						$status['Success']['paket_soal'] = [];
						$status['Gagal']['paket_soal'] = [];
					}

					foreach ($value['soal'] as $key1 => $value1) {
						if($value1['list_soal']){
							$this->db->insert('list_soal', $value1['list_soal']);
							if($this->db->affected_rows()>>0){
								$status['Success']['list_soal'][] = 1;
							}else{
								$status['Gagal']['list_soal'][] = 1;
							}
						}

						if($value1['objektif_soal']){
							$this->db->insert_batch('objektif_soal', $value1['objektif_soal']);
							if($this->db->affected_rows()>>0){
								$status['Success']['objektif_soal'][] = count($value1['objektif_soal']);
							}else{
								$status['Gagal']['objektif_soal'][] = count($value1['objektif_soal']);
							}
						}else{
							$status['Success']['objektif_soal'] = [];
							$status['Gagal']['objektif_soal'] = [];
						}

						if($value1['kunci_objektif']){
							$this->db->insert('kunci_objektif', $value1['kunci_objektif']);
							if($this->db->affected_rows()>>0){
								$status['Success']['kunci_objektif'][] = 1;
							}else{
								$status['Gagal']['kunci_objektif'][] = 1;
							}
						}else{
							$status['Success']['kunci_objektif'] = [];
							$status['Gagal']['kunci_objektif'] = [];
						}
					}

					if($value['jadwal_tes']){
						$this->db->insert('jadwal_tes', $value['jadwal_tes']);
						if($this->db->affected_rows()>>0){
							$status['Success']['jadwal_tes'][] = 1;
						}else{
							$status['Gagal']['jadwal_tes'][] = 1;
						}
					}
					$s_paketSoal = 0;
					$s_listSoal = 0;
					$s_objektifSoal = 0;
					$s_kunciObjektif = 0;
					$s_jadwaLTes = 0;

					$g_paketSoal = 0;
					$g_listSoal = 0;
					$g_objektifSoal = 0;
					$g_kunciObjektif = 0;
					$g_jadwaLTes = 0;

					foreach ($status as $key1 => $value1) {
						// if($key1=='Success'){
						// 	$s_paketSoal = array_sum($value1['paket_soal']);
						// 	$s_listSoal = array_sum($value1['list_soal']);
						// 	$s_objektifSoal = array_sum($value1['objektif_soal']);
						// 	$s_kunciObjektif = array_sum(($value1['objektif_soal']));
						// 	$s_jadwaLTes = array_sum($value1['jadwal_tes']);
						// }else{
						// 	$g_paketSoal = array_sum($value1['paket_soal']);
						// 	$g_listSoal = array_sum($value1['list_soal']);
						// 	$g_objektifSoal = array_sum($value1['objektif_soal']);
						// 	$g_kunciObjektif = array_sum(($value1['objektif_soal']));
						// 	$g_jadwaLTes = array_sum($value1['jadwal_tes']);
						// }
					}

					$dataStatus = [
						'Success Menambahkan Paket Soal' => $s_paketSoal,
						'Gagal Menambahkan Paket Soal' => $g_paketSoal,
						'Success Menambahkan List Soal' => $s_listSoal,
						'Gagal Menambahkan List Soal' => $g_listSoal,
						'Success Menambahkan Objektif Soal' => $s_objektifSoal,
						'Gagal Menambahkan Objektif Soal' => $g_objektifSoal,
						'Success Menambahkan Kunci Objektif Soal' => $s_kunciObjektif,
						'Gagal Menambahkan Kunci Objektif Soal' => $g_kunciObjektif,
						'Success Menambahkan Jadwal Tes' => $s_jadwaLTes,
						'Gagal Menambahkan Jadwal Tes' => $g_jadwaLTes,
					];

					$response = [
						'status' => true,
						'message' => "Success",
						'data' => $dataStatus,
					];
					$this->response($response, 200);
				}else{
					$response = [
						'status' => true,
						'message' => "Terjadi kesalahan sistem",
					];
					$this->response($response, 200);
				}
			}
		}else{
			$response = [
				'status' => true,
				'message' => "Gagal mengkonversi data",
			];
			$this->response($response, 200);
		}
	}


	function dapodik_data_post()
	{
		$dt = array_values($_POST)[1];
		$decrypt = json_decode(base64_decode($dt), true);
		if($decrypt){
			$ids = [
				'getsekolah' => 'sekolah_id',
				'getpesertadidik' => 'peserta_didik_id',
				'getgtk' => 'ptk_id',
				'rwy_pend_formal' => 'riwayat_pendidikan_formal_id',
				'rwy_kepangkatan' => 'riwayat_kepangkatan_id',
				'getrombonganbelajar' => 'rombongan_belajar_id',
				'anggota_rombel' => 'anggota_rombel_id',
				'pembelajaran' => 'pembelajaran_id',
				'getpengguna' => 'pengguna_id',
			];
			if(is_array($decrypt)){
				$berhasil_tambah = [];
				$gagal_tambah = [];
				$berhasil_update = [];
				$gagal_update = [];
				foreach ($decrypt as $key => $value) {
					$table = $key;
					if($key=='getsekolah'||$key=='getpesertadidik'||$key=='getgtk'||$key=='rwy_kepangkatan'||$key=='rwy_pend_formal'||$key=='getrombonganbelajar'||$key=='anggota_rombel'||$key=='pembelajaran'||$key=='getpengguna'){
						foreach ($value as $key1 => $value1) {
							foreach ($value1 as $key2 => $value2) {
								if($key=='getpengguna'){
									$where = [$ids[$key]=>$value2[$ids[$key]]];
								}else
								if($key=='getgtk'){
									$where = [$ids[$key]=>$value2[$ids[$key]], 'tahun_ajaran_id'=>$value2['tahun_ajaran_id']];
								}else
								if($key=='rwy_kepangkatan'||$key=='rwy_pend_formal'){
									$where = [$ids[$key]=>$value2[$ids[$key]]];
								}else{
									$where = [$ids[$key]=>$value2[$ids[$key]], 'semester_id'=>$value2['semester_id']];
								}
								$cekData = $this->db->get_where($key, $where)->result();
								if($cekData){
									$this->db->where($where);
									$this->db->update($table, $value2);
									if($this->db->affected_rows()>>0){
										$berhasil_update[] = 1;
									}else{
										$gagal_update[] = 1;
									}
								}else{
									$this->db->insert($table, $value2);
									if($this->db->affected_rows()>>0){
										$berhasil_tambah[] = 1;
									}else{
										$gagal_tambah[] = 1;
									}
								}
							}
						}
					} // End if Table
				} // End Foreach Decrypt
				$jml_btambah = array_sum($berhasil_tambah);
				$jml_gtambah = array_sum($gagal_tambah);
				$jml_bupdate = array_sum($berhasil_update);
				$jml_gupdate = array_sum($gagal_update);

				$response = [
					'status' => true,
					'message' => 'Success',
					'data' => "Berhasil tambah ". $jml_btambah . " data<br>Gagal tambah ". $jml_gtambah . " data <br>Berhasil update ". $jml_bupdate . " data <br>Gagal update ". $jml_gupdate. " data<hr>",
				// 'data' => ['ddd'=> "Berhasil menambahkan data"],
				];
				$this->response($response);
			} // End If Is Array Decrypt
		}else{ // If Decrypt
			$response = [
				'status' => false,
				'message' => 'Tidak bisa mengkonversi data',
				'data' => $decrypt,
			];
			$this->response($response, 404);
		}
	}

	function get_data_get()
	{
		// echo "<pre>";
		// print_r ($_GET);
		// echo "</pre>";
		// exit();
		if($_GET){
			$table = ($_GET['get_data']);
			foreach ($_GET as $key => $value) {
				$key1[] = $key;
				$value1[] = $value;
			}
			$cekData = $this->db->get_where($table, [$key1[2]=>$value1[2]])->result();
			// echo $this->db->last_query()."<br>";
			if($cekData){
				$response = [
					'status' => true,
					'message' => 'Success',
					'data' => $cekData,
				];
				$this->response($response);
			}else{
				$response = [
					'status' => true,
					'message' => 'Success',
					'data' => '0 Results',
				];
				$this->response($response);
			}
		}else{
			$response = [
				'status' => false,
				'message' => 'Terjadi kesalahan sistem',
			];
			$this->response($response);
		}
	}

	function data_tes_get()
	{
		if($this->input->get('semester_id')){
			$semester_id = $this->input->get('semester_id');
			$data_tes = $this->db->get_where('data_tes', ['semester_id'=>$semester_id])->result();
			if($data_tes){
				$object['data_tes'] = $data_tes;
				$response = [
					'status' => true,
					'message' => "Success",
					'data' => $object
				];
				$this->response($response);
			}else{
				$response = [
					'status' => true,
					'message' => "0 Results",
				];
				$this->response($response);
			}
		}else{
			$response = [
				'status' => false,
				'message' => "Error",
			];
			$this->response($response);
		}
	}

	function paket_soal_get()
	{
		if($this->input->get('semester_id')){
			$semester_id = $this->input->get('semester_id');
			$tahun_ajaran_id = substr($semester_id, 0,4);
			$object = [];
			$paket_soal = $this->db->get_where('paket_soal', ['uniq_tes'=>$this->input->get('data_tes'), 'semester_id'=>$semester_id, 'status'=>1])->result();
			if($paket_soal){
				foreach ($paket_soal as $key => $value) {
					$pembelajaran = $this->db->query("SELECT DISTINCT(mata_pelajaran_id) , mata_pelajaran_id_str, nama_gtk from getpembelajaran where mata_pelajaran_id='$value->mata_pelajaran_id' and ptk_terdaftar_id='$value->ptk_terdaftar_id' and semester_id='$semester_id'")->row_array();
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
							'nama_gtk' => $pembelajaran['nama_gtk'],
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
				'message' => "Success",
				'data' => ['data'=>1],
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

/* End of file Api.php */
	/* Location: ./application/controllers/Api.php */