<?php $uri_1 = $this->uri->rsegment(1); ?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
		
			<?php if(!$username){?>
            <li>
				<a <?php if($url == "login"){echo 'class="active-menu"';}?> href="<?php echo base_url('user/login');?>" ><i class="fa fa-sign-in fa-lg"></i> Login</a>
			</li>
            <li>
				<a <?php if($url == "dkmreg"){echo 'class="active-menu"';}?> href="<?php echo base_url('user/dkmreg');?>" ><i class="fa fa-puzzle-piece fa-lg"></i> Pendaftaran DKM</a>
			</li>
			<?php } ?>

			<?php if($username){?>
				<?php if($uri_1 != "home"){?>
					<?php if($uri_1 != "developer"){?>
						<?php if($uri_1 != "pu"){?>
							<li>
								<a <?php if($uri_1 == "home"){echo 'class="active-menu"';}?> href="<?php echo base_url();?>"><i class="fa fa-external-link fa-lg"></i> View Website</a>
							</li>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			<li>
                <a <?php if($url == "dashboard"){echo 'class="active-menu"';}?> href="<?php echo base_url('su/dashboard');?>"><i class="fa fa-dashboard fa-lg"></i> Dashboard</a>
            </li>

				<?php if($uri_1 == "su" or $uri_1 == "user"){?>
				<li>
					<a href="#"><i class="fa fa-hdd-o fa-lg"></i> List Data<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level <?php if($url == "masjid" or $url == "dkm" or $url == "jadwal"){echo "in";}?>">
						
						
						<?php if($level == 1){?>
						<li>
							<a <?php if($url == "dkm"){echo 'class="active-menu"';}?> href="<?php echo base_url('su/dkm');?>"><i class="fa fa-users fa-lg"></i> DKM</a>
						</li>
						<?php } ?>
						
						
						
						<?php $dkm = $this->m_row->get_dkm_num();if($dkm != 0){?>
						<li>
							<a <?php if($url == "masjid"){echo 'class="active-menu"';}?> href="<?php echo base_url('su/masjid');?>"><i class="fa fa-star fa-lg"></i> Masjid</a>
						</li>
						<?php } ?>
						
						<?php $masjid = $this->m_row->get_ak_masjid_num();if($masjid != 0){?>
							<?php if($level == 1){?>
								<li>
									<a <?php if($url == "jadwal"){echo 'class="active-menu"';}?> href="<?php echo base_url('su/jadwal');?>"><i class="fa fa-calendar fa-lg"></i> Jadwal</a>
								</li>
							<?php } ?>
						
							<?php if($level == 2){?>
								<?php $nomasjid = $this->m_row->get_no_masjid_num($user_id);if($nomasjid == 1){?>
								<li>
									<a <?php if($url == "jadwal"){echo 'class="active-menu"';}?> href="<?php echo base_url('su/jadwal');?>"><i class="fa fa-calendar fa-lg"></i> Jadwal</a>
								</li>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						
						
					</ul>
				</li>
				<?php } ?>
			<?php } ?>
			
			<?php if($uri_1 == "pu" or $uri_1 == "home" or $uri_1 == "developer" and $username == TRUE or $username == FALSE){?>
			<li>
				<a <?php if($url == "masjid"){echo 'class="active-menu"';}?> href="<?php echo base_url('pu/masjid');?>"><i class="fa fa-star fa-lg"></i> Masjid</a>
			</li>
			<li>
				<a <?php if($url == "jadwal"){echo 'class="active-menu"';}?> href="<?php echo base_url('pu/jadwal');?>"><i class="fa fa-calendar fa-lg"></i> Jadwal</a>
			</li>
			<?php } ?>
			
			<?php $this->load->view('template/footer/footer-copyright');?>
        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->