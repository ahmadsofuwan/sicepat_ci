<!-- Modal get code-->
<div class="modal fade" id="GetCode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Get Code</h5>
        <button type="button" class="close closeCode" data-dismiss="modal" aria-label="Close" id="closeCode">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control text-center" placeholder="Masukan Code" id="inputkey">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeCode" data-dismiss="modal" id="closeCode">Close</button>
        <button type="button" class="btn btn-success" id="getkey">Get Code</button>
      </div>
    </div>
  </div>
</div>

<!-- modal simpan -->
<div class="modal fade" id="modalsimpan" tabindex="-1" role="dialog" aria-labelledby="modalSimpan" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSimpan">Simpan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="close()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="text" class="form-control text-center" placeholder="Nama" required id="namafile" Autocomplete="off">
        <input type="date" class="form-control text-center" placeholder="Masukan tanggal" required id="tglfile">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnclose"onclick="close()" >Close</button>
        <button type="submit" class="btn btn-primary" id="simpan" onclick="close()">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- modal Inputlist -->
<div class="modal fade" id="modalinputlist" tabindex="-1" role="dialog" aria-labelledby="modalSimpan" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSimpan">Simpan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
		  <label for="comment">masukan Resi/Gabungan:</label>
		  <textarea class="form-control" rows="5" id="listinput"></textarea>
		</div>
		<div class="windows8" id="modalload">
	      <div class="wBall" id="wBall_1">
	        <div class="wInnerBall"></div>
	      </div>
	      <div class="wBall" id="wBall_2">
	        <div class="wInnerBall"></div>
	      </div>
	      <div class="wBall" id="wBall_3">
	        <div class="wInnerBall"></div>
	      </div>
	      <div class="wBall" id="wBall_4">
	        <div class="wInnerBall"></div>
	      </div>
	      <div class="wBall" id="wBall_5">
	        <div class="wInnerBall"></div>
	      </div>
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
        <button type="submit" class="btn btn-primary" >Input</button>
      </div>
    </div>
  </div>
</div>







<?php 
	if($title == "Input Gabungan"){
		$lang = 10;
	}
	if ($title =="Input Paket") {
		$lang = 12;
	};
 ?>



<div class="container-fluid">
	<div class="row">
		<div class="col-4"><a href="#" id="inputlist"> <h3><span class="fa fa-plus-circle"></span> Input List</h3></a></div>
	</div>
	<div class="row">
		<div class="col-1">
			<button class="btn btn-primary btn-block" data-target="#modalsimpan" data-toggle="modal"> simpan</button>
		</div>
		<div class="col-7">
			<input type="text" class="form-control text-center" placeholder="<?=$title ?>"id="input" maxlength="<?= $lang ?>" Autocomplete="off">
		</div>
		<div class="col-2 card border-left-primary shadow h-50">
			<div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Key Code !</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="keycode"><?=$KeyCode ?></div>
                    </div>
                  </div>
                </div>
		</div>
		<div class="col-2">
			<button class="btn btn-success" data-toggle="modal" data-target="#GetCode">Get code</button><br>
			<h1><span id="jumla_coli">0</span></h1>
		</div>
	</div>
	<table class="table">
		<tbody id="tbody" class="text-center">
			
		</tbody>
	</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
var  code = $("#keycode").html();
function jumlah() {
	jumla_coli = base_data.split('\n');
	jumla_coli= jumla_coli.length;
	$("#jumla_coli").html(jumla_coli);
}
/*function inputlis*/
	$("#inputlist").click(function() {
		$('#modalinputlist').modal('show');
		
	});
	// close
	$("#modalinputlist > div > div > div.modal-header > button").click(function() {
		$("#listinput").val('');
	});
	$("#modalinputlist > div > div > div.modal-footer > button.btn.btn-secondary").click(function() {
		$("#listinput").val('');
	});
	// end close

	//input list 

$("#modalinputlist > div > div > div.modal-footer > button.btn.btn-primary").click(function() {

	inputlist();
});

	async function inputlist() {
		$("#modalload").show();
		let data = $("#listinput").val();
		let arrdata = data.split('\n');
		$.each(arrdata,function(no,val) {
			if (val.length < 10) {return;}
			if (base_data.indexOf(val) != -1) {
				return;
			}else{
				if (base_data.length >= 1) {
						base_data += '\n' + val 
						$.ajax({
							url: '<?php echo base_url("Crud/tambah") ?>',
							type: 'POST',
							data: {data: val, code:code},
						    dataType: 'json',
						})
						.done(function() {
							console.log("success");
						})	
						.fail(function() {
							console.log("error");
						});
					}else{
						base_data += val
						$.ajax({
							url: '<?php echo base_url("Crud/tambah") ?>',
							type: 'POST',
							data: {data: val, code:code},
						    dataType: 'json',
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});

					};
				

				
			}
			$("#tbody").append('<tr><td>'+val+'</td></tr>');
			 
		});
		$("#modalload").hide();
		jumlah();
		$("#modalinputlist").modal('hide');
		$("#listinput").val("");
	}

	//end inputlist 

