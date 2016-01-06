<?php $this->load->view('template/header'); ?>
    <div id="wrapper">
		<?php $this->load->view('template/navigation/nav-top/navigation-top'); ?>
		<?php $this->load->view('template/navigation/nav-side/navigation-side'); ?>
        <div id="page-wrapper">
			<?php $this->load->view('template/breadcrumb'); ?>
            <div id="page-inner">
				<?php echo $contents; ?>
			</div><!-- /. PAGE INNER  -->
        </div><!-- /. PAGE WRAPPER  -->
    </div><!-- /. WRAPPER  -->
<?php $this->load->view('template/footer'); ?>
