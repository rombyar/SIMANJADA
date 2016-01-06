<?php $this->session->set_flashdata('redirectToCurrent', current_url()); //testing ?>
<?php if($level == 1){?>

<!--<table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>#JADWAL</th>
            <th>DKM</th>
            <th>Masjid</th>
            <th>Nama jadwal</th>
            <th>Tempat</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php if($djadwal){ $no = 1; foreach($djadwal as $dj){?>
			<tr>
				<td><?php echo $no++; ?>.</td>
				<td>#<?php echo $dj->id_jadwal; ?></td>
				<td><?php echo $dj->nama_dkm; ?></td>
				<td>#<?php echo $dj->id_masjid."-".$dj->nama_masjid; ?></td>
				<td><?php echo $dj->nama_jadwal; ?></td>
				<td><?php echo $dj->tempat; ?></td>
				<td><?php echo $dj->tanggal; ?></td>
				<td><?php echo $dj->waktu; ?></td>
				<td>
					<div class="ui-group-buttons">
						<button title="Ubah Jadwal" class="btn btn-success btn-xs" data-toggle="modal" data-target="<?php echo "#".$url.$dj->id_jadwal; ?>">
							<span class="fa fa-edit"></span>
						</button>
						<div class="or or-xs"></div>
						<a title="Hapus Jadwal" href="<?php echo base_url('su/deljadwal/'.$dj->id_jadwal);?>" class="btn btn-danger btn-xs confirmation"><span class="fa fa-trash"></span></a>
					</div>
				</td>
			</tr>
		<?php } } ?>
    </tbody>
</table>



		
<?php } else { ?>
<!--<table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>#JADWAL</th>
            <th>DKM</th>
            <th>Masjid</th>
            <th>Nama jadwal</th>
            <th>Tempat</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php $no = 1; if($dmasjidid){ foreach($dmasjidid as $dm_id){?>
			<?php if($djadwalid){ foreach($djadwalid as $dj){?>
				<?php if($dm_id->id_masjid == $dj->id_masjid){?>
					<tr <?php if($dm_id->activated_masjid != 1){echo "style='color:red;'";}?>>
						<td><?php echo $no++; ?>.</td>
						<td>#<?php echo $dj->id_jadwal; ?></td>
						<td><?php echo $dj->nama_dkm; ?></td>
						<td>#<?php echo $dj->id_masjid."-".$dj->nama_masjid; ?></td>
						<td><?php echo $dj->nama_jadwal; ?></td>
						<td><?php echo $dj->tempat; ?></td>
						<td><?php echo $dj->tanggal; ?></td>
						<td><?php echo $dj->waktu; ?></td>
						<td>
							<div class="ui-group-buttons">
								<button title="Ubah Jadwal" class="btn btn-success btn-xs">
									<span class="fa fa-edit" data-toggle="modal" data-target="<?php echo "#".$url.$dj->id_jadwal; ?>"></span>
								</button>
								<div class="or or-xs"></div>
								<a title="Hapus Jadwal" href="<?php echo base_url('su/djadwal/'.$dj->id_jadwal);?>" class="btn btn-danger btn-xs confirmation"><span class="fa fa-trash"></span></a>
							</div>
						</td>
					</tr>
				<?php } ?>
			<?php } } ?>
		<?php } } ?>
    </tbody>
</table>
<?php } ?>
<?php $this->load->view('template/menu/su/edit/edit-jadwal');?>