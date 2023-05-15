<?php
/**
 * 
 */
class Alert
{
	function pesan($aksi=null)
	{
		$CI =& get_instance();
		if($aksi){
			if($aksi=='validasi'){
				$pesan = "<div class='alert alert-danger'>".validation_errors()."</div>";
			}else
			if($aksi=='tambah'){
				if($CI->db->affected_rows()>>0){
					$pesan = "<div class='alert alert-success'>Berhasil menyimpan data</div>";
				}else{
					$pesan = "<div class='alert alert-danger'>Gagal menyimpan data</div>";
				}
			}else
			if($aksi=='edit'){
				if($CI->db->affected_rows()>>0){
					$pesan = "<div class='alert alert-success'>Berhasil memperbaharui data</div>";
				}else{
					$pesan = "<div class='alert alert-danger'>Gagal memperbaharui data</div>";
				}
			}else
			if($aksi=='hapus'){
				if($CI->db->affected_rows()>>0){
					$pesan = "<div class='alert alert-success'>Berhasil menghapus data</div>";
				}else{
					$pesan = "<div class='alert alert-danger'>Gagal menghapus data</div>";
				}
			}else{
				$pesan = "<div class='alert alert-danger'>Aksi tidak diketahui</div>";
			}
			return $pesan;
		}
	}
}