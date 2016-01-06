<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><strong><?php echo $this->config->item('website_name', 'tank_auth'); ?></strong></a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
		<?php //$this->load->view('template/navigation/nav-top/navigation-envelope'); ?>
		<?php //$this->load->view('template/navigation/nav-top/navigation-task'); ?>
		<?php //$this->load->view('template/navigation/nav-top/navigation-alerts'); ?>
		<?php $this->load->view('template/navigation/nav-top/navigation-user'); ?>
    </ul>
</nav>
<!--/. NAV TOP  -->