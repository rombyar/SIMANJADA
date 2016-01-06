<div class="row well">
<?php
	$old_password = array(
		'name'	=> 'old_password',
		'id'	=> 'old_password',
		'value' => set_value('old_password'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Password lama',
		'type' => 'text',
		'title' => 'Masukkan password lama',
		'required' => 'required',
	);
	$new_password = array(
		'name'	=> 'new_password',
		'id'	=> 'new_password',
		'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Password baru',
		'type' => 'text',
		'title' => 'Masukkan password baru',
		'required' => 'required',
	);
	$confirm_new_password = array(
		'name'	=> 'confirm_new_password',
		'id'	=> 'confirm_new_password',
		'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Konfirmasi password baru',
		'type' => 'text',
		'title' => 'Masukkan konfirmasi password baru',
		'required' => 'required',
	);
?>

	<?php if(isset($errors[$old_password['name']])?$errors[$old_password['name']]:''){?>
	<div class="alert alert-danger">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?>
	</div>
	<?php } ?>
	
	<?php if(validation_errors() == TRUE){?>
	<div class="alert alert-warning">
		<a class="close" data-dismiss="alert">&times;</a>
		<?php echo validation_errors(); ?>
	</div>
	<?php } ?>
	
	<?php if($this->session->flashdata('success') == TRUE) { ?>
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert">&times;</a> <strong>Info! </strong>
		<?php echo $this->session->flashdata('success'); ?>
	</div>
	<?php } ?>
	
	<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart($this->uri->uri_string(),$attributes); ?>
		<div class="form-group">
			<label class="col-md-2 control-label" ><?php echo form_label('Old Password', $old_password['id']); ?></label>
			<div class="col-sm-10">
				<?php echo form_password($old_password); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" ><?php echo form_label('New Password', $new_password['id']); ?></label>
			<div class="col-sm-10">
				<?php echo form_password($new_password); ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" ><?php echo form_label('Confirm', $confirm_new_password['id']); ?></label>
			<div class="col-sm-10">
				<?php echo form_password($confirm_new_password); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-md-offset-2">
				<button type="submit" class="btn btn-primary"><li class="fa fa-edit"></li> Ganti</button>
			</div>
		</div>
	<?php echo form_close(); ?>
</div><!-- Row -->