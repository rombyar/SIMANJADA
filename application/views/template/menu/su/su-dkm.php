<!--<table class="table table-striped table-bordered table-hover" id="dataTables-example">-->
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>#ID</th>
            <th>Status</th>
            <th>Nama</th>
            <th>No.Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
		<?php if($ddkm){  $no = 1; foreach($ddkm as $dda){?>
		<?php if($dda->id_users != $user_id){?>
			<tr <?php if($dda->activated == 0){echo "style='color:red;font-weight:bold;'";}?>>
				<td><?php echo $no++; ?>.</td>
				<td>#<?php echo $dda->id_dkm; ?></td>
				<td><?php if($dda->activated == 1){echo "Aktif";}else{echo "Non-Aktif";}; ?></td>
				<td><?php echo $dda->nama_dkm; ?></td>
				<td><?php echo $dda->nomor_telepon_dkm; ?></td>
				<td><?php echo $dda->alamat_dkm; ?></td>
				<td>
					<div class="ui-group-buttons">
						<?php if($dda->activated == 0){?>
							<a title="Aktifkan DKM" href="<?php echo base_url('su/acdkm/'.$dda->id_users);?>" class="btn btn-warning btn-xs confirmation"><span class="fa fa-check"></span></a>
						<?php } else {?>
							<button title="Ubah DKM" class="btn btn-success btn-xs" data-toggle="modal" data-target="<?php echo "#".$url.$dda->id_dkm; ?>">
								<span class="fa fa-edit" ></span>
							</button>
							<div class="or or-xs"></div>
							<a title="Non-aktifkan DKM" href="<?php echo base_url('su/nacdkm/'.$dda->id_users);?>" class="btn btn-warning btn-xs confirmation"><span class="fa fa-times"></span></a>
						<?php } ?>
					</div>
				</td>
			</tr>
		<?php } } } ?>
    </tbody>
</table>
<?php $this->load->view('template/menu/su/edit/edit-dkm');?>