<style>
.stylish-input-group .input-group-addon{
    background: white !important; 
}
.stylish-input-group .form-control{
	border-right:0; 
}
.stylish-input-group button{
    border:0;
    background:transparent;
}
</style>
<div class="row well">
    <div class="col-sm-12">
        <div id="imaginary_container" > 
			<?php if($url == 'jadwal'){ echo form_open('pu/jadwal');} else if($url == 'masjid'){ echo form_open('pu/masjid');} ?>
            <div class="input-group stylish-input-group" >
					<input type="text" class="form-control" style="z-index: initial;" name="search" placeholder="Search" >
					<span class="input-group-addon">
						<button type="submit">
							<span class="fa fa-search"></span>
						</button>  
					</span>
            </div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>