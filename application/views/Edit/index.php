<?php foreach ($datanya as $dat) {?>
<div class="row">
    <div class="col-2 ml-5">
      <?php echo $dat->namafile; ?>
    </div>
    <div class="col-8">
      <div class="form-group">
        <label for="">DATA:</label>
        <textarea class="form-control" rows="20%" id="file">
          <?php echo $dat->file; ?>
        </textarea>
      </div>
    </div>
</div>

<?php } ?>