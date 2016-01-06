
<?php $this->load->view('template/menu/pu/pu-search');?>
<style>
.thumbnail {
    position: relative;
    padding: 0px;
    margin-top: 20px;
    margin-bottom: 20px;
}

.thumbnail img {
    width: 100%;
    height: 140px;
}
.caption{
    margin-top: -20px;
}

</style>
<div class="row well">
	<?php if($dmasjid){foreach($dmasjid as $dm){?>
		<div class="col-xs-18 col-sm-6 col-md-3">
			<div class="thumbnail">
				<img src="<?php 
							if($dm->image_masjid){ echo base_url('assets/img/masjid/'.$dm->image_masjid);
							}else{ echo base_url('assets/img/null.png'); } 
						?>" alt="<?php echo $dm->nama_masjid?>" title="<?php echo $dm->nama_masjid?>">
				<div class="caption">
					<h4><a href="<?php echo base_url('pu/masjid/'.$dm->id_masjid); ?>"><?php echo $dm->nama_masjid?></a></h4>
					<?php 
						$string = $dm->deskripsi_masjid;
						echo $string = character_limiter($string, 100);
					?><br><br>
					<a href="<?php echo base_url('pu/masjid/'.$dm->id_masjid); ?>" class="btn btn-info btn-xs" role="button"> 
						<i class="fa fa-list"></i> Detail
					</a>
				</div>
			</div>
		</div>
	<?php } } else {echo "<center>Tidak ada data.</center>";} ?>
</div><!-- End row -->