	<div class="row">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tabel <?php if($url == "dkm" or $url == "masjid" or $url == "jadwal"){echo ucfirst($url);} ?>
					<?php 
						if($url == "masjid"){
						}else if($url == "jadwal"){	
						}
					?>
					
					<?php if($url == "masjid" or $url == "jadwal"){ ?>
						<?php $masjid_num = $this->m_row->get_masjid_num_id($user_id);if($level == 2 and $masjid_num != 1 and $url == "masjid"){ ?>
							<?php $this->load->view('template/menu/su/add/add-masjid');?>
						<?php } else if($level == 2 and $masjid_num == 1 and $url == "masjid"){?>
							<?php $this->load->view('template/menu/su/edit/edit-masjid');?>
						<?php } else if($level == 2 and $url == "jadwal"){ ?>
							<?php $this->load->view('template/menu/su/add/add-jadwal');?>
						<?php } ?>
						
						<?php if($level == 1){ ?>
							<?php if($level == 1 and $url == "masjid"){ ?>
								<?php $this->load->view('template/menu/su/add/add-masjid');?>
							<?php } else if($level == 1 and $url == "jadwal"){ ?>
								<?php $this->load->view('template/menu/su/add/add-jadwal');?>
							<?php } ?>
						<?php } ?>
					<?php } ?>
					
					
					<?php if($url == "masjid" or $url == "jadwal"){ ?>
						<?php $masjid_num = $this->m_row->get_masjid_num_id($user_id);if($level == 2 and $masjid_num != 1 and $url == "masjid"){ ?>
							<button type="button" class="btn btn-danger btn-sm" style="margin-left:10px;" data-toggle="modal" data-target="<?php echo "#".$url; ?>">
								<li class="fa fa-plus"></li> Tambah
							</button>
						<?php } else if($level == 2 and $masjid_num == 1 and $url == "masjid"){?>
							<?php if($get_masjid_id){ foreach($get_masjid_id as $dm){ if($dm->activated_masjid == 1 or $dm->activated_masjid == 2){?>
								<button type="button" class="btn btn-warning btn-sm" style="margin-left:10px;" data-toggle="modal" data-target="<?php if($get_masjid_id){
										foreach($get_masjid_id as $dmid){
											echo "#".$url.$dmid->id_masjid;
										}
									}; ?>">
									<li class="fa fa-edit"></li> Ubah
								</button>
							<?php }}} ?>
						<?php } else if($level == 2 and $url == "jadwal"){ ?>
							<button type="button" class="btn btn-danger btn-sm" style="margin-left:10px;" data-toggle="modal" data-target="<?php echo "#".$url; ?>">
								<li class="fa fa-plus"></li> Tambah
							</button>
						<?php } ?>
						
						<?php if($level == 1 and $url == "masjid"){ ?>
							<button type="button" class="btn btn-danger btn-sm" style="margin-left:10px;" data-toggle="modal" data-target="<?php echo "#".$url; ?>">
								<li class="fa fa-plus"></li> Tambah
							</button>
						<?php } ?>
						
					<?php } ?>
            </div>
            <div class="panel-body">
				
				<?php $this->load->view('template/menu/su/error-all/error'); ?>
				
				<style>
					.ui-group-buttons .or{position:relative;float:left;width:.3em;height:1.3em;z-index:3;font-size:12px}
					.ui-group-buttons .or:before{position:absolute;top:50%;left:50%;content:'or';background-color:#5a5a5a;margin-top:-.1em;margin-left:-.9em;width:1.8em;height:1.8em;line-height:1.55;color:#fff;font-style:normal;font-weight:400;text-align:center;border-radius:0px;-webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1);box-shadow:0 0 0 1px rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
					.ui-group-buttons .or:after{position:absolute;top:0;left:0;content:' ';width:.3em;height:2.84em;background-color:rgba(0,0,0,0);border-top:.6em solid #5a5a5a;border-bottom:.6em solid #5a5a5a}
					.ui-group-buttons .or.or-lg{height:1.3em;font-size:16px}
					.ui-group-buttons .or.or-lg:after{height:2.85em}
					.ui-group-buttons .or.or-sm{height:1em}
					.ui-group-buttons .or.or-sm:after{height:2.5em}
					.ui-group-buttons .or.or-xs{height:.25em}
					.ui-group-buttons .or.or-xs:after{height:1.84em;z-index:-1000}
					.ui-group-buttons{display:inline-block;vertical-align:middle}
					.ui-group-buttons:after{content:".";display:block;height:0;clear:both;visibility:hidden}
					.ui-group-buttons .btn{float:left;border-radius:0}
					.ui-group-buttons .btn:first-child{margin-left:0;border-top-left-radius:.0em;border-bottom-left-radius:.0em;padding-right:15px}
					.ui-group-buttons .btn:last-child{border-top-right-radius:.0em;border-bottom-right-radius:.0em;padding-left:15px}
				</style>
                <div class="table-responsive">
					<?php 
						if($url == "masjid"){
							$this->load->view('template/menu/su/su-masjid');	
						}else if($url == "dkm"){
							$this->load->view('template/menu/su/su-dkm');	
						}else if($url == "jadwal"){
							$this->load->view('template/menu/su/su-jadwal');	
						}
					?>
                </div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
<!-- /. ROW  -->