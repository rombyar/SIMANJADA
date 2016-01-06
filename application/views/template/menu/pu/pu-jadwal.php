<style>
    .event-list {
		list-style: none;
		margin: 0px;
		padding: 0px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	.event-list > li {
		background-color: rgb(255, 255, 255);
		--box-shadow: 0px 0px 5px rgb(51, 51, 51);
		--box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
		padding: 0px;
		margin: 0px 0px 20px;
	}
	.event-list > li > time {
		display: inline-block;
		width: 100%;
		color: rgb(255, 255, 255);
		background-color: rgb(197, 44, 102);
		padding: 5px;
		text-align: center;
		text-transform: uppercase;
	}
	.event-list > li:nth-child(even) > time {
		background-color: rgb(165, 82, 167);
	}
	.event-list > li > time > .day {
		display: block;
		font-size: 24pt;
		font-weight: 100;
		line-height: 1;
	}
	.event-list > li time > .month {
		display: block;
		font-size: 18pt;
		font-weight: 900;
		line-height: 1;
	}
	.event-list > li > img {
		width: 100%;
	}
	.event-list > li > .info {
		padding-top: 5px;
		text-align: center;
	}
	.event-list > li > .info > .title {
		font-size: 17pt;
		font-weight: 700;
		margin: 0px;
	}
	.event-list > li > .info > .desc {
		font-size: 11pt;
		font-weight: 300;
		margin: 0px;
	}
	.event-list > li > .info > ul,
	.event-list > li > .info > ul > li,
    .event-list > li > .info > ul > li > a {
		display: block;
		width: 100%;
		color: rgb(30, 30, 30);
		text-decoration: none;
	} 
	.event-list > li > .info > ul > li:hover,
		.event-list > li {
			position: relative;
			display: block;
			width: 100%;
			height: 80px;
			padding: 0px;
		}
		.event-list > li > time,
		.event-list > li > img  {
			display: inline-block;
		}
		.event-list > li > time,
		.event-list > li > img {
			width: 80px;
			float: left;
		}
		.event-list > li > .info {
			background-color: rgb(245, 245, 245);
			overflow: hidden;
		}
		.event-list > li > time,
		.event-list > li > img {
			width: 120px;
			height: 80px;
			padding: 0px;
			margin: 0px;
		}
		.event-list > li > .info {
			position: relative;
			height: 80px;
			text-align: left;
			padding-right: 40px;
		}	
		.event-list > li > .info > .title, 
		.event-list > li > .info > .desc {
			padding: 0px 10px;
		}
		.event-list > li > .info > ul {
			position: absolute;
			left: 0px;
			bottom: 0px;
		}
</style>

<?php $this->load->view('template/menu/pu/pu-search');?>
	
<div class="row well">
    <div class="col-sm-12">
		<ul class="event-list">
			<?php $datenow = gmdate('Y-m-d'); ?>
			
			<?php if($djadwal){foreach($djadwal as $dj){
				 $date = $dj->tanggal;
				 $arr = explode("-", $date);
				 list($month, $day, $year) = $arr;
			?>
			<?php if($datenow < $dj->tanggal){?>
			<li>
				<time datetime="<?php echo $dj->tanggal; ?>">
					<span class="day"><?php echo $day;?></span>
					<span class="month"><?php echo $month;?></span>
					<span class="year"><?php echo $year;?></span>
					<span class="time"><?php echo $dj->waktu; ?></span>
				</time>
				<div class="info">
					<h2 class="title"><a href="<?php echo base_url('pu/jadwal/'.$dj->id_jadwal); ?>"><?php echo $dj->nama_jadwal;?></a></h2>
					<p class="desc"><?php echo $dj->deskripsi_jadwal;?></p>
				</div>
			</li>
			<?php } ?>
			<?php } } else {echo "<center>Tidak ada data.</center>";} ?>
		</ul>
	</div>
</div>
