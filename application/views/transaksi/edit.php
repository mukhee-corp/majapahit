<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Transaksi Edit</h3>
            </div>
			<?php echo form_open('transaksi/edit/'.$transaksi['id_transaksi']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="id_costumer" class="control-label"><span class="text-danger">*</span>Costumer</label>
						<div class="form-group">
							<select name="id_costumer" class="form-control">
								<option value="">select costumer</option>
								<?php 
								foreach($all_costumer as $costumer)
								{
									$selected = ($costumer['id_costumer'] == $transaksi['id_costumer']) ? ' selected="selected"' : "";

									echo '<option value="'.$costumer['id_costumer'].'" '.$selected.'>'.$costumer['id_costumer'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_costumer');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tanggal_transaksi" class="control-label"><span class="text-danger">*</span>Tanggal Transaksi</label>
						<div class="form-group">
							<input type="text" name="tanggal_transaksi" value="<?php echo ($this->input->post('tanggal_transaksi') ? $this->input->post('tanggal_transaksi') : $transaksi['tanggal_transaksi']); ?>" class="form-control" id="tanggal_transaksi" />
							<span class="text-danger"><?php echo form_error('tanggal_transaksi');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="keterangan" class="control-label"><span class="text-danger">*</span>Keterangan</label>
						<div class="form-group">
							<input type="text" name="keterangan" value="<?php echo ($this->input->post('keterangan') ? $this->input->post('keterangan') : $transaksi['keterangan']); ?>" class="form-control" id="keterangan" />
							<span class="text-danger"><?php echo form_error('keterangan');?></span>
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