<!doctype html>
<html>
    <head>
        <title>anggota/read</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Anggota Read</h2>
        <table class="table">
	    <tr><td>Nama Anggota</td><td><?php echo $nama_anggota; ?></td></tr>
	    <tr><td>Alamat Anggota</td><td><?php echo $alamat_anggota; ?></td></tr>
	    <tr><td>Telpon</td><td><?php echo $telpon; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Created At</td><td><?php echo $created_at; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>