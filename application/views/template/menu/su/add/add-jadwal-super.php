<?php if($dmasjid){ $no = 1; foreach($dmasjid as $dm){ ?>
<?php 
	$nama_jadwal = array(
		'name'	=> 'nama_jadwal',
		'id'	=> 'nama_jadwal',
		'value'	=> set_value('nama_jadwal'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama jadwal',
		'type' => 'text',
		'title' => 'Masukkan nama jadwal',
		//'required' => 'required',
	);
	$deskripsi_jadwal = array(
		'name'  => 'deskripsi_jadwal',
		'id'    => 'deskripsi_jadwal',
		'value' => set_value('deskripsi_jadwal'),
		'rows'  => '5',
		'cols'  => '10',
		'class'	=> 'form-control',
		'placeholder'	=> 'Deskripsi jadwal',
		'title' => 'Masukkan deskripsi jadwal',
    );
	$tempat = array(
		'name'	=> 'tempat',
		'id'	=> 'tempat',
		'value'	=> set_value('tempat'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Tempat',
		'type' => 'text',
		'title' => 'Masukkan tempat',
		//'required' => 'required',
	);
	$tanggal = array(
		'name'	=> 'tanggal',
		'id'	=> 'tanggal',
		'value'	=> set_value('tanggal'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Tanggal',
		'type' => 'date',
		'title' => 'Masukkan tanggal',
		//'required' => 'required',
	);
	$waktu = array(
		'name'	=> 'waktu',
		'id'	=> 'waktu',
		'value'	=> set_value('waktu'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Waktu',
		'type' => 'time',
		'title' => 'Masukkan waktu',
		//'required' => 'required',
	);
?>

<!-- Modal -->
<div class="modal fade" id="<?php echo 'add_jadwal'.$dm->id_masjid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Tambah jadwal <?php echo ucfirst($dm->nama_masjid); ?></h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('su/jadwal',$attributes); ?>
				<div class="modal-body">
				
					<?php if($level == 1){?>
						<input type="hidden" value="<?php echo $dm->id_dkm;?>" name="id_dkm">
						<input type="hidden" value="<?php echo $dm->id_masjid;?>" name="id_masjid">
					<?php } ?>
					
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
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
					<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php } } ?>