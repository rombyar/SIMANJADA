<?php if($error == TRUE){?>
<div class="alert alert-warning">
	<a class="close" data-dismiss="alert">&times;</a>
	<?php echo $error;?>
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
<?php if($this->session->flashdata('danger') == TRUE) { ?>
<div class="alert alert-danger">
	<a class="close" data-dismiss="alert">&times;</a> <strong>Info! </strong>
	<?php echo $this->session->flashdata('danger'); ?>
</div>
<?php } ?>