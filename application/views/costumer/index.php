<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Costumer Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('costumer/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Costumer</th>
						<th>Password</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Username</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($costumer as $c){ ?>
                    <tr>
						<td><?php echo $c['id_costumer']; ?></td>
						<td><?php echo $c['password']; ?></td>
						<td><?php echo $c['nama']; ?></td>
						<td><?php echo $c['email']; ?></td>
						<td><?php echo $c['username']; ?></td>
						<td>
                            <a href="<?php echo site_url('costumer/edit/'.$c['id_costumer']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('costumer/remove/'.$c['id_costumer']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
