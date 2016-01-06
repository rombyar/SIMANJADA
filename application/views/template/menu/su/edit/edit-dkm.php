<?php if($ddkm){foreach($ddkm as $dda){?>
<?php 
	$nama_dkm = array(
		'name'	=> 'nama_dkm',
		'id'	=> 'nama_dkm',
		'value'	=> $dda->nama_dkm,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama DKM',
		'type' => 'text',
		'title' => 'Masukkan nama DKM',
		'required' => 'required',
	);
	$nomor_telepon_dkm = array(
		'name'	=> 'nomor_telepon_dkm',
		'id'	=> 'nomor_telepon_dkm',
		'value'	=> $dda->nomor_telepon_dkm,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nomor telepon DKM',
		'type' => 'number',
		'title' => 'Masukkan nomor telepon DKM',
		'min' => 1,
	);
	$alamat_dkm = array(
		'name'  => 'alamat_dkm',
		'id'    => 'alamat_dkm',
		'value' => $dda->alamat_dkm,
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Alamat DKM',
		'title' => 'Masukkan alamat DKM',
		'required' => 'required',
    );
	$id_dkm = array(
		'name'	=> 'id_dkm',
		'id'	=> 'id_dkm',
		'value'	=> $dda->id_dkm,
		'type'	=> 'hidden',
	);
	
?>

<!-- Modal -->
<div class="modal fade" id="<?php echo $url.$dda->id_dkm;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Ubah DKM</h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open('su/edkm',$attributes); ?>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-2 control-label" >Nama</label>
						<div class="col-sm-10">
							<?php echo form_input($nama_dkm); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >No.Telepon</label>
						<div class="col-sm-10">
							<?php echo form_input($nomor_telepon_dkm); ?>
							<?php echo form_input($id_dkm); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" >Alamat</label>
						<div class="col-sm-10">
							<?php echo form_textarea($alamat_dkm); ?>
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