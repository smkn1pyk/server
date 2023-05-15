<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->form_validation->set_rules('inputEmail', 'Username', 'trim|required');
		$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
		} else {
			$pilih = $this->db->get_where('getpengguna', array('username'=>$this->input->post('inputEmail')))->result_array();
			if($pilih){
				$pass = $this->input->post('inputPassword');
				foreach ($pilih as $key => $value) {
					if(password_verify($pass, $value['password'])){
						$tahun_ajaran_id = substr($this->input->post('semester_id'), 0,4);
						$semester_id = array('semester_id'=>$this->input->post('semester_id'),'tahun_ajaran_id'=>$tahun_ajaran_id);
						$merge = array_merge($value,$semester_id);
						$rst[] = $merge;
					}else{
						$rst = array();
						echo "Kombinasi Username dan Password tidak cocok";
					}
				}
				if(count($rst)>0){
					$array = array(
						'akun' => $rst
					);
					$this->session->set_userdata( $array );
					echo '<script>window.location.href = "app";</script>';
				}
			}else{
				echo "Username: ".$this->input->post('username')." tidak ditemukan";
			}
		}
	}

	function pilih_akun()
	{
		if($this->input->post('data_pilih_akun')){
			$pilih = json_decode($this->encryption->decrypt($this->input->post('data_pilih_akun')), true);
			if(is_array($pilih)){
				if($pilih['ptk_id']){
					$cekPtk = $this->db->get_where('getgtk', ['ptk_id'=>$pilih['ptk_id'], 'tahun_ajaran_id'=>$pilih['tahun_ajaran_id']])->row_array();
					if($cekPtk){
						$merge = array_merge($pilih, $cekPtk);
						$this->session->set_userdata( $merge );
						echo '<script>window.location.href = "app";</script>';
					}else{
						if($pilih['ptk_id']=='1'){							
							$this->session->set_userdata( $this->session->userdata('akun')[0] );
							echo '<script>window.location.href = "";</script>';
						}else{
							?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
						}
					}
				}else{
					?> <div class="alert-danger p-3"> Mohon maaf, saat ini aplikasi sedang dalam masa pengembangan, anda belum bisa mengakses halaman ini</div> <?php
				// $this->session->set_userdata( $pilih );
				// echo '<script>window.location.href = "app";</script>';
				}
			}else{
				echo "Gagal mengambil data";
			}
		}else{
			echo "Pilih jenis akun!";
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('.','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */