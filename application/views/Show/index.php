  
<div class=".container-fluid">

  <input type="date" id="tgl" class="ml-3"> <button class="btn btn-success" id="tampil">Tampilkan</button>
  <!-- tanggal  -->
  <table class="table table-hover table-responsive-xl">
    <thead>
      <tr>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tbody">
    </tbody>
  </table>
</div>
<script type="text/javascript">
  
  var page =$('#namapage').html();
  if (page == 'Show paket') {
    page = 'paket'
  }else{
    page = 'gabungan'
  }
$("#tampil").click(function() {
var  tgl = $("#tgl").val();
      $.ajax({
        url: '<?php echo base_url("Crud/show") ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {tgl: tgl,
                db : page},
      })
      .done(function(a) {
       $("#tbody").html('');

        for (let key in a) {
          let jumla= a[key]['file'].split('\n');
              jumla= jumla.length;
          let elemt = '<tr>';
                elemt += '<td>'+a[key]['tgl']+'</td>'
                elemt += '<td>'+a[key]['namafile']+'</td>'
                elemt += '<td>'+jumla+'</td>'
                elemt += '<td><a href="#"><i class="fa fa-eye"></i></a>'
                elemt += '<a href="#" class="ml-2 edit" id="1"><i class="fa fa-book"></i></a></td>'
              elemt += '</tr>'
          $("#tbody").append(elemt);
        }



      })
      .fail(function(a) {
        console.log("error");
        console.log(a)
      });
});
$(".edit").click(function(e) {
    alert(e.target.id);

});

</script>
