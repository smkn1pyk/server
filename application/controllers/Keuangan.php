<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		if(!$this->session->userdata('username')){
			redirect('.','refresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => "Keuangan",
			'dataget' => 'iuran',
		];
		$this->load->view('template', $data, FALSE);
	}

	function iuran()
	{

	}

}

/* End of file Keuangan.php */
/* Location: ./application/controllers/Keuangan.php */