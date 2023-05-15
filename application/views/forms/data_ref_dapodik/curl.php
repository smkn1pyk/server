
<?php
if($id){
	$arr = json_decode($json, true);
	if($arr['rows']){
		// echo "<pre>";
		// print_r ($arr['rows']);
		// echo "</pre>";
		// exit();
		$id = strtolower($id);
		if($id=='getsekolah'){
			$array = ['semester_id'=>$this->session->userdata('semester_id')];
			$merge = array_merge($arr['rows'], $array);
			$object[$id][] = $merge;
		}else{
			$ids = [
				'getsekolah' => 'sekolah_id',
				'getpesertadidik' => 'peserta_didik_id',
				'getgtk' => 'ptk_id',
				'rwy_pend_formal' => 'ptk_id',
				'rwy_kepangkatan' => 'ptk_id',
				'getrombonganbelajar' => 'rombongan_belajar_id',
				'anggota_rombel' => 'peserta_didik_id',
				'pembelajaran' => 'pembelajaran_id',
				'getpengguna' => 'pengguna_id',
			];
			foreach ($arr['rows'] as $key => $value) {
				foreach ($value as $key1 => $value1) {
					if(!is_array($value1)){
						$object[$id][$key][$key1] = $value1;
					}else{
						foreach ($value1 as $key2 => $value2) {
							if($key1=='rwy_kepangkatan'||$key1=='rwy_pend_formal'){
								$array = array($ids[$id] => $value[$ids[$id]]);
							}else{
								$array = array($ids[$id] => $value[$ids[$id]],'semester_id'=> $value['semester_id']);
							}
							$merge = array_merge($array, $value2);
							foreach ($merge as $key3 => $value3) {
								$object[$key1][$key][$key2][$key3] = $value3;
							}
						}
					}
				}
			}
		}
		// echo "<pre>";
		// print_r ($object);
		// echo "</pre>";
		// exit();
		foreach ($object as $key => $value) {
			$key = strtolower($key);
			if($key=='rwy_kepangkatan'||$key=='rwy_pend_formal'||$key=='anggota_rombel'||$key=='pembelajaran'){
				foreach ($value as $key1 => $value1) {
					$jml[] = count($value1);
					$simpan[$key][] = $value1;
				}
			}else{
				$simpan[$key][] = $value;
			}
		}
		echo "<pre class='alert-info'>";
		print_r (array_keys($simpan));
		echo "</pre>";
		// exit();
		if($simpan){
			$encrypt = $this->encryption->encrypt(json_encode($simpan));
			$kirim = base64_encode(json_encode($simpan));
			?>
			<form hx-post="webservice/sync_data/get_api_dapodik/<?= $id ?>" hx-target="#data">
				<input type="hidden" name="data_simpan" value="<?= $encrypt ?>">
				<div class="d-block">
					<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				</div>
			</form>
			<div id="result"></div>
			<?php
		}else{
			?> <div class="alert-danger"> Gagal mengambil data</div> <?php
		}
	}else{
		?> <div class="alert-danger"> <?= $arr['message'] ?> </div> <?php
	}
}else{
	?> <div class="alert-danger"> Terjadi kesalahan sistem </div> <?php
}