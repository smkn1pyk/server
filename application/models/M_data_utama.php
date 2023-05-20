<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_utama extends CI_Model {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('akun')){
			$this->session->sess_destroy();
		}
	}

	function webservice()
	{
		return $this->db->get('webservice')->row_array();
	}

	function keys()
	{
		return $this->db->get('keys')->row_array();
	}

	function kop_sekolah()
	{
		return $this->db->get_where('kop_sekolah', ['semester_id'=>$this->session->userdata('semester_id')])->result();
	}

	function jml_kop_sekolah()
	{
		return $this->db->query("SELECT count(uniq) as jml from kop_sekolah where semester_id='".$this->session->userdata('semester_id')."'")->row_array();
	}

	function getsekolah()
	{
		return $this->db->get_where('getsekolah', ['semester_id'=>$this->session->userdata('semester_id')])->result();
	}

	function jml_sekolah()
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->query("SELECT count(sekolah_id) as jml from getsekolah where semester_id='$semester_id'")->row_array();
	}

	function getgtk()
	{
		$pencarian = $this->input->get('pencarian');
		$jenis_ptk_awal = $this->jenis_ptk()[0]->jenis_ptk_id;
		if($this->session->userdata('ptk_id')){
			if($this->session->userdata('jenis_ptk_id')==11){
				if($pencarian){
					$this->db->like('nama', $pencarian, 'BOTH');
					$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
					$this->db->or_like('nip', $pencarian, 'BOTH');
					$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
					$this->db->or_like('nik', $pencarian, 'BOTH');
					$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
					$this->db->or_like('jenis_ptk_id_str', $pencarian, 'BOTH');
					$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
					$this->db->or_like('pangkat_golongan_terakhir', $pencarian, 'BOTH');
					$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
					return $this->db->get('getgtk')->result();
				}
				if($this->input->get('jenis_ptk')){
					$this->db->where(['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'), 'jenis_ptk_id'=> $this->input->get('jenis_ptk')]);
					$this->db->order_by('nama', 'asc');
					return $this->db->get('getgtk')->result();
				}else{
					$this->db->order_by('nama', 'asc');
					$this->db->where(['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'), 'jenis_ptk_id'=>$jenis_ptk_awal]);
					return $this->db->get('getgtk')->result();
				}
			}else{
				return $this->db->get_where('getgtk', ['ptk_terdaftar_id'=>$this->session->userdata('ptk_terdaftar_id'), 'tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id')])->result();
			}
		}else{
			if($pencarian){
				$this->db->like('nama', $pencarian, 'BOTH');
				$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
				$this->db->or_like('nip', $pencarian, 'BOTH');
				$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
				$this->db->or_like('nik', $pencarian, 'BOTH');
				$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
				$this->db->or_like('jenis_ptk_id_str', $pencarian, 'BOTH');
				$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
				$this->db->or_like('pangkat_golongan_terakhir', $pencarian, 'BOTH');
				$this->db->where('tahun_ajaran_id', $this->session->userdata('tahun_ajaran_id'));
				return $this->db->get('getgtk')->result();
			}
			if($this->input->get('jenis_ptk')){
				$this->db->where(['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'), 'jenis_ptk_id'=> $this->input->get('jenis_ptk')]);
				$this->db->order_by('nama', 'asc');
				return $this->db->get('getgtk')->result();
			}else{
				$this->db->order_by('nama', 'asc');
				$this->db->where(['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'), 'jenis_ptk_id'=>$jenis_ptk_awal]);
				return $this->db->get('getgtk')->result();
			}
		}
	}

	function getgtk_id($ptk_id)
	{
		$tahun_ajaran_id = $this->session->userdata('tahun_ajaran_id');
		return $this->db->get_where('getgtk', ['ptk_id'=>$ptk_id, 'tahun_ajaran_id'=>$tahun_ajaran_id])->row_array();
	}

	function jenis_ptk()
	{
		return $this->db->query("SELECT DISTINCT(jenis_ptk_id), jenis_ptk_id_str from getgtk where tahun_ajaran_id='".$this->session->userdata('tahun_ajaran_id')."'")->result();
	}

	function jml_gtk()
	{
		if($this->input->get('jenis_ptk')){
			return $this->db->query("SELECT count(ptk_id) as jml from getgtk where jenis_ptk_id='".$this->input->get('jenis_ptk')."' and tahun_ajaran_id='".$this->session->userdata('tahun_ajaran_id')."'")->row_array();
		}else{
			return $this->db->query("SELECT count(ptk_id) as jml from getgtk where tahun_ajaran_id='".$this->session->userdata('tahun_ajaran_id')."'")->row_array();
		}
	}

	function rwy_pend_formal()
	{
		if($this->input->get('ptk')){
			return $this->db->get_where('rwy_pend_formal', ['ptk_id'=>$this->input->get('ptk')])->result();
		}else{
			return $this->db->get('rwy_pend_formal')->result();
		}
	}

	function rwy_pend_formal_id($id)
	{
		$this->db->order_by('jenjang_pendidikan_id_str', 'asc');
		return $this->db->get_where('rwy_pend_formal', ['ptk_id'=>$id])->result();
	}

	function jml_rwy_pend_formal()
	{
		return $this->db->query("SELECT count(ptk_id) as jml from rwy_pend_formal")->row_array();
	}

	function rwy_kepangkatan()
	{
		if($this->input->get('ptk')){
			$ptk = $this->input->get('ptk');
			return $this->db->get_where('rwy_kepangkatan', ['ptk_id'=>$ptk])->result();
		}else{
			return $this->db->get('rwy_kepangkatan')->result();
		}
	}

	function rwy_kepangkatan_id($id)
	{
		$this->db->order_by('pangkat_golongan_id_str', 'asc');
		return $this->db->get_where('rwy_kepangkatan', ['ptk_id'=>$id])->result();
	}

	function jml_rwy_kepangkatan()
	{
		return $this->db->query("SELECT count(ptk_id) as jml from rwy_kepangkatan")->row_array();
	}

	function getpesertadidik()
	{
		$pencarian = $this->input->get('pencarian');
		$rombel = $this->input->get('rombel');
		$semester_id = $this->session->userdata('semester_id');
		if($this->session->userdata('ptk_id')){
			if($rombel){
				$this->db->order_by('nama', 'asc');
				return $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$rombel, 'semester_id'=>$semester_id])->result();
			}else{
				if($pencarian){
					$this->db->like('nama', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('nisn', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('nik', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('nipd', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('nama_rombel', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('kurikulum_id_str', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->order_by('nama', 'asc');
					return $this->db->get_where('getpesertadidik')->result();
				}else{
					$getrombonganbelajar_kelas = $this->getrombonganbelajar_kelas();
					if($getrombonganbelajar_kelas){
						$rombel_awal = $getrombonganbelajar_kelas[0]->rombongan_belajar_id;
						$this->db->order_by('nama', 'asc');
						$this->db->where(['rombongan_belajar_id'=>$rombel_awal, 'semester_id'=>$this->session->userdata('semester_id')]);
						return $this->db->get_where('getpesertadidik')->result();
					}else{
						$this->db->order_by('nama', 'asc');
						$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
						return $this->db->get_where('getpesertadidik')->result();
					}
				}
			}
		}else{
			if($this->session->userdata('peserta_didik_id')){
				return $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$semester_id])->result();
			}
		}
	}

	function pd_rombel_l($rombongan_belajar_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$rombongan_belajar_id, 'jenis_kelamin'=>'L', 'semester_id'=>$semester_id])->result();
	}

	function pd_rombel_p($rombongan_belajar_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$rombongan_belajar_id, 'jenis_kelamin'=>"P", 'semester_id'=>$semester_id])->result();
	}

	function anggota_rombel()
	{
		$tahun_ajaran_id = $this->session->userdata('tahun_ajaran_id');
		$semester_id = $this->session->userdata('semester_id');
		if($this->session->userdata('ptk_id')){
			$rombel = $this->getrombonganbelajar();
			if($rombel){
				$rombel_awal = $rombel[0]->rombongan_belajar_id;
			}else{
				$rombel_awal = null;
			}
			if($this->input->get('rombel')){
				return $this->db->get_where('anggota_rombel', ['rombongan_belajar_id'=>$this->input->get('rombel'), 'semester_id'=>$semester_id])->result();
			}else{
				return $this->db->get_where('anggota_rombel', ['rombongan_belajar_id'=>$rombel_awal,'semester_id'=>$semester_id])->result();
			}
		}else
		if($this->session->userdata('peserta_didik_id')){
			return $this->db->get_where('anggota_rombel', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$semester_id])->result();
		}
	}

	function jml_anggota_rombel()
	{
		$semester_id = $this->session->userdata('semester_id');
		$tahun_ajaran_id = $this->session->userdata('tahun_ajaran_id');
		return $this->db->query("SELECT count(peserta_didik_id) as jml from anggota_rombel where semester_id='$semester_id'")->row_array();
	}

	function jml_pd()
	{
		return $this->db->query("SELECT count(peserta_didik_id) as jml from getpesertadidik where semester_id='".$this->session->userdata('semester_id')."'")->row_array();
	}

	function jenis_rombel()
	{
		$semester_id = $this->session->userdata('semester_id');
		// if($this->session->userdata('ptk_id')){
		return $this->db->query("SELECT DISTINCT(jenis_rombel) as jenis_rombel, jenis_rombel_str from getrombonganbelajar where semester_id='$semester_id' order by jenis_rombel asc")->result();
		// }
	}

	function getrombonganbelajar()
	{
		$pencarian = $this->input->get('pencarian');
		$semester_id = $this->session->userdata('semester_id');
		$jenis_rombel = $this->input->get('jenis_rombel');
		$jenis_rombel_awal = $this->jenis_rombel()[0]->jenis_rombel;
		if($this->session->userdata('ptk_id')){
			if($this->session->userdata('jenis_ptk_id')==11){
				if($pencarian){
					$this->db->like('nama', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('tingkat_pendidikan_id', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('kurikulum_id', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->or_like('kurikulum_id_str', $pencarian, 'BOTH');
					$this->db->where(['semester_id'=>$this->session->userdata('semester_id')]);
					$this->db->order_by('nama', 'asc');
					return $this->db->get('getrombonganbelajar')->result();
				}else{
					if($jenis_rombel){
						$this->db->where(['jenis_rombel'=>$jenis_rombel, 'semester_id'=>$semester_id]);
					}else{
						$this->db->where(['jenis_rombel'=>$jenis_rombel_awal,'semester_id'=>$this->session->userdata('semester_id')]);
					}
					$this->db->order_by('nama', 'asc');
					return $this->db->get('getrombonganbelajar')->result();
				}
			}else{
				$pembelajaran = $this->db->get_where('pembelajaran', ['ptk_terdaftar_id'=>$this->session->userdata('ptk_terdaftar_id'), 'semester_id'=>$this->session->userdata('semester_id')])->result();
				if($pembelajaran){
					foreach ($pembelajaran as $key => $value) {
						if($jenis_rombel){
							$cekrombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'jenis_rombel'=>$jenis_rombel, 'semester_id'=>$semester_id])->row_array();
							if($cekrombel){
								$rombel[] = $cekrombel;
							}else{
								$rombel = [];
							}
						}else{
							$cekrombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$semester_id])->row_array();
							if($cekrombel){
								$rombel[] = $cekrombel;
							}else{
								$rombel = [];
							}
						}
					}
				}else{
					$rombel = [];
				}
				return json_decode(json_encode($rombel));
			}
		}else
		if($this->session->userdata('peserta_didik_id')){
			$anggota_rombel = $this->anggota_rombel();
			if($anggota_rombel){
				foreach ($anggota_rombel as $key => $value) {
					if($this->input->get('jenis_rombel')){
						$rombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$semester_id])->row_array();
					}else{
						$rombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$semester_id])->row_array();
					}
					if($rombel){
						$object[] = $rombel;
					}else{
						$object = [];
					}
				}
			}else{
				$object = [];
			}
			return json_decode(json_encode($object));
		}
	}

	function getrombonganbelajar_kelas()
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get_where('getrombonganbelajar', ['jenis_rombel'=>1, 'semester_id'=>$this->session->userdata('semester_id')])->result();
	}

	function getrombonganbelajar_id($rombongan_belajar_id)
	{
		return $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$rombongan_belajar_id, 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
	}

	function rombel_id($rombongan_belajar_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$rombongan_belajar_id, 'semester_id'=>$semester_id])->row_array();	
	}

	function rombel_kurikulum($kurikulum_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->get_where('getrombonganbelajar', ['kurikulum_id'=>$kurikulum_id, 'semester_id'=>$semester_id])->result();
	}

	function jml_rombel()
	{
		return $this->db->query("SELECT count(rombongan_belajar_id) as jml from getrombonganbelajar where semester_id='".$this->session->userdata('semester_id')."'")->row_array();
	}

	function kurikulum()
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->query("SELECT DISTINCT(kurikulum_id) as kurikulum_id, kurikulum_id_str, tingkat_pendidikan_id from getrombonganbelajar where semester_id='$semester_id'")->result();
	}

	function pembelajaran()
	{
		$pencarian = $this->input->get('pencarian');
		$semester_id = $this->session->userdata('semester_id');
		$rombel = $this->input->get('rombel');
		if($this->session->userdata('ptk_id')){
			if($this->session->userdata('jenis_ptk_id')==11){
				if($rombel){
					return $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$rombel, 'semester_id'=>$semester_id])->result();
				}else{
					if($pencarian){
						$this->db->like('mata_pelajaran_id', $pencarian, 'BOTH');
						$this->db->where(['semester_id'=>$semester_id]);
						$this->db->or_like('mata_pelajaran_id_str', $pencarian, 'BOTH');
						$this->db->where(['semester_id'=>$semester_id]);
						$this->db->or_like('status_di_kurikulum', $pencarian, 'BOTH');
						$this->db->where(['semester_id'=>$semester_id]);
						$this->db->or_like('status_di_kurikulum_str', $pencarian, 'BOTH');
						$this->db->where(['semester_id'=>$semester_id]);
						$this->db->order_by('rombongan_belajar_id', 'asc');
						return $this->db->get_where('pembelajaran', ['semester_id'=>$this->session->userdata('semester_id')])->result();
					}else
					if($this->input->get('jenis_rombel')){
						$rombel = $this->getrombonganbelajar();
						foreach ($rombel as $key => $value) {
							$cekpembelajaran = $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$semester_id])->row_array();
							if($cekpembelajaran){
								$pembelajaran[] = $cekpembelajaran;
							}else{
								$pembelajaran = [];
							}
						}

						return json_decode(json_encode($pembelajaran));
					}else{
						$rombel = $this->getrombonganbelajar();
						$rombel_awal = $rombel[0]->rombongan_belajar_id;
						return $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$rombel_awal, 'semester_id'=>$semester_id])->result();
					}
				}
			}else{
				return $this->db->get_where('pembelajaran', ['ptk_terdaftar_id'=>$this->session->userdata('ptk_terdaftar_id') ,'semester_id'=>$this->session->userdata('semester_id')])->result();
			}
		}else{
			if($this->session->userdata('peserta_didik_id')){
				$anggota_rombel = $this->db->get_where('anggota_rombel', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$semester_id])->result();
				if($anggota_rombel){
					foreach ($anggota_rombel as $key => $value) {
						$pembelajaran = $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id])->result();
						if($pembelajaran){
							foreach ($pembelajaran as $key1 => $value1) {
								$object[] = $value1;
							}
						}else{
							$object = [];
						}
					}
				}else{
					$object = [];
				}
				return json_decode(json_encode($object));
			}
		}
	}

	function jml_pembelajaran()
	{
		return $this->db->query("SELECT count(pembelajaran_id) as jml from pembelajaran where semester_id='".$this->session->userdata('semester_id')."'")->row_array();
	}

	function pembelajaran_rombel($rombongan_belajar_id)
	{
		$semester_id = $this->session->userdata('semester_id');
		return $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$rombongan_belajar_id, 'semester_id'=>$semester_id])->result();
	}

	function peran_pengguna()
	{
		return $this->db->query("SELECT DISTINCT(peran_id_str) from getpengguna")->result();
	}

	function getpengguna()
	{
		$pencarian = $this->input->get('pencarian');
		$object = [];
		if($this->session->userdata('ptk_id')){
			if($this->input->get('peran')){
				$this->db->where(['peran_id_str'=>$this->input->get('peran')]);
				return $this->db->get('getpengguna', 20)->result();
			}else{
				if($pencarian){
					$this->db->like('username', $pencarian, 'BOTH');
					$this->db->or_like('nama', $pencarian, 'BOTH');
					$this->db->or_like('peran_id_str', $pencarian, 'BOTH');
					$cekPengguna = $this->db->get('getpengguna')->result();
					if($cekPengguna){
						return $cekPengguna;
					}else{
						$getgtk = $this->getgtk();
						if($getgtk){
							foreach ($getgtk as $key => $value) {
								$cekpengguna = $this->db->get_where('getpengguna', ['ptk_id'=>$value->ptk_id])->result();
								if($cekpengguna){
									foreach ($cekpengguna as $key1 => $value1) {
										$object[] = $value1;
									}
								}
							}
						}else{
							$getpesertadidik = $this->getpesertadidik();
							if($getpesertadidik){
								foreach ($getpesertadidik as $key => $value) {
									$cekpengguna = $this->db->get_where('getpengguna', ['peserta_didik_id'=>$value->peserta_didik_id])->result();
									if($cekpengguna){
										foreach ($cekpengguna as $key1 => $value1) {
											$object[] = $value1;
										}
									}
								}
							}
						}
						return json_decode(json_encode($object));
					}
				}else{
					return $this->db->get_where('getpengguna', ['peserta_didik_id'=>null])->result();
				}
			}
		}else{
			if($this->session->userdata('peserta_didik_id')){
				return $this->db->get_where('getpengguna', ['username'=>$this->session->userdata('username'), 'peserta_didik_id'=>$this->session->userdata('peserta_didik_id')])->result();
			}
		}
	}

	function getpengguna_id($id)
	{
		return $this->db->get_where('getpengguna', ['pengguna_id'=>$id])->row_array();
	}

	function jml_pengguna()
	{
		return $this->db->query("SELECT count(pengguna_id) as jml from getpengguna")->row_array();
	}

}

/* End of file M_data_utama.php */
/* Location: ./application/models/M_data_utama.php */