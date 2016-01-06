<?php 
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
	}
?>
<?php if($level == 2){ foreach($get_masjid_id as $dmid){
	$nama_masjid = array(
		'name'	=> 'nama_masjid',
		'id'	=> 'nama_masjid',
		'value'	=> $dmid->nama_masjid,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama masjid',
		'type' => 'text',
		'title' => 'Masukkan nama masjid',
		//'required' => 'required',
	);
	$tahun_berdiri_masjid = array(
		'name'	=> 'tahun_berdiri_masjid',
		'id'	=> 'tahun_berdiri_masjid',
		'value'	=> $dmid->tahun_berdiri_masjid,
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
		'value'	=> $dmid->alamat_masjid,
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Alamat masjid',
		'title' => 'Masukkan alamat masjid',
	);
	$deskripsi_masjid = array(
		'name'  => 'deskripsi_masjid',
		'id'    => 'deskripsi_masjid',
		'value'	=> $dmid->deskripsi_masjid,
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Deskripsi masjid',
		'title' => 'Masukkan deskripsi masjid',
	);
	$nomor_telepon_masjid = array(
		'name'	=> 'nomor_telepon_masjid',
		'id'	=> 'nomor_telepon_masjid',
		'value'	=> $dmid->nomor_telepon_masjid,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nomor telepon masjid',
		'type' => 'number',
		'title' => 'Masukkan nomor telepon masjid',
		'min' => 1,
	);
	$id_masjid = array(
		'name'	=> 'id_masjid',
		'id'	=> 'id_masjid',
		'value'	=> $dmid->id_masjid,
		'type'	=> 'hidden',
	);
?>
<div class="modal fade" id="<?php echo $url.$dmid->id_masjid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Ubah <?php echo ucfirst($url); ?> <?php echo $dmid->nama_masjid?></h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('su/emasjid',$attributes); ?>
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
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Jenis</label>
						<div class="col-sm-9">
							<select name="jenis_masjid" id="jenis_masjid" class="form-control" required="required" >
								<?php $jenis_masjid = $dmid->jenis_masjid; ?>
								<option value=" ">-- Jenis Masjid --</option>
								<option value="<?php echo $dmid->jenis_masjid?>" 
								<?php 
									if($jenis_masjid == "Masjid JAMI"){ echo 'selected';}
								    else if($jenis_masjid == "Masjid Besar"){ echo 'selected';}
								    else if($jenis_masjid == "Masjid di tempat Publik"){ echo 'selected';}
								?>>
								<?php 
									if($jenis_masjid == "Masjid JAMI"){ echo 'Masjid JAMI';}
								    else if($jenis_masjid == "Masjid Besar"){ echo 'Masjid Besar';}
								    else if($jenis_masjid == "Masjid di tempat Publik"){ echo 'Masjid di tempat Publik';}
								?>
								</option>
								
								<?php
									if($jenis_masjid == "Masjid JAMI"){ 
										echo '<option value="Masjid Besar">Masjid Besar</option>';
										echo '<option value="Masjid di tempat Publik">Masjid di tempat Publik</option>';
									}
									if($jenis_masjid == "Masjid Besar"){ 
										echo '<option value="Masjid JAMI">Masjid JAMI</option>';
										echo '<option value="Masjid di tempat Publik">Masjid di tempat Publik</option>';
									}
									if($jenis_masjid == "Masjid di tempat Publik"){ 
										echo '<option value="Masjid JAMI">Masjid JAMI</option>';
										echo '<option value="Masjid Besar">Masjid Besar</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Status tanah</label>
						<div class="col-sm-9">
							<select name="status_tanah" id="status_tanah" class="form-control" required="required" >
								<?php $status_tanah = $dmid->status_tanah; ?>
								<option value=" ">-- Status Tanah --</option>
								<option value="<?php echo $dmid->status_tanah?>" 
								<?php 
									if($status_tanah == "SHM"){ echo 'selected';} 
									else if($status_tanah == "Wakaf"){ echo 'selected';}
								?>>
								<?php 
									if($status_tanah == "SHM"){ echo 'SHM';}
									else if($status_tanah == "Wakaf"){ echo 'Wakaf';}
								?>
								</option>
								<?php
									if($status_tanah == "SHM"){ echo '<option value="Wakaf">Wakaf</option>'; }
									if($status_tanah == "Wakaf"){ echo '<option value="SHM">SHM</option>'; }
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Deskripsi</label>
						<div class="col-sm-9">
							<?php echo form_textarea($deskripsi_masjid); ?>
							<?php echo form_input($id_dkm); ?>
							<?php echo form_input($id_users); ?>
							<?php echo form_input($id_masjid); ?>
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
							<input type="file"  name="userfile" value="<?php echo set_value('userfile'); ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Tinjauan</label>
						<div class="col-sm-9">
							<img src="<?php 
										if($dmid->image_masjid){ echo base_url('assets/img/masjid/'.$dmid->image_masjid);
										}else{ echo base_url('assets/img/null.png'); } 
									?>" alt="<?php echo $dmid->nama_masjid?>" title="<?php echo $dmid->nama_masjid?>" width="45%" height="45%">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Batal
					</button>
					<button type="submit" class="btn btn-success">
						<span class="fa fa-edit"></span> Ubah
					</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php }} else { foreach($dmasjid as $dm){

	$nama_masjid = array(
		'name'	=> 'nama_masjid',
		'id'	=> 'nama_masjid',
		'value'	=> $dm->nama_masjid,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nama masjid',
		'type' => 'text',
		'title' => 'Masukkan nama masjid',
		'required' => 'required',
	);
	$tahun_berdiri_masjid = array(
		'name'	=> 'tahun_berdiri_masjid',
		'id'	=> 'tahun_berdiri_masjid',
		'value'	=> $dm->tahun_berdiri_masjid,
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
		'value'	=> $dm->alamat_masjid,
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Alamat masjid',
		'title' => 'Masukkan alamat masjid',
	);
	$deskripsi_masjid = array(
		'name'  => 'deskripsi_masjid',
		'id'    => 'deskripsi_masjid',
		'value'	=> $dm->deskripsi_masjid,
		'rows'  => '2',
		'cols'  => '2',
		'class'	=> 'form-control',
		'placeholder'	=> 'Deskripsi masjid',
		'title' => 'Masukkan deskripsi masjid',
	);
	$nomor_telepon_masjid = array(
		'name'	=> 'nomor_telepon_masjid',
		'id'	=> 'nomor_telepon_masjid',
		'value'	=> $dm->nomor_telepon_masjid,
		'class'	=> 'form-control',
		'placeholder'	=> 'Nomor telepon masjid',
		'type' => 'number',
		'title' => 'Masukkan nomor telepon masjid',
		'min' => 1,
	);
	$id_masjid = array(
		'name'	=> 'id_masjid',
		'id'	=> 'id_masjid',
		'value'	=> $dm->id_masjid,
		'type'	=> 'hidden',
	);

?>
<div class="modal fade" id="<?php echo $url.$dm->id_masjid;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title" id="myModalLabel">Ubah <?php echo ucfirst($url); ?> <?php echo $dm->nama_masjid?></h4>
			</div>
			<?php $attributes = array('class' => 'form-horizontal'); echo form_open_multipart('su/emasjid',$attributes); ?>
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
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Jenis</label>
						<div class="col-sm-9">
							<select name="jenis_masjid" id="jenis_masjid" class="form-control" required="required" >
								<?php $jenis_masjid = $dm->jenis_masjid; ?>
								<option value=" ">-- Jenis Masjid --</option>
								<option value="<?php echo $dm->jenis_masjid?>" 
								<?php 
									if($jenis_masjid == "Masjid JAMI"){ echo 'selected';}
								    else if($jenis_masjid == "Masjid Besar"){ echo 'selected';}
								    else if($jenis_masjid == "Masjid di tempat Publik"){ echo 'selected';}
								?>>
								<?php 
									if($jenis_masjid == "Masjid JAMI"){ echo 'Masjid JAMI';}
								    else if($jenis_masjid == "Masjid Besar"){ echo 'Masjid Besar';}
								    else if($jenis_masjid == "Masjid di tempat Publik"){ echo 'Masjid di tempat Publik';}
								?>
								</option>
								
								<?php
									if($jenis_masjid == "Masjid JAMI"){ 
										echo '<option value="Masjid Besar">Masjid Besar</option>';
										echo '<option value="Masjid di tempat Publik">Masjid di tempat Publik</option>';
									}
									if($jenis_masjid == "Masjid Besar"){ 
										echo '<option value="Masjid JAMI">Masjid JAMI</option>';
										echo '<option value="Masjid di tempat Publik">Masjid di tempat Publik</option>';
									}
									if($jenis_masjid == "Masjid di tempat Publik"){ 
										echo '<option value="Masjid JAMI">Masjid JAMI</option>';
										echo '<option value="Masjid Besar">Masjid Besar</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Status tanah</label>
						<div class="col-sm-9">
							<select name="status_tanah" id="status_tanah" class="form-control" required="required" >
								<?php $status_tanah = $dm->status_tanah; ?>
								<option value=" ">-- Status Tanah --</option>
								<option value="<?php echo $dm->status_tanah?>" 
								<?php 
									if($status_tanah == "SHM"){ echo 'selected';} 
									else if($status_tanah == "Wakaf"){ echo 'selected';}
								?>>
								<?php 
									if($status_tanah == "SHM"){ echo 'SHM';}
									else if($status_tanah == "Wakaf"){ echo 'Wakaf';}
								?>
								</option>
								<?php
									if($status_tanah == "SHM"){ echo '<option value="Wakaf">Wakaf</option>'; }
									if($status_tanah == "Wakaf"){ echo '<option value="SHM">SHM</option>'; }
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Deskripsi</label>
						<div class="col-sm-9">
							<?php echo form_textarea($deskripsi_masjid); ?>
							<?php echo form_input($id_dkm); ?>
							<?php echo form_input($id_users); ?>
							<?php echo form_input($id_masjid); ?>
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
							<input type="file"  name="userfile" value="<?php echo set_value('userfile'); ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" >Tinjauan</label>
						<div class="col-sm-9">
							<img src="<?php 
										if($dm->image_masjid){ echo base_url('assets/img/masjid/'.$dm->image_masjid);
										}else{ echo base_url('assets/img/null.png'); } 
									?>" alt="<?php echo $dm->nama_masjid?>" title="<?php echo $dm->nama_masjid?>" width="45%" height="45%">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" data-dismiss="modal">
						<span class="fa fa-times"></span> Batal
					</button>
					<button type="submit" class="btn btn-success">
						<span class="fa fa-edit"></span> Ubah
					</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<?php }} ?>