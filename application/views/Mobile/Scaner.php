
<!-- <div class="contaner-fluid ml-3">
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
</script> -->

<video id="preview"></video>
    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Do you want to open this page?: ' + content);
            window.open(content, "_blank");
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("Please enable Camera!");
            }
        });
    </script>