<?php if($level == 1){?>
<!--<table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>DKM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tahun</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>No. Telepon</th>
            <th>Jadwal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php if($dmasjid){ $no = 1; foreach($dmasjid as $dm){ ?>
			<tr <?php 
					if($dm->activated_masjid == 0){echo "style='color:red;font-weight:bold;'";}
					else if($dm->activated_masjid == 2){echo "style='color:blue;font-weight:bold;'";}
				?>>
				<td><?php echo $no++; ?>.</td>
				<td><?php echo $dm->nama_dkm; ?></td>
				<td><?php echo "#".$dm->id_masjid." - ".$dm->nama_masjid; ?></td>
				<td><?php echo $dm->alamat_masjid; ?></td>
				<td><?php echo $dm->tahun_berdiri_masjid; ?></td>
				<td><?php echo $dm->jenis_masjid; ?></td>
				<td><?php echo $dm->status_tanah; ?></td>
				<td><?php if($dm->nomor_telepon_masjid){echo $dm->nomor_telepon_masjid;}else{echo "-";} ?></td>
				<td>
					<button title="Tambah Jadwal" <?php if($dm->activated_masjid != 1){?>disabled<?php } ?> class="btn btn-primary btn-xs" data-toggle="modal" data-target="<?php echo "#".'add_jadwal'.$dm->id_masjid; ?>">
						<span class="fa fa-plus" ></span>
					</button>
				</td>
				<td>
					<div class="ui-group-buttons">
						<?php if($dm->activated_masjid == 0){?>
							<a title="Aktifkan Masjid" href="<?php echo base_url('su/acmasjid/'.$dm->id_masjid);?>" class="btn btn-success btn-xs confirmation"><span class="fa fa-check"></span></a>
								<div class="or or-xs"></div>
							<a title="Banned Masjid" href="<?php echo base_url('su/banmasjid/'.$dm->id_masjid);?>" class="btn btn-danger btn-xs confirmation"><span class="fa fa-times"></span></a>
						<?php } else if($dm->activated_masjid == 1){?>
							<button title="Ubah Masjid" class="btn btn-success btn-xs" data-toggle="modal" data-target="<?php echo "#".$url.$dm->id_masjid; ?>">
								<span class="fa fa-edit" ></span>
							</button>
							<div class="or or-xs"></div>
							<a title="Non-aktifkan Masjid" href="<?php echo base_url('su/nacmasjid/'.$dm->id_masjid);?>" class="btn btn-warning btn-xs confirmation"><span class="fa fa-times"></span></a>
						<?php } else if($dm->activated_masjid == 2){?>
							<a title="Unbanned Masjid" href="<?php echo base_url('su/unbanmasjid/'.$dm->id_masjid);?>" class="btn btn-danger btn-xs confirmation"><span class="fa fa-check"></span></a>
						<?php } ?>
					</div>
				</td>
			</tr>
		<?php } } ?>
    </tbody>
</table>
<div class="row well well-sm">
	<div class="col-md-12">
		<b>Keterangan</b>: 
		<span style="color:blue;">Biru</span> : Banned ; 
		<span style="color:red;">Merah</span> : Non-aktif ; 
	</div>
</div>
<?php $this->load->view('template/menu/su/add/add-jadwal-super');?>
<?php $this->load->view('template/menu/su/edit/edit-masjid');?>
<?php } else if($level == 2){ ?>
	<?php if($get_masjid_id){ foreach($get_masjid_id as $dm){?>
	<?php if($dm->activated_masjid == 1){ ?>
	    <table class="pull-left col-md-4 " border="0">
			<tbody>
				<tr>
					<td><strong>#ID</strong></td>
					<td>:</td>
					<td>#<?php echo $dm->id_masjid; ?></td>
				</tr>
				<tr>
					<td><strong>Username</strong></td>
					<td>:</td>
					<td><?php echo $dm->username; ?></td>
				</tr>
				<tr>
					<td><strong>Nama</strong></td>
					<td>:</td>
					<td><?php echo $dm->nama_masjid; ?></td>
				</tr>
				<tr>
					<td><strong>Berdiri</strong></td>
					<td>:</td>
					<td><?php echo $dm->tahun_berdiri_masjid; ?></td>
				</tr>
				<tr>
					<td><strong>Alamat</strong></td>
					<td>:</td>
					<td><?php echo $dm->alamat_masjid; ?></td>
				</tr>
				<tr>
					<td><strong>Jenis</strong></td>
					<td>:</td>
					<td><?php echo $dm->jenis_masjid; ?></td>
				</tr>
				<tr>
					<td><strong>Status Tanah</strong></td>
					<td>:</td>
					<td><?php echo $dm->status_tanah; ?></td>
				</tr>
				<tr>
					<td><strong>No.Telpon</strong></td>
					<td>:</td>
					<td><?php echo $dm->nomor_telepon_masjid; ?></td>
				</tr>
				<tr>
					<td><strong>Aktif</strong></td>
					<td>:</td>
					<td><?php if($dm->activated_masjid == 1){echo "Ya";}else{echo "Tidak";}; ?></td>
				</tr>
			</tbody>
		</table>
        <div class="col-md-4"> 
			<img src="<?php 
				if($dm->image_masjid){ echo base_url('assets/img/masjid/'.$dm->image_masjid);
				}else{ echo base_url('assets/img/null.png'); } 
			?>" alt="<?php echo $dm->nama_masjid?>" title="<?php echo $dm->nama_masjid?>" class="img-thumbnail pull-right" width="304" height="236">
        </div>
	<?php }  else if($dm->activated_masjid == 2) { echo "Masjid tidak diterima. Silahkan isi data dengan benar!"; }
			 else { echo "Masjid menunggu persetujuan admin."; } ?>
	<?php } } else {echo "Tidak ada data.";} ?>
<?php } ?>