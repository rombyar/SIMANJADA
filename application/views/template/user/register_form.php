<?php
$nama_dkm = array(
	'name'	=> 'nama_dkm',
	'id'	=> 'nama_dkm',
	'value'	=> set_value('nama_dkm'),
	'class'	=> 'form-control',
	'placeholder'	=> 'Nama DKM',
	'type' => 'text',
	'title' => 'Masukkan nama DKM',
	//'required' => 'required',
);
$nomor_telepon_dkm = array(
	'name'	=> 'nomor_telepon_dkm',
	'id'	=> 'nomor_telepon_dkm',
	'value'	=> set_value('nomor_telepon_dkm'),
	'class'	=> 'form-control',
	'placeholder'	=> 'Nomor telepon DKM',
	'type' => 'number',
	'title' => 'Masukkan nomor telepon DKM',
	'min' => 1,
);
$alamat_dkm = array(
	'name'  => 'alamat_dkm',
	'id'    => 'alamat_dkm',
	'value' => set_value('alamat_dkm'),
	'rows'  => '5',
	'cols'  => '10',
	'class'	=> 'form-control',
	'placeholder'	=> 'Alamat DKM',
	'title' => 'Masukkan alamat DKM',
);

if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'class' => 'form-control',
		'placeholder' => 'Username',
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'class' => 'form-control',
	'placeholder' => 'Email address',
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class' => 'form-control',
	'placeholder' => 'Password',
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'class' => 'form-control',
	'placeholder' => 'Confirm Password',
);
?>

<div class="row well">
	<div class="col-md-12" style="margin:10px;">
		<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart($this->uri->uri_string(),$attributes); ?>
			<?php if(validation_errors() == TRUE){?>
			<div class="alert alert-warning">
				<a class="close" data-dismiss="alert">&times;</a>
				<?php echo validation_errors(); ?>
			</div>
			<?php } ?>					
			<div class="form-group">
				<label class="col-md-1 control-label" >Nama</label>
				<div class="col-sm-11">
					<?php echo form_input($nama_dkm); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label" >No.Telepon</label>
				<div class="col-sm-11">
					<?php echo form_input($nomor_telepon_dkm); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label" >Alamat</label>
				<div class="col-sm-11">
					<?php echo form_textarea($alamat_dkm); ?>
				</div>
			</div>
			<?php if ($use_username) { ?>
			<div class="form-group">
				<label class="col-md-1 control-label" ><?php echo form_label('Username', $username['id']); ?></label>
				<div class="col-sm-11">
					<?php echo form_input($username); ?>
				</div>
			</div>
			<?php } ?>	
			<div class="form-group">
				<label class="col-md-1 control-label" ><?php echo form_label('Email', $email['id']); ?></label>
				<div class="col-sm-11">
					<?php echo form_input($email); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label" ><?php echo form_label('Password', $password['id']); ?></label>
				<div class="col-sm-11">
				<?php echo form_password($password); ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label" ><?php echo form_label('Confirm', $confirm_password['id']); ?></label>
				<div class="col-sm-11">
				<?php echo form_password($confirm_password); ?>
				</div>
			</div>
			
			<?php if ($captcha_registration) { ?>
				<?php if ($use_recaptcha) { ?>
					<style> .captcha, #recaptcha_image, #recaptcha_image img { width:100% !important; } </style>
					<div class="form-group">
						<div class="captcha col-md-12">
							<div id="recaptcha_image"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<div class="recaptcha_only_if_image">Enter the words above</div>
							<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
							<div class="input-group">
									  <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control input-lg" />
									  <a class="btn btn-default input-group-addon" href="javascript:Recaptcha.reload()"><span class="fa fa-refresh"></span></a>
									  <a class="btn btn-default input-group-addon recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')"><span class="fa fa-volume-up"></span></a>
									  <a class="btn btn-default input-group-addon recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')"><span class="fa fa-picture-o"></span></a>
									  <a class="btn btn-default input-group-addon" href="javascript:Recaptcha.showhelp()"><span class="fa fa-info"></span></a>
								  </div>
							<?php echo $recaptcha_html; ?>
							
							<span style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></span>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-12">
							<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('recaptcha_public_key', 'tank_auth');?>"></div>
							<script src='https://www.google.com/recaptcha/api.js?hl=<?php echo $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);?>'></script>
						</div>
					</div>
				<?php } else { ?>
					<div class="form-group">
						<div class="col-md-12">
							<p style="font-size:13px;">Masukkan kode persis seperti pada Gambar:</p>
							<?php echo $captcha_html; ?>
						</div>
						<div class="col-md-12">
							<?php echo form_input($captcha); ?>
						</div>
					</div> 
				<?php } ?>
			<?php } ?> 
				
			<div class="text-center">
				<button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>