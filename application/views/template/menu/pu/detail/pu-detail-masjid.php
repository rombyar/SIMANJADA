<?php $this->load->view('template/menu/pu/pu-search');?>
<style>
.thumbnail {
    position: relative;
    padding: 0px;
    margin-bottom: 20px;
}

.thumbnail img {
    width: 100%;
}
</style>
<div class="row well">
		<?php if($dmasjid){ ?>
		<div class="col-md-12">
			<?php foreach($dmasjid as $dm){?>
				<h3><?php echo $dm->nama_masjid?></h3>
				<hr>
				<img src="<?php if($dm->image_masjid){ echo base_url('assets/img/masjid/'.$dm->image_masjid); }else{ echo base_url('assets/img/null.png'); } ?>
				" alt="<?php echo $dm->nama_masjid?>" title="<?php echo $dm->nama_masjid?>"
				class="img-thumbnail pull-right" alt="<?php echo $dm->nama_masjid?>" width="304" height="236">
				<h5><b>Deskripsi</b></h5>
				<i class="fa fa-bars fa-fw"></i> <?php echo $dm->deskripsi_masjid?><br><br>
				<h5><b>Alamat <?php if($dm->nomor_telepon_masjid){?>dan Kontak<?php } ?></b></h5>
				<i class="fa fa-map-marker fa-fw"></i> <?php echo $dm->alamat_masjid?> <br><?php if(!$dm->nomor_telepon_masjid){?><br><?php } ?>
				<?php if($dm->nomor_telepon_masjid){?>
				<i class="fa fa-phone-square fa-fw"></i> <?php echo $dm->nomor_telepon_masjid?> <br><br>
				<?php } ?>
				<h5><b>Detail Masjid</b></h5>
				<table border="0">
					<tr>
						<td><i class="fa fa-minus fa-fw"></i></td>
						<td width="5%" >Berdiri</td>
						<td width="1%" > : </td>
						<td width="100%"> <?php echo $dm->tahun_berdiri_masjid?> <br></td>
					</tr>
					<tr>
						<td><i class="fa fa-minus fa-fw"></i></td>
						<td width="5%" >Jenis</td>
						<td width="1%" > : </td>
						<td width="100%"> <?php echo $dm->jenis_masjid?> <br></td>
					</tr>
					<tr>
						<td><i class="fa fa-minus fa-fw"></i></td>
						<td width="5%" >Status</td>
						<td width="1%" > : </td>
						<td width="100%"> <?php echo $dm->status_tanah?></td>
					</tr>
				</table><br>
				<h5><b>Penanggung jawab</b></h5>
				<table border="0">
					<tr>
						<td><i class="fa fa-minus fa-fw"></i></td>
						<td width="5%" >DKM</td>
						<td width="1%" > : </td>
						<td width="100%"> <?php echo $dm->nama_dkm?></td>
					</tr>
				</table><br>
			<?php } ?> 
			
			<h5><b>Jadwal Masjid</b></h5>
			<?php $batas=2; $i=1; $datenow = gmdate('Y-m-d'); if($djadwal){foreach($djadwal as $dj){?>
					<div class="col-xs-12">
						<?php if($datenow < $dj->tanggal){?>
							<?php if($i<=$batas) { //echo $i.$batas; ?>
									<i class="fa fa-external-link fa-fw"></i>
									<a href="<?php echo base_url('pu/jadwal/'.$dj->id_jadwal); ?>"><?php echo $dj->nama_jadwal;?></a>
							<?php } $i++; ?>
						<?php } ?>
					</div>
			<?php } } else {echo "Tidak ada jadwal.";} ?> 
			
			<br><br>
			<hr>
			<a href="<?php echo base_url('pu/masjid'); ?>" class="btn btn-primary" title="Kembali">
				<i class="fa fa-arrow-circle-left fa-lg"></i> Kembali
			</a>
		</div>
		<?php } else {echo "<center>Tidak ada data.</center>";} ?>
</div><!-- End row -->