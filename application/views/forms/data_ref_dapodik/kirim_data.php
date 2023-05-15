<?php
$server = $this->db->get('keys')->row_array();
if($server){
	$id = $server['id'];
	$host = $server['host'];
	$key_name = $server['key_name'];
	$key = $server['key'];
}else{
	$id = null;
	$host = null;
	$key_name = null;
	$key = null;
}
?>
<div id="result"></div>
<form hx-post="webservice/sync_data/pengaturan_kirim_data/<?= $id ?>" hx-target="#data">
	<div class="form-floating mb-3">
		<input type="text" name="host" class="form-control" placeholder="Host" value="<?= $host ?>" required>
		<label>Host</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="key_name" class="form-control" placeholder="Key Name" value="<?= $key_name ?>" required>
		<label>Key Name</label>
	</div>
	<div class="form-floating mb-3">
		<input type="text" name="key" class="form-control" placeholder="Key" value="<?= $key ?>" required>
		<label>Key</label>
	</div>
	<div class="d-block">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>