<!doctype html>
<html>
    <head>
        <title>anggota/form</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Anggota <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Anggota <?php echo form_error('nama_anggota') ?></label>
            <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Nama Anggota" value="<?php echo $nama_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Anggota <?php echo form_error('alamat_anggota') ?></label>
            <input type="text" class="form-control" name="alamat_anggota" id="alamat_anggota" placeholder="Alamat Anggota" value="<?php echo $alamat_anggota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telpon <?php echo form_error('telpon') ?></label>
            <input type="text" class="form-control" name="telpon" id="telpon" placeholder="Telpon" value="<?php echo $telpon; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Created At <?php echo form_error('created_at') ?></label>
            <input type="text" class="form-control" name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Created By <?php echo form_error('created_by') ?></label>
            <input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Updated At <?php echo form_error('updated_at') ?></label>
            <input type="text" class="form-control" name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Updated By <?php echo form_error('updated_by') ?></label>
            <input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" />
        </div>
	    <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>