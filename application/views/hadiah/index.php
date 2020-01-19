<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hadiah Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('hadiah/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Hadiah</th>
						<th>Id Transaksi</th>
						<th>Nama Barang</th>
						<th>Poin</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($hadiah as $h){ ?>
                    <tr>
						<td><?php echo $h['id_hadiah']; ?></td>
						<td><?php echo $h['id_transaksi']; ?></td>
						<td><?php echo $h['nama_barang']; ?></td>
						<td><?php echo $h['poin']; ?></td>
						<td>
                            <a href="<?php echo site_url('hadiah/edit/'.$h['id_hadiah']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('hadiah/remove/'.$h['id_hadiah']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