// end inputlist
var base_data ="";
var jumla_coli=0;
function close() {
	
	$("#simpan > div > div > div.modal-body > input:nth-child(1)").val("");
	$("#simpan > div > div > div.modal-body > input:nth-child(2)").val("");
}

$("#simpan").click(function() {
	
	$("#simpan > div > div > div.modal-body > input:nth-child(1)").val("");
	$("#simpan > div > div > div.modal-body > input:nth-child(2)").val("");
});
$(".closeCode").click(function() {
	$("#inputkey").val("");
	$("#tglfile").val('');
});

$("#modalsimpan > div > div > div.modal-header > button").click(function() {
	$("#namafile").val('');
});
$("#btnclose").click(function() {
	$("#namafile").val('');
	$("#tglfile").val('');
});

$(document).ready(function() {
	var  code = $("#keycode").html();
	var  page = $("#namapage").html();
	if (page == "Input Gabungan" ) {
		page = 'gabungan';
	}
	if (page == "Input Paket" ) {
		page = 'paket'
	}

	$("#input").on('keypress', logKey);
	function logKey(e){
		if(e.code=="Enter"){
			var data = $("#input").val();
			if (base_data.indexOf(data) != -1) {
				$("#input").val("");
				return;
			}
			if (base_data.length >= 1) {
						base_data += '\n' +data
					}else{
						base_data += data

					};
			
				$.ajax({
					url: '<?php echo base_url("Crud/tambah") ?>',
					type: 'POST',
					data: {data: data , code:code},
				    dataType: 'json',
				})
				.done(function(respont){
					// console.log("done !");
				})
				.fail(function(respont) {
					console.log("Fail : " + respont.responseText);
					
				})
				.always(function() {
					
				});

			$("#tbody").append("<tr><td class='text-center'>"+data+"</td></tr>")
			$("#input").val("");
			jumlah();
			
		};
	};
	$("#simpan").click(function() {
		let namafile = $("#namafile").val();
		let tgl = $("#tglfile").val();
		let db = page;
		$.ajax({
			url: '<?php echo base_url("Crud/ceknama") ?>',
			type: 'POST',
			dataType: 'JSON',
			data: {namafile: namafile,
					db : db,
					tgl: tgl},
		})
		.done(function(a) {
			if (a == "") {
				$.ajax({
				url: '<?php echo base_url("Crud/simpan") ?>',
				type: 'POST',
				dataType: 'JSON',
				data: {code: code,
					tgl:tgl,
					namafile : namafile,
					db :db,
					tgl: tgl},
				})
				.done(function(a) {
					console.log("success");
					if ( Swal.fire({
					  position: 'mid',
					  icon: 'success',
					  title: 'Berhasil di simpan',
					  showConfirmButton: false,
					  timer: 1500
					})) { 
						setTimeout(function(){ location.reload()}, 1000);
						
					}	
					
					
					
				})
				.fail(function(a) {
					console.log("error");
					console.log(a.responseText);
				});

			}else{
				Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'NAMA : '+namafile+' Ini Telah Digunakan',
					  footer: '<h3>silahkan gunakan nama lain</h3>'
				})
			}

		})
		.fail(function(e) {
			console.log("error");
			console.log(e.responseText);
		});
		
	});
});
$("#getkey").click(function() {
	let code = $("#inputkey").val();
	$.ajax({
		url: '<?php echo base_url("Crud/getcode")?>',
		type: 'post',
		dataType: 'json',
		data: {code: code},
	})
	.done(function(e) {
		console.log("success");
		
		for (let key in e) {
			if (base_data.indexOf(e[key]['file']) != -1) {
				continue;
			}
			jumla_coli = base_data.split('\n');
			jumla_coli= jumla_coli.length;
			if (base_data < 1) {
				base_data +=e[key]['file'];
			}else{
				base_data +='\n'+e[key]['file'];
			}
			let tbody ='';
			tbody += "<tr>"
				tbody += "<td class='text-center'>"
					tbody += e[key]['file'];			
				tbody += "</td>"
			tbody += "</tr>"

			$("#tbody").append(tbody)
			
			// console.log(e[key]['file']);

		}
		jumlah();
		$("#keycode").html(code);
		$('#GetCode').modal('hide');
		

	})
	.fail(function(e) {
		console.log("fail");
	})
	.always(function() {
		// console.log("complete");
	});
	
});
</script>

