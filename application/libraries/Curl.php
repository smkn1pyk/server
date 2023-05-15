<?php
/**
 * 
 */
class Curl 
{
	function update_dapodik($get=null)
	{
		if($get){
			$CI =& get_instance();
			$CI->load->model('m_data_utama', 'dapodik');
			$conn = $CI->dapodik->webservice();
			if($conn){
				$host = $conn['host'];
				$token = $conn['token'];
				$npsn = $conn['npsn'];
				$url = 'http://'.$host.':5774/WebService/'.$get.'?npsn='.$npsn;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_TIMEOUT , 0);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					'Authorization: Bearer '.$token
				));
				return $json = curl_exec($ch);
			}else{
				return "Pengaturan Koneksi 0";
			}
		}
	}

	function kirim_data($method=null, $data_kirim=null)
	{
		$CI =& get_instance();
		$CI->load->model('m_data_utama');
		$conn = $CI->m_data_utama->keys();
		if($conn){
			if($data_kirim){
				$curl = curl_init();
				curl_setopt_array($curl, array(
					CURLOPT_URL => $conn['host'].'/api/'.$method,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_CONNECTTIMEOUT => 0,
					CURLOPT_TIMEOUT => 600,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'POST',
					CURLOPT_POSTFIELDS => array($conn['key_name'] => $conn['key'],$method => $data_kirim),
					CURLOPT_HTTPHEADER => array(
						'Cookie: ci_session=a1ca108bf1b86b7fd6ff9a300b77d8c3b0e2b8eb'
					),
				));
				return $response = curl_exec($curl);
			}else{
				return "Terjadi kesalahan sistem";
			}
		}else{
			return "Pengaturan Koneksi Kosong!";
		}
	}
}