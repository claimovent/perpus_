<!doctype html>
<html>
    <head>
        <title>perpus/anggota</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Anggota List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('anggota/create'),'Create', 'class="btn btn-primary"'); ?>
				<?php echo anchor(site_url('peminjaman'),'peminjaman', 'class="btn btn-success"'); ?>
				<?php echo anchor(site_url('buku'),'buku', 'class="btn btn-success"'); ?>
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
                <form action="<?php echo site_url('anggota/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('anggota'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama Anggota</th>
		<th>Alamat Anggota</th>
		<th>Telpon</th>
		<th>Tgl Lahir</th>
		<th>Created At</th>
		<th>Created By</th>
		<th>Updated At</th>
		<th>Updated By</th>
		<th>Action</th>
            </tr><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $anggota->nama_anggota ?></td>
			<td><?php echo $anggota->alamat_anggota ?></td>
			<td><?php echo $anggota->telpon ?></td>
			<td><?php echo $anggota->tgl_lahir ?></td>
			<td><?php echo $anggota->created_at ?></td>
			<td><?php echo $anggota->created_by ?></td>
			<td><?php echo $anggota->updated_at ?></td>
			<td><?php echo $anggota->updated_by ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('anggota/read/'.$anggota->id_anggota),'Read'); 
				echo ' | '; 
				echo anchor(site_url('anggota/update/'.$anggota->id_anggota),'Update'); 
				echo ' | '; 
				echo anchor(site_url('anggota/delete/'.$anggota->id_anggota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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