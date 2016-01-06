<?php 
	$nama_masjid = array(
		'name'	=> 'nama_masjid',
		'id'	=> 'nama_masjid',
		'value'	=> set_value('nama_masjid'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama masjid',
		'type' => 'text',
		'title' => 'Masukkan nama masjid',
		'required' => 'required',
	);
	$tahun_berdiri_masjid = array(
		'name'	=> 'tahun_berdiri_masjid',
		'id'	=> 'tahun_berdiri_masjid',
		'value'	=> set_value('tahun_berdiri_masjid'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Tahun berdiri masjid',
		'type' => 'number',
		'min' => 1900,
		'max' => 9999,
		'title' => 'Masukkan tahun berdiri masjid',
		'required' => 'required',
	);
	$alamat_masjid = array(
		'name'  => 'alamat_masjid',
		'id'    => 'alamat_masjid',
		'value' => set_value('alamat_masjid'),
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Alamat masjid',
		'title' => 'Masukkan alamat masjid',
		'required' => 'required',
    );
	$status_tanah = array(
		'name'	=> 'status_tanah',
		'id'	=> 'status_tanah',
		'value'	=> set_value('status_tanah'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Status masjid',
		'type' => 'text',
		'title' => 'Masukkan status masjid',
		'required' => 'required',
	);
	$deskripsi_masjid = array(
		'name'  => 'deskripsi_masjid',
		'id'    => 'deskripsi_masjid',
		'value' => set_value('alamat_masjid'),
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Deskripsi masjid',
		'title' => 'Masukkan deskripsi masjid',
		'required' => 'required',
	);
	$nomor_telepon_masjid = array(
		'name'	=> 'nomor_telepon_masjid',
		'id'	=> 'nomor_telepon_masjid',
		'value'	=> set_value('nomor_telepon_masjid'),
		'class'	=> 'form-control',
		'placeholder'	=> 'Nomor telepon masjid',
		'type' => 'number',
		'title' => 'Masukkan nomor telepon masjid',
		'min' => 1,
	);
	
	if($level == 2){
		foreach($get_dkm_id as $dkid){
			$id_dkm = array(
				'name'	=> 'id_dkm',
				'id'	=> 'id_dkm',
				'value'	=> $dkid->id_dkm,
				'type'	=> 'hidden',
			);
			$id_users = array(
				'name'	=> 'id_users',
				'id'	=> 'id_users',
				'value'	=> $dkid->id_users,
				'type'	=> 'hidden',
			);
		}
	} else {
		foreach($get_dkm_id as $dkid){
			$id_dkm = array(
				'name'	=> 'id_dkm',
				'id'	=> 'id_dkm',
				'value'	=> $dkid->id_dkm,
				'type'	=> 'hidden',
			);
		}
		$id_users = array(
			'name'	=> 'id_users',
			'id'	=> 'id_users',
			'value'	=> $user_id,
			'type'	=> 'hidden',
		);
		$activated_masjid = array(
			'name'	=> 'activated_masjid',
			'id'	=> 'activated_masjid',
			'value'	=> 0, // ubah activated masjid
			'type'	=> 'hidden',
		);
	}
?>

<!-- Modal -->
<div class="modal fade" id="<?php echo $url; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Add <?php echo ucfirst($url); ?></h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart($this->uri->uri_string(),$attributes); ?>
				<div class="modal-body">
					<div class="form-group">
						<label class="col-md-3 control-label" >Nama</label>
						<div class="col-sm-9">
							<?php echo form_input($nama_masjid); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Tahun berdiri</label>
						<div class="col-sm-9">
							<?php echo form_input($tahun_berdiri_masjid); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Alamat</label>
						<div class="col-sm-9">
							<?php echo form_textarea($alamat_masjid); ?>
							<?php echo form_input($id_dkm); ?>
							<?php echo form_input($id_users); ?>
							<?php if($level==1){echo form_input($activated_masjid);} ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Jenis</label>
						<div class="col-sm-9">
							<select name="jenis_masjid" id="jenis_masjid" class="form-control" required="required" >
								<option value=" ">-- Jenis Masjid --</option>
								<option value="Masjid JAMI"> Masjid JAMI </option>
								<option value="Masjid Besar"> Masjid Besar </option>
								<option value="Masjid di tempat Publik"> Masjid di tempat Publik </option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Status tanah</label>
						<div class="col-sm-9">
							<select name="status_tanah" id="status_tanah" class="form-control" required="required" >
								<option value=" ">-- Status Tanah --</option>
								<option value="SHM"> SHM </option>
								<option value="Wakaf"> Wakaf </option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Deskripsi</label>
						<div class="col-sm-9">
							<?php echo form_textarea($deskripsi_masjid); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >No.Telepon</label>
						<div class="col-sm-9">
							<?php echo form_input($nomor_telepon_masjid); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Foto</label>
						<div class="col-sm-9">
							<input type="file"  name="userfile" value="<?php echo set_value('userfile'); ?>" required="required"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
					<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>