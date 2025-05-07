<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Apakah anda yakin menghapus data ini ?</h4>
		<br>
		<h4 class="modal-title" style="text-align:center;">Keseluruhan data yg memiliki relasi terhadap tahun ajaran ini akan ikut terhapus !!</h4>
      </div>     
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="?module=<?php echo $_GET['module'];?>&aksi=hapus&id=<?php echo $_GET['id'];?>" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>