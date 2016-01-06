<?php
/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */

function get_buttons($id_users,
					 $username,
					 $level,
					 $jenis_akun,
					 $nama_pengguna,
					 $jenis_kelamin,
					 $email,
					 $no_hp,
					 $reputasi_user,
					 $negara,
					 $activated,
					 $banned,
					 $last_ip,
					 $last_login)
{
    $ci = & get_instance();
    $html = '<div class="ui-group-buttons">';
    $html .= '<a title="Edit data Pengguna" href="' .site_url('menu/edit_pengguna/'.$id_users). '" class="btn btn-success" role="button"><span class="glyphicon glyphicon-edit"></span></a>';
    $html .= '<div class="or"></div>';
	$html .= '<a href="#" class="btn btn-info" data-toggle="modal" role="button" data-target="#detail'.$id_users.'">Lihat</a>';
	$html .= '<div class="or"></div>';
	$html .= '<a title="Lihat data Profil" href="' .site_url('profil/view/'.$id_users). '" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-new-window"></span></a>';
	$html .= '<div class="modal fade" id="detail'.$id_users.'" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">';
	$html .= '	<div class="modal-dialog modal-sm">';
	$html .= '		<div class="modal-content">';
	$html .= '			<div class="modal-header">';
	$html .= '				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	$html .= '				<h4 class="modal-title" id="myModalLabel">Detail Informasi <span class="tebal"/>'.$username.'</h4>';
	$html .= '			</div>';
	$html .= '			<div class="modal-body">';
	$html .= '				<table class="table table-hover" border="0" id="form-login" width="100%" cellpadding="4">';
	$html .= '					<tr>';
	$html .= '						<td>Username</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$username.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Level</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$level.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Jenis Akun</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$jenis_akun.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td colspan="3">-----------------------------------------------------------------------------------------------------------</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Nama</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$nama_pengguna.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Jenis Kelamin</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$jenis_kelamin.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Email</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$email.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>No.HP</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$no_hp.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td colspan="3">-----------------------------------------------------------------------------------------------------------</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Negara</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$negara.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Activated</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$activated.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Banned</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$banned.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Last Ip</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$last_ip.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Last Login</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$last_login.'</td>';
	$html .= '					</tr>';
	$html .= '				</table>';
	$html .= '			</div>';
	$html .= '			<div class="modal-footer">';
	$html .= '				<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>';
	$html .= '			</div>';
	$html .= '		</div>';
	$html .= '	</div>';
	$html .= '</div>';
    return $html;
}

function get_buttons_kategori($id_kategori,$deskripsi_kategori,$nama_kategori)
{
    $ci = & get_instance();
    $html = '<div class="ui-group-buttons">';
    $html .= '<a title="Edit data Pengguna" href="' .site_url('menu/edit_kategori/'.$id_kategori). '" class="btn btn-success" role="button"><span class="glyphicon glyphicon-edit"></span></a>';
    $html .= '<div class="or"></div>';
	$html .= '<a href="#" class="btn btn-info" data-toggle="modal" role="button" data-target="#detail'.$id_kategori.'">Lihat</a>';
	$html .= '<div class="modal fade" id="detail'.$id_kategori.'" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">';
	$html .= '	<div class="modal-dialog modal-sm">';
	$html .= '		<div class="modal-content">';
	$html .= '			<div class="modal-header">';
	$html .= '				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	$html .= '				<h4 class="modal-title" id="myModalLabel">Detail Informasi <span class="tebal"/>'.$nama_kategori.'</h4>';
	$html .= '			</div>';
	$html .= '			<div class="modal-body">';
	$html .= '				<table class="table table-hover" border="0" id="form-login" width="100%" cellpadding="4">';
	$html .= '					<tr>';
	$html .= '						<td>#ID</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$id_kategori.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Kategori</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$nama_kategori.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Deskripsi Kategori</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$deskripsi_kategori.'</td>';
	$html .= '					</tr>';
	$html .= '				</table>';
	$html .= '			</div>';
	$html .= '			<div class="modal-footer">';
	$html .= '				<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>';
	$html .= '			</div>';
	$html .= '		</div>';
	$html .= '	</div>';
	$html .= '</div>';
    return $html;
}

