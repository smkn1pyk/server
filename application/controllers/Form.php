<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama');
		if(!$this->session->userdata('peran_id_str')){
			exit("<div class='alert-danger p-3'>sesi anda telah habis, silahkan log-out dan log-in kembali</div>");
		}
	}

	public function get($folder=null, $file=null, $id=null, $id1=null, $id2=null)
	{
		if($folder&&$file){
			$data = [
				'folder' => $folder,
				'file' => $file,
				'id' => $id,
				'id1' => $id1,
				'id2' => $id2,
			];
			$this->load->view('forms/'.$folder.'/'.$file, $data, FALSE);
		}else{
			?> <div class="alert alert-danger">Terjadi kesalahan sistem </div> <?php
		}
	}

	function getdapodik($id=null)
	{
		if($id){
			$this->load->library('curl');
			$json = $this->curl->update_dapodik($id);
			if($json){
				$substr = substr($json, 0, 4);
				if($substr!='HTTP'){
					$data = ['id' => $id,'json' => $json];
					$this->load->view('forms/data_ref_dapodik/curl', $data, FALSE);
				}else{
					?> <div class="alert-danger p-3"><?= $json ?></div> <?php
				}
			}else{
				?> <div class="alert-danger p-3"> Tidak terhubung dengan server dapodik </div> <?php
			}
		}
	}

	function postdapodik($id=null)
	{
		if($id){
			$data = [
				'id' => $id,
			];
			$this->load->view('forms/data_ref_dapodik/kirim_data/kirim_data', $data, FALSE);
		}else{
			?> <div class="alert-danger alert">Terjadi Kesalahan Sistem</div> <?php
		}
	}

	function postdapodik_data($id=null)
	{
		if($id){
			$id = strtolower($id);
			$cekData = [];
			$cekData = $this->m_data_utama->$id();
			if($cekData){
				$data = [
					'id' => $id,
					'results' => $cekData,
				];
				$this->load->view('forms/data_ref_dapodik/kirim_data/'.$id, $data, FALSE);
			}else{
				?> <div class="alert-danger p-3"> 0 Results </div> <?php
			}
		}
	}

	function kirim_data($id=null)
	{
		if($this->input->post('kirim_data')){
			if($id){
				$this->load->library('curl');
				if($this->input->post('kirim_data')){
					?> <div style="max-height: 300px;overflow: auto;" > <?php
					$kirim_data = $this->input->post('kirim_data');
					$jml = count($kirim_data);
					$batas_kirim = 10;
					$batas_kirim1 = $batas_kirim - 1;
					$halaman = ceil($jml / $batas_kirim);
					$k = 0;

					?>
					<div class="text-center">
						<img  id="spinner" class="htmx-indicator" src="<?= base_url('assets/img/spinner.gif') ?>" width="150px"/>
					</div>
					<?php

					for ($i=1; $i <= $halaman; $i++) { 
						echo $k.'-'.$batas_kirim1;
						$json = $this->pecah_data($kirim_data, $id, $jml, $batas_kirim1, $halaman, $k);
						$k = $batas_kirim1 + 1;
						$r = $i+1;
						$batas_kirim1 = ($r * $batas_kirim)-1;
					}
					?> </div> <?php
				}
			}else{
				?> <div class="alert-danger p-3">Terjadi kesalahan sistem, tidak ada ID</div> <?php
			}
		}else{
			?> <div class="alert-danger p-3">Tidak ada data</div> <?php
		}
	}

	function pecah_data($kirim_data, $id=null, $jml=null, $batas_kirim1=null, $halaman=null, $k=null)
	{

		echo "<pre style='border:1px solid #ddd; margin:5px;'>";
		for ($j=$k; $j <= $batas_kirim1; $j++) { 
			if($j<=($jml-1)){
				$json = $this->curl->kirim_data($id, $kirim_data[$j]);
				echo "<pre>";
				print_r ($json);
				echo "</pre>";

			}
		}
		$k=$j;
		echo "</pre>";
	}

}

/* End of file Form.php */
/* Location: ./application/views/Form.php */