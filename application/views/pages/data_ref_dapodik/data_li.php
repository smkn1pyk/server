<div class="card">
	<div class="card-body">
		<?php
		if($kurikulum){
			$CI =& get_instance();
			$CI->load->model('m_data_utama');
			?>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<?php foreach ($kurikulum as $key => $value): ?>
							<tr>
								<th colspan="6">Tingkat: <?= $value->tingkat_pendidikan_id ?> (<?= $value->kurikulum_id ?> - <?= $value->kurikulum_id_str ?>)</th>
							</tr>
							<tr>
								<th>Jenis Rombel</th>
								<th>Nama</th>
								<th>Pembelajaran</th>
								<th>PD</th>
							</tr>
							<?php
							$rombel_kurikulum = $CI->m_data_utama->rombel_kurikulum($value->kurikulum_id);
							?>

							<?php foreach ($rombel_kurikulum as $key1 => $value1): ?>
								<?php
								$anggota_rombel = $CI->m_data_utama->anggota_rombel($value1->rombongan_belajar_id);
								$pembelajaran_rombel = $CI->m_data_utama->pembelajaran_rombel($value1->rombongan_belajar_id);
								$jml_pembelajaran[$key][] = count($pembelajaran_rombel);
								$jml_anggota_rombel[$key][] = count($anggota_rombel);
								?>
								<tr>
									<td><?= $value1->jenis_rombel_str ?></td>
									<td><?= $value1->nama ?></td>
									<td><?= count($pembelajaran_rombel) ?></td>
									<td><?= count($anggota_rombel) ?></td>
								</tr>
								
							<?php endforeach ?>
							<tr>
								<td colspan="2">Total</td>
								<td><?= array_sum($jml_pembelajaran[$key]) ?></td>
								<td><?= array_sum($jml_anggota_rombel[$key]) ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}
		?>
	</div>
</div>