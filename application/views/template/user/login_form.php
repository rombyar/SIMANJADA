<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'placeholder'	=> "E-mail address",
	'class' => 'form-control',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'placeholder'	=> "Password",
	'class' => 'form-control',
);
?>
<div class="row well">	
	<?php if(validation_errors() == TRUE or 
			 (isset($errors[$login['name']])?$errors[$login['name']]:'') or 
			 (isset($errors[$password['name']])?$errors[$password['name']]:'')
			){?>
			
		<div class="alert alert-warning">
			<a class="close" data-dismiss="alert">&times;</a>
			<?php echo validation_errors(); ?>
			<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
			<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		</div>
	<?php } ?>
	
	<?php echo form_open($this->uri->uri_string()); ?>
        <div class="form-group">
            <label for="email">Email</label>
           <?php echo form_input($login); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <?php echo form_password($password); ?>
			<?=form_hidden('redirect_url', $this->agent->referrer());?>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
        </div>
	<?php echo form_close(); ?>
</div>