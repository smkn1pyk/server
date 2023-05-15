<?php
$CI =& get_instance();
$CI->load->model('m_data_utama');
$rwy_kepangkatan = $CI->m_data_utama->rwy_kepangkatan_id($id);
if($rwy_kepangkatan){
	?>
	<div class="card">
		<div class="card-header"></div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-sm table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Golongan</th>
							<th>Nomor SK</th>
							<th>Tanggal SK</th>
							<th>TMT SK</th>
							<th>Masa Kerja Tahun</th>
							<th>Masa Kerja Bulan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rwy_kepangkatan as $key => $value): $key++ ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->pangkat_golongan_id_str ?></td>
								<td><?= $value->nomor_sk ?></td>
								<td><?= $value->tanggal_sk ?></td>
								<td><?= $value->tmt_pangkat ?></td>
								<td><?= $value->masa_kerja_gol_tahun ?></td>
								<td><?= $value->masa_kerja_gol_bulan ?></td>
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