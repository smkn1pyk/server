<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Akun_belajar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// if(!$this->session->unset_userdata('password')){
			// $this->session->sess_destroy();
			// exit('mohon maaf, anda tidak diizinkan mengakses halaman ini');
		// }
		$this->load->model('m_akun_belajar');
		$this->load->model('m_data_utama');
	}

	public function index()
	{
		$data = [
			'title' => "Akun Belajar",
			'dataget' => base_url('Akun_belajar/data_akun_belajar'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_akun_belajar()
	{
		if($_FILES){
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$spreadsheet = $reader->load($_FILES['file_upload']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			$jml = count($sheetData);
			for ($i=1; $i < $jml; $i++) { 
				$peserta_didik_id = $sheetData[$i][6];
				$nama = $sheetData[$i][8];
				$email = $sheetData[$i][7];
				$password = $sheetData[$i][14];
				if($email&&$password){
					$akun = [
						'peserta_didik_id' => $sheetData[$i][6],
						'nama' => $sheetData[$i][8],
						'email' => $sheetData[$i][7],
						'password' => $sheetData[$i][14],
						'request_status' => $sheetData[$i][12]
					];
					$cekData = $this->db->get_where('akun_belajar', ['peserta_didik_id'=>$peserta_didik_id, 'nama'=>$nama])->result();
					if($cekData){
						// foreach ($cekData as $key => $value) {
						// 	$this->db->where($value);
						// 	$this->db->delete('akun_belajar');
						// }
						// $this->db->insert('akun_belajar', $akun);
					}else{
						$this->db->insert('akun_belajar', $akun);
					}
					// echo "<pre>";
					// print_r ($akun);
					// echo "</pre>";
				}
			}
		}
		$data = [
			'id' => 'export',
			'rombel' => $this->m_data_utama->getrombonganbelajar_kelas(),
			'akun_belajar' => $this->m_akun_belajar->akun_belajar(),
		];
		$this->load->view('pages/akun_belajar', $data, FALSE);
	}

}

/* End of file Akun_belajar.php */
/* Location: ./application/controllers/Akun_belajar.php */