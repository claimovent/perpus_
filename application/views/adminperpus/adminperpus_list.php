<!doctype html>
<html>
    <head>
        <title>perpus/adminperpus</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Adminperpus List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('adminperpus/create'),'Create', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('anggota'),'anggota', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('buku'),'buku', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('peminjaman'),'peminjaman', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('adminperpus/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('adminperpus'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table>
			<style>
			table{
				border-collapse : collapse ;
			}
			table, th, td{
				border : 5px solid black;
				padding : 5px;
				margin-bottom : 15px
			}
			</style>
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Created At</th>
		<th>Created By</th>
		<th>Updated At</th>
		<th>Updated By</th>
		<th>Action</th>
            </tr><?php
            foreach ($adminperpus_data as $adminperpus)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $adminperpus->username ?></td>
			<td><?php echo $adminperpus->password ?></td>
			<td><?php echo $adminperpus->created_at ?></td>
			<td><?php echo $adminperpus->created_by ?></td>
			<td><?php echo $adminperpus->updated_at ?></td>
			<td><?php echo $adminperpus->updated_by ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('adminperpus/read/'.$adminperpus->id_admin),'Read'); 
				echo ' | '; 
				echo anchor(site_url('adminperpus/update/'.$adminperpus->id_admin),'Update'); 
				echo ' | '; 
				echo anchor(site_url('adminperpus/delete/'.$adminperpus->id_admin),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>