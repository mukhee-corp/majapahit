<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Hadiah Add</h3>
            </div>
            <?php echo form_open('hadiah/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_transaksi" class="control-label"><span class="text-danger">*</span>Transaksi</label>
						<div class="form-group">
							<select name="id_transaksi" class="form-control">
								<option value="">select transaksi</option>
								<?php 
								foreach($all_transaksi as $transaksi)
								{
									$selected = ($transaksi['id_transaksi'] == $this->input->post('id_transaksi')) ? ' selected="selected"' : "";

									echo '<option value="'.$transaksi['id_transaksi'].'" '.$selected.'>'.$transaksi['id_transaksi'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_transaksi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nama_barang" class="control-label"><span class="text-danger">*</span>Nama Barang</label>
						<div class="form-group">
							<input type="text" name="nama_barang" value="<?php echo $this->input->post('nama_barang'); ?>" class="form-control" id="nama_barang" />
							<span class="text-danger"><?php echo form_error('nama_barang');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="poin" class="control-label"><span class="text-danger">*</span>Poin</label>
						<div class="form-group">
							<input type="text" name="poin" value="<?php echo $this->input->post('poin'); ?>" class="form-control" id="poin" />
							<span class="text-danger"><?php echo form_error('poin');?></span>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>