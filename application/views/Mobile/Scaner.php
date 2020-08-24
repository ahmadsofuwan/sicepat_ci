<script type="<?php echo base_url(); ?>assets/js/instascan.js"></script>
<script type="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<div class="contaner-fluid ml-3">
	<div class="row">
		<div class="col-1">
			<button class="btn btn-primary">Simpan</button>
		</div>
		<div class="col-8">
			<input type="text" class="form-control text-center" placeholder="masukan resi"id="input" maxlength="12" Autocomplete="off">
		</div>
		<div class="col-3">
			
		</div>
	</div>
</div>
<video autoplay="true" id="scaner">
        Browsermu tidak mendukung bro, upgrade donk!
    		</video>
<script type="text/javascript">
	let scanner = new Instascan.Scanner({ video: document.getElementById('scaner') });
</script>