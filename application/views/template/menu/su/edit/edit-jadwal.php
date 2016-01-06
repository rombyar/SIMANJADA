<?php
	if($ddkm_id)foreach($ddkm_id as $dkm){{
		$id_dkm = array(
			'name'	=> 'id_dkm',
			'id'	=> 'id_dkm',
			'value'	=> $dkm->id_dkm,
			'type' => 'hidden',
		);
	}}
?>

<?php if($level == 2){?>
<?php if($dmasjidid){ foreach($dmasjidid as $dm_id){?>
	<?php if($djadwalid){ foreach($djadwalid as $dj){?>
		<?php if($dm_id->id_masjid == $dj->id_masjid){?>
<?php 
	$nama_jadwal = array(
		'name'	=> 'nama_jadwal',
		'id'	=> 'nama_jadwal',
		'value'	=> $dj->nama_jadwal,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama jadwal',
		'type' => 'text',
		'title' => 'Masukkan nama jadwal',
		//'required' => 'required',
	);
	$deskripsi_jadwal = array(
		'name'  => 'deskripsi_jadwal',
		'id'    => 'deskripsi_jadwal',
		'value' => $dj->deskripsi_jadwal,
		'rows'  => '5',
		'cols'  => '10',
		'class'	=> 'form-control',
		'placeholder'	=> 'Deskripsi jadwal',
		'title' => 'Masukkan deskripsi jadwal',
    );
	$tempat = array(
		'name'	=> 'tempat',
		'id'	=> 'tempat',
		'value'	=> $dj->tempat,
		'class'	=> 'form-control',
		'placeholder'	=> 'Tempat',
		'type' => 'text',
		'title' => 'Masukkan tempat',
		//'required' => 'required',
	);
	$tanggal = array(
		'name'	=> 'tanggal',
		'id'	=> 'tanggal',
		'value'	=> $dj->tanggal,
		'class'	=> 'form-control',
		'placeholder'	=> 'Tanggal',
		'type' => 'date',
		'title' => 'Masukkan tanggal',
		//'required' => 'required',
	);
	$waktu = array(
		'name'	=> 'waktu',
		'id'	=> 'waktu',
		'value'	=> $dj->waktu,
		'class'	=> 'form-control',
		'placeholder'	=> 'Waktu',
		'type' => 'time',
		'title' => 'Masukkan waktu',
		//'required' => 'required',
	);
	$id_jadwal = array(
		'name'	=> 'id_jadwal',
		'id'	=> 'id_jadwal',
		'value'	=> $dj->id_jadwal,
		'type' => 'hidden',
	);
?>

<!-- Modal -->
<div class="modal fade" id="<?php echo $url.$dj->id_jadwal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Ubah <?php echo ucfirst($dj->nama_jadwal); ?></h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('su/ejadwal',$attributes); ?>
				<div class="modal-body">
				
					<div class="form-group">
						<label class="col-md-2 control-label" >Nama</label>
						<div class="col-sm-10">
							<?php echo form_input($nama_jadwal); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Deskripsi</label>
						<div class="col-sm-10">
							<?php echo form_textarea($deskripsi_jadwal); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Tempat</label>
						<div class="col-sm-10">
							<?php echo form_input($tempat); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Tanggal</label>
						<div class="col-sm-10">
							<?php echo form_input($tanggal); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Waktu</label>
						<div class="col-sm-10">
							<?php echo form_input($waktu); ?>
							<?php echo form_input($id_jadwal); ?>
							<?php echo form_input($id_dkm); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Batal
					</button>
					<button type="submit" class="btn btn-success">
						<span class="fa fa-edit"></span> Ubah
					</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
		<?php } ?>
	<?php } } ?>
<?php } } ?>

<?php } else { ?>

<?php if($djadwal){ foreach($djadwal as $dj){?>
<?php 
	$nama_jadwal = array(
		'name'	=> 'nama_jadwal',
		'id'	=> 'nama_jadwal',
		'value'	=> $dj->nama_jadwal,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama jadwal',
		'type' => 'text',
		'title' => 'Masukkan nama jadwal',
		//'required' => 'required',
	);
	$deskripsi_jadwal = array(
		'name'  => 'deskripsi_jadwal',
		'id'    => 'deskripsi_jadwal',
		'value' => $dj->deskripsi_jadwal,
		'rows'  => '5',
		'cols'  => '10',
		'class'	=> 'form-control',
		'placeholder'	=> 'Deskripsi jadwal',
		'title' => 'Masukkan deskripsi jadwal',
    );
	$tempat = array(
		'name'	=> 'tempat',
		'id'	=> 'tempat',
		'value'	=> $dj->tempat,
		'class'	=> 'form-control',
		'placeholder'	=> 'Tempat',
		'type' => 'text',
		'title' => 'Masukkan tempat',
		//'required' => 'required',
	);
	$tanggal = array(
		'name'	=> 'tanggal',
		'id'	=> 'tanggal',
		'value'	=> $dj->tanggal,
		'class'	=> 'form-control',
		'placeholder'	=> 'Tanggal',
		'type' => 'date',
		'title' => 'Masukkan tanggal',
		//'required' => 'required',
	);
	$waktu = array(
		'name'	=> 'waktu',
		'id'	=> 'waktu',
		'value'	=> $dj->waktu,
		'class'	=> 'form-control',
		'placeholder'	=> 'Waktu',
		'type' => 'time',
		'title' => 'Masukkan waktu',
		//'required' => 'required',
	);
	$id_jadwal = array(
		'name'	=> 'id_jadwal',
		'id'	=> 'id_jadwal',
		'value'	=> $dj->id_jadwal,
		'type' => 'hidden',
	);
	$id_dkm = array(
		'name'	=> 'id_dkm',
		'id'	=> 'id_dkm',
		'value'	=> $dj->id_dkm,
		'type' => 'hidden',
	);
?>

<!-- Modal -->
<div class="modal fade" id="<?php echo $url.$dj->id_jadwal;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Ubah <?php echo ucfirst($dj->nama_jadwal); ?></h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('su/ejadwal',$attributes); ?>
				<div class="modal-body">					
					<div class="form-group">
						<label class="col-md-2 control-label" >Nama</label>
						<div class="col-sm-10">
							<?php echo form_input($nama_jadwal); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Deskripsi</label>
						<div class="col-sm-10">
							<?php echo form_textarea($deskripsi_jadwal); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Tempat</label>
						<div class="col-sm-10">
							<?php echo form_input($tempat); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Tanggal</label>
						<div class="col-sm-10">
							<?php echo form_input($tanggal); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Waktu</label>
						<div class="col-sm-10">
							<?php echo form_input($waktu); ?>
							<?php echo form_input($id_jadwal); ?>
							<?php echo form_input($id_dkm); ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Batal
					</button>
					<button type="submit" class="btn btn-success">
						<span class="fa fa-edit"></span> Ubah
					</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php } } ?>
<?php } ?>