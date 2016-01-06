<?php $this->load->view('template/menu/pu/pu-search');?>

<div class="row well">
	<?php if($djadwal){foreach($djadwal as $dj){?>
		<div class="col-md-12">
			<h3><?php echo $dj->nama_jadwal?></h3>
			<hr>
			<img src="<?php if($dj->image_masjid){ echo base_url('assets/img/masjid/'.$dj->image_masjid); }else{ echo base_url('assets/img/null.png'); } ?>
			" alt="<?php echo $dj->nama_masjid?>" title="<?php echo $dj->nama_masjid?>"
			class="img-thumbnail pull-right" alt="<?php echo $dj->nama_masjid?>" width="304" height="236">
			<h5><b>Deskripsi</b></h5>
			<?php echo $dj->deskripsi_jadwal?><br><br>
			<h5><b>Tempat</b></h5>
			<i class="fa fa-map-marker"></i> <a href="<?php echo base_url('pu/masjid/'.$dj->id_masjid); ?>"><?php echo $dj->nama_masjid;?></a> : <?php echo $dj->tempat;?> <br><br>
			<h5><b>Tanggal dan waktu</b></h5>
			<i class="fa fa-calendar"></i> <?php echo $dj->tanggal?> <br>
			<i class="fa fa-clock-o"></i> <?php echo $dj->waktu?> <br><br>
			<hr>
			<a href="<?php echo base_url('pu/jadwal'); ?>" class="btn btn-primary" title="Kembali">
				<i class="fa fa-arrow-circle-left fa-lg"></i> Kembali
			</a>
		</div>
	<?php } } else {echo "<center>Tidak ada data.</center>";} ?> 
</div><!-- End row -->
