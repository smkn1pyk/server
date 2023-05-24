<?php
if($id){
	$CI =& get_instance();
	$CI->load->model('m_data_utama');
	$rwy_pend_formal = $CI->m_data_utama->rwy_pend_formal_id($id);
	if($rwy_pend_formal){
		?>
		<div class="card">
			<div class="card-header"><h3>Riwayat Pendidikan Formal</h3></div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<?php foreach ($rwy_pend_formal as $key => $value): ?>
								<tr>
									<td><?= $value->jenjang_pendidikan_id_str ?></td>
									<td><?= $value->satuan_pendidikan_formal ?></td>
									<td><?= $value->tahun_masuk ?></td>
									<td><?= $value->tahun_lulus ?></td>
									<td><?= $value->nim ?></td>
									<td><?= $value->bidang_studi_id_str ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php
	}else{
		?> <div class="alert-danger p-3"> Terjadi kesalahan sistem, data tidak ditemukan </div> <?php
	}
}else{
	?> <div class="alert-danger p-3"> Terjadi kesalahan sistem </div> <?php
}