function get_buttons_kategori_sub($id,$deskripsi_kategori_sub,$nama_kategori_sub,$nama_kategori)
{
    $ci = & get_instance();
    $html = '<div class="ui-group-buttons">';
    $html .= '<a title="Edit data Pengguna" href="' .site_url('menu/edit_kategori_sub/'.$id). '" class="btn btn-success" role="button"><span class="glyphicon glyphicon-edit"></span></a>';
    $html .= '<div class="or"></div>';
	$html .= '<a href="#" class="btn btn-info" data-toggle="modal" role="button" data-target="#detail'.$id.'">Lihat</a>';
	$html .= '<div class="modal fade" id="detail'.$id.'" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">';
	$html .= '	<div class="modal-dialog modal-sm">';
	$html .= '		<div class="modal-content">';
	$html .= '			<div class="modal-header">';
	$html .= '				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	$html .= '				<h4 class="modal-title" id="myModalLabel">Detail Informasi <span class="tebal"/>'.$nama_kategori_sub.'</h4>';
	$html .= '			</div>';
	$html .= '			<div class="modal-body">';
	$html .= '				<table class="table table-hover" border="0" id="form-login" width="100%" cellpadding="4">';
	$html .= '					<tr>';
	$html .= '						<td>#ID</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$id.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Kategori</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$nama_kategori_sub.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Deskripsi Kategori Sub</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$deskripsi_kategori_sub.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Kategori</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$nama_kategori.'</td>';
	$html .= '					</tr>';
	$html .= '				</table>';
	$html .= '			</div>';
	$html .= '			<div class="modal-footer">';
	$html .= '				<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>';
	$html .= '			</div>';
	$html .= '		</div>';
	$html .= '	</div>';
	$html .= '</div>';
    return $html;
}

function get_buttons_thread($username,$judul_thread,$slug_thread,$kode_unik_thread,
							$tag_thread,$jumlah_visitor,$jumlah_komentar,$tanggal_buat,$tanggal_ubah,$nama_kategori,$nama_kategori_sub)
{
    $ci = & get_instance();
    $html = '<div class="ui-group-buttons">';
    $html .= '<a title="Edit data Pengguna" href="' .site_url('menu/edit_thread/'.$kode_unik_thread). '" class="btn btn-success" role="button"><span class="glyphicon glyphicon-edit"></span></a>';
    $html .= '<div class="or"></div>';
	$html .= '<a href="#" class="btn btn-info" data-toggle="modal" role="button" data-target="#detail'.$kode_unik_thread.'">Lihat</a>';
	$html .= '<div class="modal fade" id="detail'.$kode_unik_thread.'" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">';
	$html .= '	<div class="modal-dialog modal-sm">';
	$html .= '		<div class="modal-content">';
	$html .= '			<div class="modal-header">';
	$html .= '				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	$html .= '				<h4 class="modal-title" id="myModalLabel">Detail Utas "<span class="tebal"/>'.$judul_thread.'"</h4>';
	$html .= '			</div>';
	$html .= '			<div class="modal-body">';
	$html .= '				<table class="table table-hover" border="0" id="form-login" width="100%" cellpadding="4">';
	$html .= '					<tr>';
	$html .= '						<td>Pembuat</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$username.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Judul</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td><span>'.substr($judul_thread, 0, 5).'</span></td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Tag</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$tag_thread.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Visitor</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$jumlah_visitor.' Visitor</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Komentar</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$jumlah_komentar.' Komentar</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Tanggal Buat</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$tanggal_buat.'</td>';
	$html .= '					</tr>';
	$html .= '					<tr>';
	$html .= '						<td>Tanggal Ubah</td>';
	$html .= '						<td>:</td>';
	$html .= '						<td>'.$tanggal_ubah.'</td>';
	$html .= '					</tr>';
	$html .= '				</table>';
	$html .= '			</div>';
	$html .= '			<div class="modal-footer">';
	$html .= '				<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>';
	$html .= '			</div>';
	$html .= '		</div>';
	$html .= '	</div>';
	$html .= '</div>';
	$html .= '<div class="or"></div>';
    $html .= '<a title="Lihat Utas" href="' .site_url('user/read/'.$kode_unik_thread.'/'.$slug_thread). '" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-new-window"></span></a>';
    $html .= '</div>';
    return $html;
}