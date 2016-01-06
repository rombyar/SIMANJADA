<div class="header"> 
    <h1 class="page-header">
        <?php if($url == "dkmreg" or $url == "dkm"){
			  if($url == "dkmreg"){echo "DKM Reg";}else{echo "DKM";}}
			  else{echo ucfirst($url);}?> <!--<small>Summary of your App</small>-->
    </h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
		<li class="active"><?php echo ucfirst($url);?></li>
		<span class="pull-right"><?php echo $datenow = gmdate('Y-m-d');?></span>
	</ol>
</div>