
<div class="row">
	<div class="col-md">
		<?php if($cekRombel){ ?>
			<form hx-post="<?= base_url('exam/rombel_tes/tambah_rombel_tes/'.$id.'/'.$uniq.'/'.$uniq1.'/'.$uniq2.'/'.$uniq3) ?>" hx-target="#dataModal">
				<div class="d-block">
					<button class="btn btn-primary btn-block"><i class="fas fa-arrow-right"></i> Simpan</button>
				</div>
				<table class="table table-sm">
					<thead>
						<tr>
							<th>Pilih</th>
							<th>Nama Rombel</th>
							<th>Jenis Rombel</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cekRombel as $key => $value): ?>
							<tr>
								<td><input type="checkbox" name="rombel[]" value="<?= $value->rombongan_belajar_id ?>" class="form-check-inline"></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->jenis_rombel_str ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</form>
		<?php }else{ ?>
			<div class="alert-info p-5">0 Results</div>
		<?php } ?>

	</div>
	<div class="col-md" id="rombel_tersimpan">
		<?php if($cekRombelTes){ ?>
			<form hx-post="<?= base_url('exam/rombel_tes/hapus_rombel_tes/'.$id.'/'.$uniq.'/'.$uniq1.'/'.$uniq2.'/'.$uniq3) ?>" hx-target="#dataModal">
				<div class="d-block">
					<button class="btn btn-danger btn-block"><i class="fas fa-arrow-left"></i> Hapus</button>
				</div>
				<table class="table table-sm">
					<thead>
						<tr>
							<th>Pilih</th>
							<th>Nama Rombel</th>
							<th>Jenis Rombel</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cekRombelTes as $key => $value): ?>
							<tr>
								<td><input type="checkbox" name="rombel[]" value="<?= $value->rombongan_belajar_id ?>" class="form-check-inline"></td>
								<td><?= $value->nama ?></td>
								<td><?= $value->jenis_rombel_str ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</form>
		<?php }else{ ?>
			<div class="alert-info p-5">0 Results</div>
		<?php } ?>
	</div>
</div>