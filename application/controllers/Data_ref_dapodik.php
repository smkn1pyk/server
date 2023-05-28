<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Data_ref_dapodik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		$this->load->library('alert');
	}

	public function sekolah()
	{
		$data = [
			'title' => "Sekolah",
			'dataget' => 'data_sekolah',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_sekolah($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='update_kop_sekolah'){
				$this->form_validation->set_rules('header_1', 'Header 1', 'trim|required');
				$this->form_validation->set_rules('header_2', 'Header 2', 'trim|required');
				// $this->form_validation->set_rules('header_3', 'Header 3', 'trim|required');
				if(empty($_FILES['logo_1']['name'])){
					$this->form_validation->set_rules('logo_1', 'Logo 1', 'required');
				}
				if(empty($_FILES['logo_2']['name'])){
					$this->form_validation->set_rules('logo_2', 'Logo 2', 'required');
				}
				if(empty($_FILES['ttd']['name'])){
					$this->form_validation->set_rules('ttd', 'Tanda Tangan Kepala Sekolah', 'required');
				}
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
				} else {
					$cekKopSekolah = $this->m_data_utama->kop_sekolah();
					$object = [
						'header_1' => $this->input->post('header_1'),
						'header_2' => $this->input->post('header_2'),
						'header_3' => $this->input->post('header_3'),
						'logo_1' => file_get_contents($_FILES['logo_1']['tmp_name']),
						'logo_2' => file_get_contents($_FILES['logo_2']['tmp_name']),
						'ttd' => file_get_contents($_FILES['ttd']['tmp_name']),
						'semester_id' => $this->session->userdata('semester_id'),
					];
					if($cekKopSekolah){
						$where = ['id'=>$cekKopSekolah[0]->id, 'uniq'=>$cekKopSekolah[0]->uniq];
						$this->db->where($where);
						$this->db->update('kop_sekolah', $object);
						echo $this->alert->pesan('edit');
					}else{
						$uniq = ['uniq'=>uniqid()];
						$merge = array_merge($uniq, $object);
						$this->db->insert('kop_sekolah', $merge);
						echo $this->alert->pesan('tambah');
					}
				}
			}
		}
		$data = [
			'kop_sekolah' => $this->m_data_utama->kop_sekolah(),
			'sekolah' => $this->m_data_utama->getsekolah(),
		];
		$this->load->view('pages/data_ref_dapodik/sekolah', $data, FALSE);
	}

	function gtk()
	{
		$data = [
			'title' => "Data GTK",
			'dataget' => 'data_gtk',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_gtk($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='import_gtk'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				if($_FILES){
					$spreadsheet = $reader->load($_FILES['file_upload']['tmp_name']);
					$sheetData = $spreadsheet->getActiveSheet()->toArray();
					echo $sheetData[0][0];
					if ($sheetData[0][0]=='Daftar Guru'||$sheetData[0][0]=='Daftar Tenaga Kependidikan'){
						$sekolah = $this->m_data_utama->getsekolah()[0]->nama;
						if($sheetData[1][0]==$sekolah){
							$jml = count($sheetData);

							$berhasil = [];
							$gagal = [];
							for ($i=5; $i < $jml; $i++) { 
								$nama = $sheetData[$i][1];
								$nik = $sheetData[$i][44];

								$gtk = [
									'nama' => $sheetData[$i][1],
									'nuptk' => $sheetData[$i][2],
									'alamat' => $sheetData[$i][10],
									'rt' => $sheetData[$i][11],
									'rw' => $sheetData[$i][12],
									'dusun' => $sheetData[$i][13],
									'kelurahan' => $sheetData[$i][14],
									'kecamatan' => $sheetData[$i][15],
									'kode_pos' => $sheetData[$i][16],
									'telepon' => $sheetData[$i][17],
									'hp' => $sheetData[$i][18],
									'email' => $sheetData[$i][19],
									'tugas_tambahan' => $sheetData[$i][20],
									'sk_cpns' => $sheetData[$i][21],
									'tanggal_cpns' => $sheetData[$i][22],
									'sk_pengangkatan' => $sheetData[$i][23],
									'tmt_pengangkatan' => $sheetData[$i][24],
									'lembaga_pengangkatan' => $sheetData[$i][25],
									'sumber_gaji' => $sheetData[$i][27],
									'nama_ibu_kandung' => $sheetData[$i][28],
									'status_perkawinan' => $sheetData[$i][29],
									'nama_suami_istri' => $sheetData[$i][30],
									'nip_suami_istri' => $sheetData[$i][31],
									'pekerjaan_suami_istri' => $sheetData[$i][32],
									'tmt_pns_suami_istri' => $sheetData[$i][33],
									'sudah_lisensi_kepala_sekolah' => $sheetData[$i][34],
									'pernah_diklat_kepengawasan' => $sheetData[$i][35],
									'keahlian_braile' => $sheetData[$i][36],
									'keahlian_bahasa_isyarat' => $sheetData[$i][37],
									'npwp' => $sheetData[$i][38],
									'nama_wajib_pajak' => $sheetData[$i][39],
									// 'nik' => $sheetData[$i][44],
									'no_kk' => $sheetData[$i][45],
									'karpeg' => $sheetData[$i][46],
									'karsi_karsu' => $sheetData[$i][47],
									'lintang' => $sheetData[$i][48],
									'bujur' => $sheetData[$i][49],
									'nuks' => $sheetData[$i][50],
								];
								$this->db->where(['nik'=>$nik, 'nama'=>$nama, 'tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id')]);
								$this->db->update('getgtk', $gtk);
								if($this->db->affected_rows()>>0){
									$berhasil[] = 1;
								}else{
									$gagal[] = 1;
								}
							}
							?> <div class="alert alert-info p-3"> <?= array_sum($berhasil) ?> data berhasil diperbaharui<br> <?= array_sum($gagal) ?> data gagal diperbaharui. </div> <?php
						}else{
							?> <div class="alert alert-danger"> Bukan <?= $sekolah ?> </div> <?php
						}
					}else{
						?> <div class="alert alert-danger"> Bukan File Peserta Didik Dapodik </div> <?php
					}
				}
			}
		}
		$data = [
			'jenis_ptk' => $this->m_data_utama->jenis_ptk(),
			'jml_gtk' => $this->m_data_utama->jml_gtk(),
			'gtk' => $this->m_data_utama->getgtk(),
		];
		$this->load->view('pages/data_ref_dapodik/gtk', $data, FALSE);
	}

	function detail_gtk($id=null)
	{
		$data = [
			'title' => 'Detail GTK',
			'dataget' => base_url('data_ref_dapodik/data_detail_gtk/'.$id),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_detail_gtk($id=null)
	{
		$data = [
			'id' => $id,
			'detail_gtk' => $this->m_data_utama->getgtk_id($id),
			'rwy_pend_formal' => $this->m_data_utama->rwy_pend_formal_id($id),
			'rwy_kepangkatan' => $this->m_data_utama->rwy_kepangkatan_id($id),
		];
		$this->load->view('pages/data_ref_dapodik/detail_gtk', $data, FALSE);
	}

	function pd()
	{
		$data = [
			'title' => "Data pd",
			'dataget' => 'data_pd',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pd($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='import_peserta_didik'){
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				if($_FILES){
					$spreadsheet = $reader->load($_FILES['file_upload']['tmp_name']);
					$sheetData = $spreadsheet->getActiveSheet()->toArray();
					if ($sheetData[0][0]=='Daftar Peserta Didik'){
						$sekolah = $this->m_data_utama->getsekolah()[0]->nama;
						if($sheetData[1][0]==$sekolah){
							$jml = count($sheetData);

							$berhasil = [];
							$gagal = [];
							for ($i=6; $i < $jml; $i++) { 
								$nama = $sheetData[$i][1];
								$nisn = $sheetData[$i][4];

								$pd = [
									'nama' => $sheetData[$i][1],
									'nipd' => $sheetData[$i][2],
									'nisn' => $sheetData[$i][4],
									'alamat' => $sheetData[$i][9],
									'rt' => $sheetData[$i][10],
									'rw' => $sheetData[$i][11],
									'dusun' => $sheetData[$i][12],
									'kelurahan' => $sheetData[$i][13],
									'kecamatan' => $sheetData[$i][14],
									'kode_pos' => $sheetData[$i][15],
									'jenis_tinggal' => $sheetData[$i][16],
									'alat_transportasi' => $sheetData[$i][17],
									'telepon' => $sheetData[$i][18],
									'hp' => $sheetData[$i][19],
									'email' => $sheetData[$i][20],
									'SKHUN' => $sheetData[$i][21],
									'penerima_kps' => $sheetData[$i][22],
									'no_kps' => $sheetData[$i][23],
									'tahun_lahir_ayah' => $sheetData[$i][25],
									'jenjang_pendidikan_ayah' => $sheetData[$i][26],
							// 'pekerjaan_ayah' => $sheetData[$i][27],
									'penghasilan_ayah' => $sheetData[$i][28],
									'nik_ayah' => $sheetData[$i][29],
									'tahun_lahir_ibu' => $sheetData[$i][31],
									'jenjang_pendidikan_ibu' => $sheetData[$i][32],
							// 'pekerjaan_ibu' => $sheetData[$i][33],
									'penghasilan_ibu' => $sheetData[$i][34],
									'nik_ibu' => $sheetData[$i][35],
									'tahun_lahir_wali' => $sheetData[$i][37],
									'jenjang_pendidikan_wali' => $sheetData[$i][38],
							// 'pekerjaan_wali' => $sheetData[$i][39],
									'penghasilan_wali' => $sheetData[$i][40],
									'nik_wali' => $sheetData[$i][41],
									'no_peserta_ujian_nasional' => $sheetData[$i][43],
									'no_seri_ijazah' => $sheetData[$i][44],
									'penerima_kip' => $sheetData[$i][45],
									'nomor_kip' => $sheetData[$i][46],
									'nama_di_kip' => $sheetData[$i][47],
									'nomor_kks' => $sheetData[$i][48],
									'no_registrasi_akta_lahir' => $sheetData[$i][49],
									'bank' => $sheetData[$i][50],
									'nomor_rekening_bank' => $sheetData[$i][51],
									'rekening_atas_nama' => $sheetData[$i][52],
									'layak_pip_usulan_dari_sekolah' => $sheetData[$i][53],
									'alasan_layak_pip' => $sheetData[$i][54],
									'kebutuhan_khusus' => $sheetData[$i][55],
									'sekolah_asal' => $sheetData[$i][56],
									'lintang' => $sheetData[$i][58],
									'bujur' => $sheetData[$i][59],
									'no_kk' => $sheetData[$i][60],
									'lingkar_kepala' => $sheetData[$i][63],
									'jml_saudara' => $sheetData[$i][64],
									'no_peserta_ujian_nasional' => $sheetData[$i][43],
								];
								$this->db->where(['nisn'=>$nisn, 'nama'=>$nama, 'semester_id'=>$this->session->userdata('semester_id')]);
								$this->db->update('getpesertadidik', $pd);
								if($this->db->affected_rows()>>0){
									$berhasil[] = 1;
								}else{
									$gagal[] = 1;
								}
							}
							?> <div class="alert alert-info p-3"> <?= array_sum($berhasil) ?> data berhasil diperbaharui<br> <?= array_sum($gagal) ?> data gagal diperbaharui. </div> <?php
						}else{
							?> <div class="alert alert-danger"> Bukan <?= $sekolah ?> </div> <?php
						}
					}else{
						?> <div class="alert alert-danger"> Bukan File Peserta Didik Dapodik </div> <?php
					}
				}
			}
		}
		$data = [
			'rombel' => $this->m_data_utama->getrombonganbelajar_kelas(),
			'pd' => $this->m_data_utama->getpesertadidik(),
		];
		$this->load->view('pages/data_ref_dapodik/pd', $data, FALSE);
	}

	function detail_pd($id=null)
	{
		$data = [
			'title' => 'Detail PD',
			'dataget' => base_url('data_ref_dapodik/data_detail_pd/'.$id),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_detail_pd($id=null)
	{
		$detail_pd = $this->m_data_utama->getpesertadidik_id($id);
		$this->load->model('m_keuangan');
		$data = [
			'id' => $id,
			'detail_pd' => $detail_pd,
			'data_iuran' => $this->m_keuangan->mapping_rombel($detail_pd['rombongan_belajar_id']),
		];
		$this->load->view('pages/data_ref_dapodik/detail_pd', $data, FALSE);
	}

	function rombel()
	{
		$data = [
			'title' => "Data Rombongan Belajar",
			'dataget' => 'data_rombel',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_rombel()
	{
		$data = [
			'jenis_rombel' => $this->m_data_utama->jenis_rombel(),
			'rombel' => $this->m_data_utama->getrombonganbelajar(),
		];
		$this->load->view('pages/data_ref_dapodik/rombel', $data, FALSE);
	}

	function anggota_rombel()
	{
		$data = [
			'title' => 'Anggota Rombel',
			'dataget' => 'data_anggota_rombel',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_anggota_rombel()
	{
		$data = [
			'rombel' => $this->m_data_utama->getrombonganbelajar(),
			'anggota_rombel' => $this->m_data_utama->anggota_rombel(),
		];
		$this->load->view('pages/data_ref_dapodik/anggota_rombel', $data, FALSE);
	}

	function pembelajaran()
	{
		$data = [
			'title' => "Data Pembelajaran",
			'dataget' => 'data_pembelajaran',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pembelajaran($aksi=null)
	{
		if($aksi){
			if($this->input->post('hapus_pembelajaran')){
				$hapus = $this->input->post('hapus_pembelajaran');
				foreach ($hapus as $key => $value) {
					$decrypt = json_decode($this->encryption->decrypt($value), true);
					$this->db->where($decrypt);
					$this->db->delete('pembelajaran');
				}
			}
		}
		$data = [
			'jenis_rombel' => $this->m_data_utama->jenis_rombel(),
			'rombel' => $this->m_data_utama->getrombonganbelajar(),
			'pembelajaran' => $this->m_data_utama->pembelajaran(),
		];
		$this->load->view('pages/data_ref_dapodik/pembelajaran', $data, FALSE);
	}

	function pengguna()
	{
		$data = [
			'title' => "Data Pengguna",
			'dataget' => 'data_pengguna',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pengguna($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='edit'){
				$cekPengguna = $this->m_data_utama->getpengguna_id($id);
				if($cekPengguna){
					if($this->input->post('password')){
						$this->db->where($cekPengguna);
						$this->db->update('getpengguna', ['password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT)]);
						echo $this->alert->pesan('edit');
					}
					$status = strval($this->input->post('status'));
					if($status==0||$status==1){
						if($this->input->post('status')!=$cekPengguna['status']){
							$this->db->where($cekPengguna);
							$this->db->update('getpengguna', ['status'=>$this->input->post('status')]);
							echo $this->alert->pesan('edit');
						}
					}
				}else{
					?> <div class="alert alert-danger"> Terjadi kesalahan sitem, data pengguna tidak ditemukan </div> <?php
				}
			}else
			if($aksi=='hapus'){
				if($id){
					$cekPengguna = $this->m_data_utama->getpengguna_id($id);
					if($cekPengguna){
						$this->db->where($cekPengguna);
						$this->db->delete('getpengguna');
					}else{
						?> <div class="alert alert-danger"> Terjadi kesalahan sistem, data pengguna tidak ditemukan</div> <?php
					}
				}else{
					?> <div class="alert alert-danger"> Terjadi kesalahan sistem </div> <?php
				}
			}
		}
		$peran = $this->m_data_utama->peran_pengguna();
		$data = [
			'peran' => $peran,
			'pengguna' => $this->m_data_utama->getpengguna(),
		];
		$this->load->view('pages/data_ref_dapodik/pengguna', $data, FALSE);
	}

	function laporan_individu()
	{
		$data = [
			'title' => "Laporan Individu Sekolah",
			'dataget' => base_url('data_ref_dapodik/data_li'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_li()
	{
		$data = [
			'kurikulum' => $this->m_data_utama->kurikulum(),
		];
		$this->load->view('pages/data_ref_dapodik/data_li', $data, FALSE);
	}

}

/* End of file Data_ref_dapodik.php */
/* Location: ./application/controllers/Data_ref_dapodik.php */