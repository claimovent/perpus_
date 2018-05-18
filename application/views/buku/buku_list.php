<!doctype html>
<html>
    <head>
        <title>perpus/buku</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Buku List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('buku/create'),'Create', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('peminjaman'),'peminjaman', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('anggota'),'anggota', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('adminperpus'),'adminperpus', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('buku/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('buku'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Buku</th>
		<th>Created At</th>
		<th>Created By</th>
		<th>Updated At</th>
		<th>Updated By</th>
		<th>Action</th>
            </tr><?php
            foreach ($buku_data as $buku)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $buku->nama_buku ?></td>
			<td><?php echo $buku->created_at ?></td>
			<td><?php echo $buku->created_by ?></td>
			<td><?php echo $buku->updated_at ?></td>
			<td><?php echo $buku->updated_by ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('buku/read/'.$buku->id_buku),'Read'); 
				echo ' | '; 
				echo anchor(site_url('buku/update/'.$buku->id_buku),'Update'); 
				echo ' | '; 
				echo anchor(site_url('buku/delete/'.$buku->id_buku),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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