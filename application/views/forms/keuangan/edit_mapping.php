<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_keuangan');
	$mapping = $CI->m_keuangan->mapping_id($id);
	if($mapping){
		?>
		<div class="alert-info p-3"> Mohon maaf, fitur ini masih dalam masa pengembangan </div>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi keslahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}
?>