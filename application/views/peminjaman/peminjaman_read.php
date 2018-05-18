<!doctype html>
<html>
    <head>
        <title>peminjaman/read</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Peminjaman Read</h2>
        <table class="table">
	    <tr><td>Id Anggota</td><td><?php echo $id_anggota; ?></td></tr>
	    <tr><td>Id Buku</td><td><?php echo $id_buku; ?></td></tr>
	    <tr><td>Nama Anggota</td><td><?php echo $nama_anggota; ?></td></tr>
	    <tr><td>Alamat Anggota</td><td><?php echo $alamat_anggota; ?></td></tr>
	    <tr><td>Nama Buku</td><td><?php echo $nama_buku; ?></td></tr>
	    <tr><td>Tgl Pinjam</td><td><?php echo $tgl_pinjam; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Updated At</td><td><?php echo $updated_at; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peminjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>