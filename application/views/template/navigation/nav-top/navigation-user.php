<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="fa fa-user fa-fw fa-lg"></i> <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-user">
		<?php if($username){ ?>
			<li class=" " ><a href="<?php echo base_url('su/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
			<li class="divider"></li>
			<li><a href="<?php echo base_url('su/profile'); ?>"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
			<li><a href="<?php echo base_url('user/settings'); ?>"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
			<li class="divider"></li>
			<li><a href="<?php echo base_url('user/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
		<?php } else { ?>
			<li><a href="<?php echo base_url('user/dkmreg'); ?>"><i class="fa fa-puzzle-piece fa-fw"></i> Pendaftaran DKM</a></li>
			<li class="divider"></li>
			<li><a href="<?php echo base_url('user/login'); ?>"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
		<?php } ?>
    </ul>
    <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->