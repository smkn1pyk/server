<?php
$CI =& get_instance();
$CI->load->model('m_data_utama');
$rwy_pend_formal_id = $CI->m_data_utama->rwy_pend_formal_id($id);
if($rwy_pend_formal_id){
	?>
	<div class="card">
		<div class="card-header"></div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-sm table-striped table-bordered">
					<tbody>
						<?php foreach ($rwy_pend_formal_id as $key => $value): $key++ ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->jenjang_pendidikan_id_str ?></td>
								<td><?= $value->satuan_pendidikan_formal ?></td>
								<td><?= $value->fakultas ?></td>
								<td><?= $value->tahun_masuk ?></td>
								<td><?= $value->tahun_lulus ?></td>
								<td><?= $value->bidang_studi_id_str ?></td>
								<td><?= $value->ipk ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
}else{
	?> <div class="alert-danger p-3"> 0 Results </div> <?php
}